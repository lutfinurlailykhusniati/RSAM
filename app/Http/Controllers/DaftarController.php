<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Daftar;
use App\Doctor;
use App\Jadwals;
use App\Jadwal;
use App\Polyclinic;
use App\Pasien;
use App\Booking;
use Carbon\Carbon;
use App\Hari_jadwal;
use DateTime;
use Auth;

class DaftarController extends Controller
{
     public function index()
    {
              
        return view('layouts.pendaftaran');
    }

    public function postCreate(Request $request)
    {
        $pasien = Pasien::where('id', $request->input('norm'))->where('tanggal_lahir', $request->input('tanggal_lahir'))->first();
        $polyclinics = \App\Polyclinic::all();
        if(is_null($pasien)){
            return redirect()->back()->with("error","Pasien belum terdaftar");
        }else{
            if($request->input('referer') == 'admin'){
                return view('petugas.pendaftaran.daftar')->with(compact('pasien', 'polyclinics'));
            }else{
                return view('layouts.pendaftaran')->with(compact('pasien', 'polyclinics'));
            }
            
        }


        // $polyclinics = \App\Polyclinic::all();
        // $doctors = \App\Doctor::all();
        // return view('petugas.pendaftaran.daftar')->with(compact('polyclinics', 'doctors', 'pasien'));
    } 

public function postCreatePoli($id_poli, $id_pasien)
    {
        $polyclinics = \App\Polyclinic::all();

        $jadwals = Jadwal::leftJoin('doctors', 'doctors.id', 'jadwals.dokter_id')->where('status', 'Aktif')
                            ->leftJoin('polyclinics', 'polyclinics.id', 'doctors.poliklinik_id')
                            // ->leftJoin('bookings', 'jadwals.id', 'bookings.id_jadwal')
                            ->leftJoin('hari_jadwals', 'jadwals.id', 'hari_jadwals.id_jadwal')
                            ->leftJoin('haris', 'hari_jadwals.id_hari', 'haris.id')
                            ->where('polyclinics.id', $id_poli)
                            // ->whereDate('tanggal_jadwal', '>=', Carbon::today())
                            ->get(['doctors.nama','jadwals.*', 'hari_jadwals.*','haris.hari', 'haris.alias']);

        foreach ($jadwals as $key => $value) {
            $date = new DateTime();
            $date->modify('next '.$value->alias);

            $jadwals[$key]->tanggal = $date->format('Y-m-d');
        }
        // dd($jadwals);
        $pasien = Pasien::find($id_pasien);
        return json_encode($jadwals);
        // return view('petugas.pendaftaran.daftar')->with(compact('pasien', 'polyclinics'));
    }

    //   public function postCreatePoli($id_poli, $id_pasien)
    // {
    //     $polyclinics = \App\Polyclinic::all();

    //     $jadwals = Jadwal::leftJoin('doctors', 'doctors.id', 'jadwals.dokter_id')
    //                         ->leftJoin('polyclinics', 'polyclinics.id', 'doctors.poliklinik_id')
    //                         // ->leftJoin('bookings', 'jadwals.id', 'bookings.id_jadwal')
    //                         ->where('polyclinics.id', $id_poli)
    //                         ->whereDate('tanggal_jadwal', '>=', Carbon::today())
    //                         ->get(['doctors.nama','jadwals.*']);

    //     // dd($jadwals);
    //     $pasien = Pasien::find($id_pasien);
    //     return json_encode($jadwals);
    //     // return view('petugas.pendaftaran.daftar')->with(compact('pasien', 'polyclinics'));
    // }

