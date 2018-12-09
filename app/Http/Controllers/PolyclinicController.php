<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Polyclinic;
use Auth;
use Gate;


class PolyclinicController extends Controller
{
    public function tambahPolyclinic(Request $request)
    {
    	if($request->isMethod('post'))
        {
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;
    		$polyclinic = new Polyclinic;
    		$polyclinic->nama_poliklinik = $data['nama_poliklinik'];
    		$polyclinic->save();
    		return redirect('/view-polyclinics')->with('flash_message_succes','Data Poli Berhasil Ditambahkan!');
    	}
    	//echo "test"; die;
    	return view('petugas.polyclinics.tambah_polyclinic');
    }

    public function viewPolyclinics()
    {
    	$polyclinics = Polyclinic::get();
    	return view('petugas.polyclinics.view_polyclinics')->with(compact('polyclinics'));

    }

    public function editPolyclinic(Request $request, $id = null)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
            Polyclinic::where(['id'=>$id])->update(['nama_poliklinik'=>$data['nama_poliklinik']]);
            return redirect('/view-polyclinics')->with('flash_message_succes','Data Poli Berhasil di Update!');
        }
        $polyclinicDetails = Polyclinic::where(['id'=>$id])->first();
       
        return view('petugas.polyclinics.edit_polyclinic')->with(compact('polyclinicDetails'));
    }

    public function deletePolyclinic($id = null)
    {
        if(!empty($id))
        {
            Polyclinic::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_succes','Poli Berhasil Dihapus!');
        }
    }

}
