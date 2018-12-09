@extends('layouts.petugasLayout.petugas_design')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" method="post" action="{{ url('/petugas/tambah-pasien') }}" name="tambah_pasien" id="tambah_pasien"> {{ csrf_field() }}
                     <div class="card-body">
                        @if ($message = Session::get('flash_message_success'))
                                      <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                          <strong>{{ $message }}</strong>
                                      </div>
                                    @endif

                                    @if ($message = Session::get('flash_message_error'))
                                      <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                        <strong>{{ $message }}</strong>
                                      </div>
                         @endif
                        <h4 class="card-title">Tambah Pasien</h4>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nama Pasien" required="">
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="lname" class="col-sm-3  control-label col-form-label">Dusun</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="dusun" id="dusun" placeholder="Dusun" required="">
                                    </div>
                             </div>

                            <div class="form-group row">
                                <label for="lname" class="col-sm-3  control-label col-form-label">RT</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="rt" id="rt" placeholder="RT" required="" onkeypress="return isNumberKeyTrue(event)">
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-sm-3  control-label col-form-label">RW</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="rw" id="rw" placeholder="RW" required="" onkeypress="return isNumberKeyTrue(event)">
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">No Rumah</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="no_rumah" id="no_rumah" placeholder="No Rumah" required="" onkeypress="return isNumberKeyTrue(event)">
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Desa</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="desa" id="desa" placeholder="Desa" required="">
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Kecamatan</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" required="">
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Kabupaten</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" required="">
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Provinsi</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" required="">
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" required="">
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">Tangal Lahir</label>
                                    <div class="col-sm-9">
                                       <input type="date" class="form-control mydatepicker" name="tanggal_lahir" id="tanggal_lahir" placeholder="mm/dd/yyyy" required="">
                                    </div>
                            </div>

                            <div class="form-group row">
                                    <label class="col-md-3">Golongan Darah</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="goldar" value="A" id="customControlValidation1" name="radio-stacked" required>
                                            <label class="custom-control-label"  for="customControlValidation1">A</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="goldar" value="AB" id="customControlValidation2" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation2">AB</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                             <input type="radio" class="custom-control-input" name="goldar" value="B" id="customControlValidation3" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation3">B</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="goldar" value="onkeypress" id="customControlValidation4" name="radio-stacked" required>
                                            <label class="custom-control-label"  for="customControlValidation4">O</label>
                                        </div>
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">No Telpon</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="no_tlp" id="no_tlp" placeholder="No Telpon" required=""  onkeypress="return isNumberKeyTrue(event)">
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">No KTP</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="No KTP" required=""  onkeypress="return isNumberKeyTrue(event)">
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3  control-label col-form-label">No KK</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No Kartu Keluarga" required=""  onkeypress="return isNumberKeyTrue(event)">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-md-3">Status Pernikahan</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="status_pernikahan" value="BelumMenikah" id="customControlValidation5" name="radio-stacked" required>
                                            <label class="custom-control-label"  for="customControlValidation5">Belum Menikah</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="status_pernikahan" value="Menikah" id="customControlValidation6" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation6">Menikah</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                           <input type="radio" class="custom-control-input" name="status_pernikahan" value="Duda" id="customControlValidation7" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation7">Duda</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="status_pernikahan" value="Janda" id="customControlValidation8" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation8">Janda</label>
                                        </div>
                                    </div>
                            </div>

                            <div class="form-group row">
                                    <label class="col-md-3">Agama</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="agama" value="Islam" id="customControlValidation9" name="radio-stacked" required>
                                            <label class="custom-control-label"  for="customControlValidation9">Islam</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="agama" value="Kristen" id="customControlValidation10" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation10">Kristen</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                           <input type="radio" class="custom-control-input" name="agama" value="Katolik" id="customControlValidation11" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation11">Katolik</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="agama" value="Hindu" id="customControlValidation12" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation12">Hindu</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="agama" value="Konghucu" id="customControlValidation13" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation13">Konghucu</label>
                                        </div>
                                     </div>
                            </div>

                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 control-label col-form-label">Pekerjaan</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" required="">
                                    </div>
                            </div>
                           <div class="form-group row">
                                    <label class="col-md-3">Pendidikan Terakhir</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="pendidikan" value="TIdakSekolah" id="customControlValidation14" name="radio-stacked" required>
                                            <label class="custom-control-label"  for="customControlValidation14">Tidak Sekolah</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="pendidikan" value="SD" id="customControlValidation15" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation15">SD</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                           <input type="radio" class="custom-control-input" name="pendidikan" value="SMP/MTS/Sederajat" id="customControlValidation16" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation16">SMP/MTS/Sederajat</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="pendidikan" value="SMA/SMK/Sederajat" id="customControlValidation17" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation17">SMA/SMK/Sederajat</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="pendidikan" value="D1" id="customControlValidation18" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation18">D1</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="pendidikan" value="D2" id="customControlValidation19" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation19">D2</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="pendidikan" value="D3" id="customControlValidation20" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation20">D3</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="pendidikan" value="S1" id="customControlValidation21" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation21">S1</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="pendidikan" value="S2" id="customControlValidation22" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation22">S2</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="pendidikan" value="S3" id="customControlValidation24" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation24">S3</label>
                                        </div>
                                     </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-md-3">Bahasa</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="bahasa" value="Jawa" id="customControlValidation25" name="radio-stacked" required>
                                            <label class="custom-control-label"  for="customControlValidation25">Jawa</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="bahasa" value="Indonesia" id="customControlValidation26" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation26">Indonesia</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                           <input type="radio" class="custom-control-input" name="bahasa" value="Inggris" id="customControlValidation27" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation27">Inggris</label>
                                        </div>
                                        
                                     </div>
                            </div>                                 
                            </div>
                               <div class="form-action">
                                    <div class="card-body">        
                                        <button class="btn btn-primary"  name="Submit"  type="Submit">Tambah Pasien</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection