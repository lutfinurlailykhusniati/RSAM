<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Jadwals;
use App\Polyclinic;
use App\Hari_jadwal;
use DB;
use Auth;

class JadwalController extends Controller
{
    public function viewJadwal()
    {
        
        $jadwals = \App\Hari_jadwal::leftJoin('jadwals','jadwals.id','hari_jadwals.id_jadwal')
                                    ->leftJoin('doctors','jadwals.dokter_id','doctors.id')
                                    ->leftJoin('polyclinics','doctors.poliklinik_id','polyclinics.id')
                                    ->leftJoin('haris', 'haris.id', 'hari_jadwals.id_hari')
                                    ->get(['haris.*','hari_jadwals.*', 'jadwals.id', 'jadwals.dokter_id', 'doctors.nama', 'polyclinics.nama_poliklinik']);
        // dd($jadwals);
        // $jadwals = \App\Jadwals::all();
        $doctors = \App\Doctor::all();
        $polyclinics = \App\Polyclinic::all();
        return view('petugas.jadwal.view_jadwal')->with(compact('jadwals'));
    
    }

    public function tambahJadwal(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();

           // dd($data['hari']);

            // echo "<pre>"; print_r($data); die;
            $jadwal = new Jadwals;
            $jadwal->dokter_id = $data['dokter_id'];
            // $jadwal->tanggal_jadwal = $data['tanggal_jadwal'];
            // $jadwal->jam_mulai = $data['jam_mulai'];
            // $jadwal->jam_berakhir = $data['jam_berakhir'];
            // $jadwal->kuota = $data['kuota'];
            // $jadwal->sisa_kuota = $data['kuota'];
            $jadwal->save();
           
            foreach ($data['hari_jadwal'] as $key => $value) {
                $hari = new Hari_jadwal;
                $hari->id_jadwal = $jadwal->id;
                $hari->id_hari = $key;
                //$hari->hari = $value;
                $hari->jam_mulai = $data['jam_mulai'];
                $hari->jam_berakhir = $data['jam_berakhir'];
                $hari->kuota = $data['kuota'];
                $hari->sisa_kuota = $data['kuota'];
                $hari->save();
            }


            return redirect('/view-jadwal')->with('flash_message_succes','Data Jadwal Berhasil Ditambahkan!');
           
        }
        $jadwals = \App\Jadwals::all();
        $doctors = \App\Doctor::where('status', 'Aktif')->get();
        $polyclinics = \App\Polyclinic::all();
        return view('petugas.jadwal.tambah_jadwal')->with(compact('jadwals','doctors'));

    }

    public function deleteJadwal($id = null, $id_hari) 
    {
        
        if(!empty($id))
        {
            // Jadwals::where(['id'=>$id])->delete();
            Hari_jadwal::where('id_hari', $id_hari)->delete();
            return redirect()->back()->with('flash_message_succes','Data Jadwal Berhasil Dihapus!');
        }
    }

     public function editJadwal(Request $request, $id, $id_hari)
    {
        if($request->isMethod('post'))
        {

            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
            // Jadwals::where(['id'=>$id])->update(['dokter_id'=>$data['dokter_id'],'tanggal_jadwal'=>$data['tanggal_jadwal'],'jam_mulai'=>$data['jam_mulai'],'jam_berakhir'=>$data['jam_berakhir'],'kuota'=>$data['kuota']]);
            // dd($data);
            $jadwal=Jadwals::where('id',$id)->first();
            //$jadwal->dokter_id = $data['dokter_id'];
            // dd($jadwal);
            $jadwal->save();

            $hari = Hari_jadwal::where('id_jadwal', $id)->where('id_hari', $id_hari)->first();
            $hari->id_jadwal = $id;
            $hari->id_hari = $data['hari'];
            $hari->jam_mulai = $data['jam_mulai'];
            $hari->jam_berakhir = $data['jam_berakhir'];
            $hari->sisa_kuota = $hari->sisa_kuota + ($data['kuota'] - $hari->kuota );
            $hari->kuota = $data['kuota'];
            $hari->save();

            return redirect('/view-jadwal')->with('flash_message_succes','Data Jadwal Berhasil di Update!');
        }

        $jadwals = \App\Jadwals::leftJoin('hari_jadwals', 'hari_jadwals.id_jadwal', 'jadwals.id')->get(['hari_jadwals.*', 'jadwals.id', 'jadwals.dokter_id']);
        // dd($jadwals);
        $haris = DB::table('haris')->get();
       $doctors = \App\Doctor::where('status', 'Aktif')->get();
        $polyclinics = \App\Polyclinic::all();
        $jadwalDetails = Jadwals::leftJoin('hari_jadwals', 'hari_jadwals.id_jadwal', 'jadwals.id')->where(['jadwals.id'=>$id])->where('hari_jadwals.id_hari', $id_hari)->first();

        // dd($jadwalDetails);
        return view('petugas.jadwal.edit_jadwal')->with(compact('jadwalDetails','jadwals','doctors','haris'));
    }



}
