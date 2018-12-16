@extends('layouts.petugasLayout.petugas_design')
@section('content')
@php
use App\Hari_jadwal;
@endphp
 <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Jadwal Dokter</h4><br><br>
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
                    <a href="{{ url('/tambah-jadwal2') }}"  class="btn btn-primary">Tambah Jadwal 2</a><br><br>
                        <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Hari </th>
                                <th>Waktu</th>
                                <th>Kuota</th>
                                <th>Sisa Kuota</th>	
                                <th>Nama Dokter</th>
                                <th>Poli</th>                              
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                            	@foreach($jadwals as $jadwal)
                                <tr>
                                    {{--@php
                                        //$haris = Hari_jadwal::where('id_jadwal', $jadwal->id)->get();
                                    @endphp
                                    <td>
                                    @foreach($haris as $key => $value)
                                        <span class="label label-success">{{ $value->hari }}</span>
                                    @endforeach
                                    </td>--}}
                                    <td>{{ $jadwal->hari }} </td>
                                    <td>{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_berakhir }} </td>
                                    <td>{{ $jadwal->kuota }}</td>
                                    <td>{{ $jadwal->sisa_kuota }}</td>
                                    <td>{{ $jadwal->nama }} </td>
                                    <td>{{ $jadwal->nama_poliklinik }}</td>                               
                                                                              
                                    <td class="center">  
                                        <a href="{{ url('/edit-jadwal2/'.$jadwal->id.'/'.$jadwal->id_hari) }}"  class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ url('/delete-jadwal2/'.$jadwal->id.'/'.$jadwal->id_hari) }}" class="btn btn-danger btn-sm">Delete</a>  
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