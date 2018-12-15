@extends('layouts.petugasLayout.petugas_design')
@section('content')

 <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Dokter</h4><br><br>
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
                    <a href="{{ url('/tambah-doctor') }}"  class="btn btn-primary">Tambah Dokter</a><br><br>
                        <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID Dokter</th>
                                <th>Nama Dokter</th>
                                <th>Poli</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>

                            	@foreach($doctors as $doctor)
                                <tr>
                                    <td>{{ $doctor->id }}</td>
                                    <td>{{ $doctor->nama }}</td>
                                    <td>@foreach ($doctor->polis as $key => $value)
                                      {{ ($key+1).'. '.$value->nama_poliklinik }} <br>
                                    @endforeach</td>
                                    <td>{{ $doctor->status}}


                                    <td class="center">
                                        <a href="{{ url('/detail-doctor/'.$doctor->id) }}"  class="btn btn-cyan btn-sm">Detail</a>
                                        <a href="{{ url('/edit-doctor/'.$doctor->id) }}"  class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ url('/delete-doctor/'.$doctor->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