    public function pilihJadwal($id_hj, $id_pasien, $tgl)
    {
        // dd($tgl);
        

        $hari_jadwal = Hari_jadwal::leftJoin('haris', 'haris.id', 'hari_jadwals.id_hari')->where('hari_jadwals.id', $id_hj)->first();

        if($hari_jadwal->sisa_kuota < 1){
            return redirect()->back()->with("error","Kuota Penuh!");
        }

        // dd($hari_jadwal);

        $bokong = Booking::where('id_jadwal', $hari_jadwal->id_jadwal)->where('id_pasien', $id_pasien)->where('tanggal_jadwal', $tgl)->count();
        if($bokong > 0){
            return redirect()->back()->with('error', 'Pasien sudah terdaftar pada jadwal tersebut.');
        }


        $antri = Booking::where('id_jadwal', $hari_jadwal->id_jadwal)->whereDate('bookings.created_at', Carbon::today())->max('no_antrian');

        $booking = new Booking();
        $booking->id_jadwal = $hari_jadwal->id_jadwal;
        $booking->id_pasien = $id_pasien;
        $booking->tanggal_jadwal = $tgl;
        $booking->id_harijadwal = $id_hj;
        $booking->no_antrian = $antri + 1;
        $booking->is_done = 0;
        $booking->save();

        $pasien = Pasien::find($id_pasien);
        $jadwal = Jadwal::find($hari_jadwal->id_jadwal);
        

        // $hari_jadwal->sisa_kuota = $hari_jadwal->sisa_kuota - 1;
        // $hari_jadwal->save();

        $hj = Hari_jadwal::find($id_hj);
        $hj->sisa_kuota = $hj->sisa_kuota - 1;
        $hj->save();
        // dd($hj);

        
        $dokter = Doctor::find($jadwal->dokter_id);
        $poly = Polyclinic::find($dokter->poliklinik_id);
        return view('layouts.rekap')->with(compact('booking', 'pasien', 'jadwal', 'dokter', 'poly', 'hj', 'hari_jadwal'));
    }


    // public function pilihJadwal($id_jadwal, $id_pasien, $referer)
    // {
    //     $antri = Booking::where('id_jadwal', $id_jadwal)->whereDate('bookings.created_at', Carbon::today())->max('no_antrian');

    //     $booking = new Booking();
    //     $booking->id_jadwal = $id_jadwal;
    //     $booking->id_pasien = $id_pasien;
    //     $booking->no_antrian = $antri + 1;
    //     $booking->is_done = 0;
    //     $booking->save();

    //     $pasien = Pasien::find($id_pasien);
    //     $jadwal = Jadwal::find($id_jadwal);

    //     if($jadwal->sisa_kuota < 1){
    //         return redirect()->back()->with("error","Kuota Penuh!");
    //     }

    //     $jadwal->sisa_kuota = $jadwal->sisa_kuota - 1;
    //     $jadwal->save();

    //     $dokter = Doctor::find($jadwal->dokter_id);
    //     $poly = Polyclinic::find($dokter->poliklinik_id);
    //     if($referer == 'admin'){
    //         return view('petugas.pendaftaran.rekap')->with(compact('booking', 'pasien', 'jadwal', 'dokter', 'poly'));
    //     }else{
    //         return view('layouts.rekap')->with(compact('booking', 'pasien', 'jadwal', 'dokter', 'poly'));
    //     }
    // }

public function printKartu($id_pasien, $id_hj)
    {
        $hari_jadwal = Hari_jadwal::leftJoin('haris', 'haris.id', 'hari_jadwals.id_hari')->where('hari_jadwals.id', $id_hj)->first();

        $booking = Booking::where('id_pasien', $id_pasien)->where('id_jadwal', $hari_jadwal->id_jadwal)->orderBy('no_antrian', 'desc')->first();
        $pasien = Pasien::find($id_pasien);
        $jadwal = Jadwal::find($hari_jadwal->id_jadwal);

        $dokter = Doctor::find($jadwal->dokter_id);
        $poly = Polyclinic::find($dokter->poliklinik_id);

        return view('layouts.print')->with(compact('booking', 'pasien', 'hari_jadwal','jadwal', 'dokter', 'poly'));
    }
    // public function printKartu($id_pasien, $id_jadwal)
    // {
    //     $booking = Booking::where('id_pasien', $id_pasien)->where('id_jadwal', $id_jadwal)->orderBy('no_antrian', 'desc')->first();
    //     $pasien = Pasien::find($id_pasien);
    //     $jadwal = Jadwal::find($id_jadwal);

    //     $jadwal->sisa_kuota = $jadwal->sisa_kuota - 1;
    //     $jadwal->save();

    //     $dokter = Doctor::find($jadwal->dokter_id);
    //     $poly = Polyclinic::find($dokter->poliklinik_id);

    //     return view('layouts.print')->with(compact('booking', 'pasien', 'jadwal', 'dokter', 'poly'));
    // }

    
    

   
}
