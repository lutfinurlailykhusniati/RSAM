@extends('layouts.petugasLayout.petugas_design')
@section('content')
 <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Poliklinik</h4><br><br>
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
                    <a href="{{ url('/tambah-polyclinic') }}"  class="btn btn-primary">Tambah Poli</a><br><br>
                        <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>	
                                <th>ID Poliklinik</th>
                                <th>Nama Poli</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            	@foreach($polyclinics as $polyclinic)
                                <tr>
                                                <td>{{ $polyclinic->id }}</td>
                                                <td>{{ $polyclinic->nama_poliklinik }}</td>
                                                <td class="center">  
                                                    <a href="{{ url('/edit-polyclinic/'.$polyclinic->id) }}"  class="btn btn-success btn-sm">Edit</a> 
                                                    <a href="{{ url('/delete-polyclinic/'.$polyclinic->id) }}" class="btn btn-danger btn-sm" >Delete</a> 
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