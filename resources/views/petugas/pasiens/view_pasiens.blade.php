@extends('layouts.petugasLayout.petugas_design')
@section('content')
 <div class="page-breadcrumb">
    
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Pasien</h4><br>
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
                    <a href="{{ url('/petugas/tambah-pasien') }}"  class="btn btn-primary">Tambah Pasien</a><br><br>
                        <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>	
                                <th>No RM</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            	@foreach($pasiens as $pasien)
                                <tr>
                                                <td>{{ $pasien->id }}</td>
                                                <td>{{ $pasien->name }}</td>
                                                <td>{{ $pasien->tempat_lahir }}</td>
                                                <td>{{ $pasien->tanggal_lahir }}</td>
                                                <td class="center"> 
                                                    <a href="{{ url('/petugas/detail-pasiens/'.$pasien->id) }}"  class="btn btn-cyan btn-sm">Detail</a> 
                                                    <a href="{{ url('/petugas/edit-pasien/'.$pasien->id) }}"  class="btn btn-success btn-sm">Edit</a>
                                                    <a href=" {{ url('/petugas/delete-pasien/'.$pasien->id) }}" class="btn btn-danger btn-sm">Delete</a> 
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
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>

@endsection