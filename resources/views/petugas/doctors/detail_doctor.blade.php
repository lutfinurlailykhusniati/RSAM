@extends('layouts.petugasLayout.petugas_design')
@section('content')
 <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Detail Dokter</h4><br>
                    </div>
                </div>
            </div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                   
                    <a href="{{ url('/edit-doctor/'.$detailDoctor->id) }}"  class="btn btn-primary">Edit Dokter</a><br>
                        <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <tr>
                                <td> ID Dokter</td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailDoctor->id }} </td>
                            </tr> 
                            <tr>
                                <td> Status Dokter</td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailDoctor->status }} </td>
                            </tr> 
                            <tr>
                                <td> Nama Dokter</td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailDoctor->nama }} </td>
                            </tr> 
                            <tr>
                                <td> Alamat </td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailDoctor->alamat }} </td>
                            </tr>
                            <tr>
                                <td> Poli</td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailDoctor->Polyclinic->nama_poliklinik }} </td>
                            </tr>  
                            <tr>
                                <td> Nama Dokter</td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailDoctor->nama }} </td>
                            </tr> 
                            
                            <tr>
                                <td> Tempat Tanggal Lahir </td>
                                <td><center>:</center></td>
                                <td colspan=9>{{ $detailDoctor->tempat_lahir }}, {{ $detailDoctor->tanggal_lahir }} </td>
                            <tr>
                            

                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
            
@endsection