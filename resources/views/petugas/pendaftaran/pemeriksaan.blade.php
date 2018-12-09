@extends('layouts.petugasLayout.petugas_design')
@section('content')

 <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Pendaftaran Online</h4><br><br>
                    </div>
                </div>
            </div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">      
                    @if(Session::has('flash_message_error'))
                        <div class="alert-error alert -block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{!! session('flash_message_error') !!}</strong>
                        </div>
                    @endif
                    @if(Session::has('flash_message_succes'))
                        <div class="alert alert-succes alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{!! session('flash_message_succes') !!}</strong>
                        </div>
                    @endif
                    <a href="{{ url('/pendaftaran') }}"  class="btn btn-primary">Tambah Pendaftaran</a><br><br>
                        <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No RM</th>
                                <th>Nama Pasien</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>	
                                <th>No Antrian</th>
                                <th>Poliklinik</th> 
                                <th>Dokter</th>                       
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($daftars as $daftar)           	
                                <tr>
                                    <td>{{ $daftar->pasien_id }}</td>
                                    <td>{{ $daftar->pasien->nama }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $daftar->antrian }}</td>
                                    <td></td>
                                    <td>{{ $daftar->pasien_dokter }}</td>
                                                                  
                                                                     
                                    <td class="center">  
                                        <a href="#"  class="btn btn-success btn-sm">Detail</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>  
                                    </td> 
                                </tr>
                                @endforeach
                            
                                
                                        </tbody>
                
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection