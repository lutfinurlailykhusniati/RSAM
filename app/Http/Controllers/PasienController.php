<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use Auth;
use Gate;

class PasienController extends Controller
{
    public function tambahPasien(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;
    		$pasien = new Pasien;
    		$pasien->name = $data['name'];
    		$pasien->dusun = $data['dusun'];
    		$pasien->rt = $data['rt'];
    		$pasien->rw = $data['rw'];
    		$pasien->no_rumah = $data['no_rumah'];
    		$pasien->desa = $data['desa'];
    		$pasien->kecamatan = $data['kecamatan'];
    		$pasien->kabupaten = $data['kabupaten'];
    		$pasien->provinsi = $data['provinsi'];
    		$pasien->tempat_lahir = $data['tempat_lahir'];
    		$pasien->tanggal_lahir = $data['tanggal_lahir'];
    		$pasien->goldar = $data['goldar'];
    		$pasien->no_tlp = $data['no_tlp'];
    		$pasien->no_ktp = $data['no_ktp'];
    		$pasien->no_kk = $data['no_kk'];
    		$pasien->status_pernikahan = $data['status_pernikahan'];
    		$pasien->agama = $data['agama'];
    		$pasien->pekerjaan = $data['pekerjaan'];
    		$pasien->pendidikan = $data['pendidikan'];
    		$pasien->bahasa = $data['bahasa'];
    		$pasien->save();
    		return redirect('/view-pasiens')->with('flash_message_succes','Data Pasien Berhasil Ditambahkan!');
    	}
    	//echo "test"; die;
    	return view('petugas.pasiens.tambah_pasien');
    }

    public function viewPasiens(){

    	$pasiens = Pasien::get();
    	return view('petugas.pasiens.view_pasiens')->with(compact('pasiens'));
    }


    public function detailPasiens(Request $request, $id= null)
    {
        if($request->isMethod('get'))
        {
            $data = $request->all();
            Pasien::where(['id'=>$id])->get();
        }
        $detailPasiens = Pasien::where(['id'=>$id])->first();
        return view('petugas.pasiens.detail_pasiens')->with(compact('detailPasiens'));
    }

    public function editPasien(Request $request, $id = null)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
             Pasien::where(['id'=>$id])->update(['name'=>$data['name'],'dusun'=>$data['dusun'],'rt'=>$data['rt'],'rw'=>$data['rw'],'no_rumah'=>$data['no_rumah'],'desa'=>$data['desa'], 'kecamatan'=>$data['kecamatan'], 'kabupaten'=>$data['kabupaten'], 'provinsi'=>$data['provinsi'], 'tempat_lahir'=>$data['tempat_lahir'], 'tanggal_lahir'=>$data['tanggal_lahir'],  'goldar'=>$data['goldar'], 'no_tlp'=>$data['no_tlp'], 'no_ktp'=>$data['no_ktp'], 'no_kk'=>$data['no_kk'], 'status_pernikahan'=>$data['status_pernikahan'],'agama'=>$data['agama'],'pekerjaan'=>$data['pekerjaan'], 'pendidikan'=>$data['pendidikan'],'bahasa'=>$data['bahasa']]);
            return redirect('/view-pasiens')->with('flash_message_succes','Data Pasien Berhasil di Update!');
        }
        $pasienDetails = Pasien::where(['id'=>$id])->first();
        return view('petugas.pasiens.edit_pasien')->with(compact('pasienDetails'));
    } 
    
    public function deletePasien($id = null) 
    {
        //echo $no_rm; die;
        if(!empty($id))
        {
            Pasien::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_succes','Data Pasien Berhasil Dihapus!');
        }
    }
}
