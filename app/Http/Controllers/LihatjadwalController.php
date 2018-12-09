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
use App\Hari_jadwal;
use Carbon\Carbon;
use DateTime;

class LihatjadwalController extends Controller
{
    public function index()
    {
        $polyclinics = \App\Polyclinic::all();   
        $jadwals = \App\Jadwals::pluck('dokter_id','tanggal_jadwal','jam_mulai','jam_berakhir'); 
        // $harijadwal = \App\Hari_jadwal::pluck('id_jadwal','id_hari','jam_mulai','jam_berakhir', 'kuota','sisa_kuota');
        return view('lihatjadwal')->with(compact('polyclinics','jadwals'));
    }

    // public function postCreatePoli($id_poli)
    // {
    //     $polyclinics = \App\Polyclinic::all();
    //     $jadwals = Jadwals::leftJoin('doctors', 'doctors.id', 'jadwals.dokter_id')
    //                         ->leftJoin('polyclinics', 'polyclinics.id', 'doctors.poliklinik_id')
    //                         // ->leftJoin('bookings', 'jadwals.id', 'bookings.id_jadwal')
    //                         ->leftJoin('hari_jadwals', 'jadwals.id', 'hari_jadwals.id_jadwal')
    //                         ->leftJoin('haris', 'hari_jadwals.id_hari', 'haris.id')
    //                         ->where('polyclinics.id', $id_poli)
    //                         // ->whereDate('tanggal_jadwal', '>=', Carbon::today())
    //                         ->get(['doctors.nama','jadwals.*', 'haris.alias', 'haris.hari']);

    //     foreach ($jadwals as $key => $value) {
    //         $date = new DateTime();
    //         $date->modify('next '.$value->alias);

    //         $jadwals[$key]->tanggal = $date->format('m-d-Y');
            
    //     }
    //     return json_encode($jadwals);
    //     // return view('petugas.pendaftaran.daftar')->with(compact('pasien', 'polyclinics'));
    // }

    public function postCreatePoli($id_poli)
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
        // $pasien = Pasien::find($id_pasien);
        return json_encode($jadwals);
        // return view('petugas.pendaftaran.daftar')->with(compact('pasien', 'polyclinics'));
    }

}

