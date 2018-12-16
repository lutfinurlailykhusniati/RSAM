<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Polyclinic;
use App\Jadwals;
use App\DoctorPoli;
use Auth;


class DoctorController2 extends Controller
{
    public function viewDoctors2()
    {
        $doctors = \App\Doctor::all();
        $polyclinics = \App\Polyclinic::all();

      foreach ($doctors as $key => $value) {
        $doctorpoli = DoctorPoli::leftJoin('polyclinics', 'polyclinics.id', 'doctor_polis.id_poli')->where('doctor_polis.id_doctor', $value->id)->get();
        $doctors[$key]->polis = $doctorpoli;
      }

      // dd($doctors);
        return view('petugas.doctors2.view_doctors2')->with(compact('doctors'));

    }

    public function tambahDoctor2(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $doctor = new Doctor;
            $doctor->nama = $data['nama'];
            $doctor->alamat = $data['alamat'];
            $doctor->poliklinik_id = $data['poliklinik_id'];
            $doctor->tempat_lahir = $data['tempat_lahir'];
            $doctor->tanggal_lahir = $data['tanggal_lahir'];
            $doctor->status = $data['status'];
            $doctor->save();


            foreach ($data['polies'] as $key => $value) {
              $polinya = new DoctorPoli;
              $polinya->id_doctor = $doctor->id;
              $polinya->id_poli = $value;
              $polinya->save();
            }

            return redirect('/view-doctors2')->with('flash_message_succes','Data Dokter Berhasil Ditambahkan!');

        }
        $doctors = \App\Doctor::all();
        $polyclinics = \App\Polyclinic::all();
        return view('petugas.doctors2.tambah_doctor2')->with(compact('polyclinics'));

    }



    public function detailDoctor2(Request $request, $id= null)
    {
        if($request->isMethod('get'))
        {
            $data = $request->all();
            Doctor::where(['id'=>$id])->get();

        }

          $polyclinics = \App\Polyclinic::all();
        $detailDoctor2 = Doctor::where('doctors.id',$id)->first();
        $jml_poli = DoctorPoli::where('id_doctor', $detailDoctor2->id)->pluck('id_poli');
        foreach ($jml_poli as $key => $value) {
            $polinyadia[] = Polyclinic::find($value);
        }
        $detailDoctor2->polipolinya = $polinyadia;
        // dd($detailDoctor);

        return view('petugas.doctors2.detail_doctor2')->with(compact('detailDoctor2'));
    }

     public function deleteDoctor2($id = null)
    {
        //echo $no_rm; die;
        // cek jadwal2
        $dktr = Jadwals::where('dokter_id', $id)->count();
        if($dktr > 0){
          return redirect()->back()->with('flash_message_error','Hapus jadwal dokternya dulu!');
        }
        if(!empty($id))
        {
            Doctor::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_succes','Data Doctor Berhasil Dihapus!');
        }
    }

     public function editDoctor2(Request $request, $id = null)
    {

        if($request->isMethod('post'))
        {
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
            Doctor::where(['id'=>$id])->update(['poliklinik_id'=>$data['poliklinik_id'],'nama'=>$data['nama'],'alamat'=>$data['alamat'],'tempat_lahir'=>$data['tempat_lahir'],'tanggal_lahir'=>$data['tanggal_lahir'],'status'=>$data['status']]);
            return redirect('/view-doctors2')->with('flash_message_succes','Data Dokter Berhasil di Update!');
        }

        $doctors = \App\Doctor::all();
        $polyclinics = \App\Polyclinic::all();
        $doctorDetails2 = Doctor::where(['id'=>$id])->first();
       // echo "<pre>"; print_r($doctorDetails); die;
        return view('petugas.doctors2.edit_doctor2')->with(compact('polyclinics','doctorDetails2'));
    }


}
