@extends('layouts.petugasLayout.petugas_design')
@section('content')
 <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Detail Pasien</h4><br>
                    </div>
                </div>
            </div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                   
                    <a href="{{ url('/petugas/edit-pasien/'.$detailPasiens->id) }}"  class="btn btn-primary">Edit Pasien</a><br>
                        <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <tr>
                                <td> No Rekam Medis</td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailPasiens->no_rm }} </td>
                            </tr> 
                            <tr>
                                <td> Nama Pasien</td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailPasiens->name }} </td>
                            </tr> 
                            <tr>
                                <td rowspan = 6> Alamat</td>
                                <td rowspan = 6><center>:</td>
                                <td> Dusun </td>
                                <td><center> : </td>
                                <td colspan=7> {{ $detailPasiens->dusun }} </td>
                            </tr>
                            <tr>
                                <td> RT </td>
                                <td><center> : </td>
                                <td> {{ $detailPasiens->rt }} </td>
                                <td> RW </td>
                                <td><center> : </td>
                                <td> {{ $detailPasiens->rw }} </td>
                                <td> No Rumah </td>
                                <td><center> : </td>
                                <td> {{ $detailPasiens->no_rumah }} </td>
                            </tr> 
                             <tr>
                                <td> Desa</td>
                                <td><center> : </td>
                                <td colspan=7> {{ $detailPasiens->desa }} </td>
                            </tr>
                            <tr>
                                <td> Kecamatan</td>
                                <td><center> : </td>
                                <td colspan=7> {{ $detailPasiens->kecamatan }} </td>
                            </tr>
                            <tr>
                                <td> Kabupaten</td>
                                <td><center> : </td>
                                <td colspan=7> {{ $detailPasiens->kabupaten }} </td>
                            </tr>
                            <tr>
                                <td> Provinsi</td>
                                <td><center> : </td>
                                <td colspan=7> {{ $detailPasiens->provinsi }} </td>
                            </tr>
                            <tr>
                                <td> Tempat Tanggal Lahir </td>
                                <td><center>:</center></td>
                                <td colspan=9>{{ $detailPasiens->tempat_lahir }}, {{ $detailPasiens->tanggal_lahir }} </td>
                            <tr>
                            <tr>
                                <td>Golongan Darah </td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailPasiens->goldar}} </td>
                            </tr> 
                            <tr>
                                <td>No Telepon </td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailPasiens->no_tlp}} </td>
                            </tr>
                            <tr>
                                <td>Nomor Kartu Tanda Penduduk </td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailPasiens->no_ktp}} </td>
                            </tr>  
                            <tr>
                                <td>Nomor Kartu Keluarga </td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailPasiens->no_kk}} </td>
                            </tr>  
                            <tr>
                                <td>Status Pernikahan </td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailPasiens->status_pernikahan}} </td>
                            </tr>  
                            <tr>
                                <td>Agama </td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailPasiens->agama}} </td>
                            </tr> 
                            <tr>
                                <td>Pekerjaan</td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailPasiens->pekerjaan}} </td>
                            </tr> 
                            <tr>
                                <td>Pendidikan </td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailPasiens->pendidikan}} </td>
                            </tr> 
                            <tr>
                                <td>Bahasa </td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailPasiens->bahasa}} </td>
                            </tr> 

                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
            
@endsection