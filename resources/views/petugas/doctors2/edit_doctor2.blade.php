@extends('layouts.petugasLayout.petugas_design')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" method="post" action="{{ url('/edit-doctor2/'.$doctorDetails2->id) }}" id="edit-polyclinic"> {{ csrf_field() }}
                     <div class="card-body">
                        <h4 class="card-title">Edit Dokter 2</h4>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Nama Dokter 2</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Dokter" value="{{ $doctorDetails2->nama }}" >
                                    </div>

                            </div>
                            <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Pilih Poli</label>
                                    <div class="col-md-9">
                                        <select name="poliklinik_id" id="poliklinik_id" class="select form-control custom-select" style="width: 100%; height:36px;">
                                        @foreach($polyclinics as $polyclinic)
                                           <option value="{{ $polyclinic->id }}" 
                                            @if ($polyclinic->id === $doctorDetails2->poliklinik_id)
                                            selected
                                            @endif
                                            > {{ $polyclinic->nama_poliklinik }}</option>
                                        @endforeach

                                        </select>
                                    </div>
                            </div> 
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Nama Dokter" value="{{ $doctorDetails2->alamat }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="{{ $doctorDetails2->tempat_lahir }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ $doctorDetails2->tanggal_lahir }}" >
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Status</label>
                                    <div class="col-md-9">
                                        <select name="status" id="status" class="select form-control custom-select" style="width: 100%; height:36px;">
                                            <option value="Aktif">Aktif</option>
                                            <option value="Cuti">Cuti</option>
                                         </select>
                                    </div>
                            </div>
                                                                
                            </div>
                               <div class="form-action">
                                    <div class="card-body">        
                                        <button class="btn btn-primary"  type="Submit">Edit Dokter 2</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection