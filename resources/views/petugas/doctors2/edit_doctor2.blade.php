@extends('layouts.petugasLayout.petugas_design')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" method="post" action="{{ url('/edit-doctor2/'.$doctorDetails2->id) }}" id="edit-polyclinic"> {{ csrf_field() }}
                     <div class="card-body">
                        <h4 class="card-title">Edit Dokter 2</h4>
                        <input type="hidden" name="poliklinik_id" value="1"/>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Nama Dokter</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Dokter" value="{{ $doctorDetails2->nama }}" >
                                    </div>

                            </div>

                             <div class="form-group row">
                                    <label class="col-md-3">Pilih Poli</label>
                                    <div class="col-md-9">
                                      @foreach ($polyclinics as $key => $value)
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing{{$value->id}}" name="polis[]" value="{{$value->id}}" @if(in_array($value->id, $doctorDetails2->polis)) checked @endif>
                                            <label class="custom-control-label" for="customControlAutosizing{{$value->id}}">{{ $value->nama_poliklinik }}</label>
                                        </div>
                                      @endforeach
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
                                        <button class="btn btn-primary"  type="Submit">Edit Dokter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
