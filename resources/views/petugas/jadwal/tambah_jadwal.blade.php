@extends('layouts.petugasLayout.petugas_design')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" method="post" action="{{ url('/tambah-jadwal') }}" name="tambah_pasien" id="tambah_pasien"> {{ csrf_field() }}
                     <div class="card-body">
                        <h4 class="card-title">Tambah Jadwal</h4>

                        
                            <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Nama Dokter</label>
                                    <div class="col-md-9">
                                        <select name="dokter_id" id="dokter_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                            <option>Select</option>
                                        @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}" > {{ $doctor->nama }}</option>
                                        @endforeach

                                        </select>
                                    </div>
                            </div>
                           <!--  <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Tanggal Jadwal</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tanggal_jadwal" id="tangal_jadwal" placeholder="Alamat" required="">
                                    </div>
                            </div> -->

                            <div class="form-group row">
                                    <label class="col-md-3"> Jadwal</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing1" name="hari_jadwal[1]" value="Senin">
                                            <label class="custom-control-label" for="customControlAutosizing1">Senin</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing2" name="hari_jadwal[2]" value="Selasa">
                                            <label class="custom-control-label" for="customControlAutosizing2">Selasa</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing3" name="hari_jadwal[3]" value="Rabu">
                                            <label class="custom-control-label" for="customControlAutosizing3">Rabu</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing4" name="hari_jadwal[4]" value="Kamis">
                                            <label class="custom-control-label" for="customControlAutosizing4">Kamis</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing5" name="hari_jadwal[5]" value="Jumat">
                                            <label class="custom-control-label" for="customControlAutosizing5">Jumat</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing6" name="hari_jadwal[6]" value="Sabtu">
                                            <label class="custom-control-label" for="customControlAutosizing6">Sabtu</label>
                                        </div>
                                    </div>
                                </div>                           

                              <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Jam Mulai</label>
                                    <div class="col-sm-9">
                                        <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" placeholder="Jam Mulai" required="">
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Jam Berakhir</label>
                                    <div class="col-sm-9">
                                        <input type="time" class="form-control" name="jam_berakhir" id="jam_berakhir" placeholder="Tanggal Lahir" required="">
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Kuota</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="kuota" id="kuota" placeholder="Kuota" required="" onkeypress="return isNumberKeyTrue(event)">
                                    </div>
                            </div>
                               <div class="form-action">
                                    <div class="card-body">        
                                        <button class="btn btn-primary"  name="Submit"  type="Submit">Tambah Jadwal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection