@extends('layouts.petugasLayout.petugas_design')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" method="post" action="{{ url('/tambah-doctor') }}" name="tambah_pasien" id="tambah_pasien"> {{ csrf_field() }}
                     <div class="card-body">
                        <h4 class="card-title">Tambah Dokter</h4>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Nama Dokter</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Dokter" required="">
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required="">
                                    </div>
                            </div>

                            <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Pilih Poli</label>
                                    <div class="col-md-9">
                                        <select name="poliklinik_id" id="poliklinik_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                        @foreach($polyclinics as $polyclinic)
                                            <option value="{{ $polyclinic->id }}" > {{ $polyclinic->nama_poliklinik }}</option>
                                        @endforeach

                                        </select>
                                    </div>
                            </div>

                              <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tampat Lahir" required="">
                                    </div>
                            </div>

                              <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" required="">
                                    </div>
                            </div>

                            <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Status</label>
                                    <div class="col-md-9">
                                        <select name="status" id="status" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                            <option value="Aktif">Aktif</option>
                                            <option value="Cuti">Cuti</option>
                                         </select>
                                    </div>
                            </div>


    
                            </div>
                               <div class="form-action">
                                    <div class="card-body">        
                                        <button class="btn btn-primary"  name="Submit"  type="Submit">Tambah Dokter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection