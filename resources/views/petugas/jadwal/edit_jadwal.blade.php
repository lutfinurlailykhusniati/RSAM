@extends('layouts.petugasLayout.petugas_design')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" method="post" action="{{ url('/edit-jadwal/'.$jadwalDetails->id_jadwal.'/'.$jadwalDetails->id_hari) }}" id="edit-polyclinic"> {{ csrf_field() }}
                     <div class="card-body">
                        <h4 class="card-title">Edit Jadwal</h4>

                            <!-- <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Nama Dokter</label>
                                    <div class="col-md-9">
                                        <select name="dokter_id" id="dokter_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                        @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}" 
                                            @if ($doctor->id === $jadwalDetails->dokter_id)
                                            selected
                                            @endif
                                                > {{ $doctor->nama }}</option>

                                        @endforeach

                                        </select>
                                    </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Nama Dokter</label>
                                <div class="col-sm-9">
                                        <input type="text" class="form-control" name="dokter_id" id="dokter_id"  value="{{ $jadwalDetails->Doctor->nama }}" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Hari</label>
                                    <div class="col-sm-9">
                                    
                                        <select name="hari" class="form-control">
                                           @foreach($haris as $hari)
                                            <option value="{{ $hari->id }}" 
                                            @if ($hari->id === $jadwalDetails->id_hari)
                                            selected
                                            @endif
                                                > {{ $hari->hari }}</option>

                                        @endforeach
                                    </select>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Jam Mulai</label>
                                <div class="col-sm-9">
                                        <input type="text" class="form-control" name="jam_mulai" id="jam_mulai" placeholder="Jam Mulai" value="{{ $jadwalDetails->jam_mulai }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Jam Berakhir</label>
                                <div class="col-sm-9">
                                        <input type="text" class="form-control" name="jam_berakhir" id="jam_berakhir" placeholder="Jam Berakhir" value="{{ $jadwalDetails->jam_berakhir }}" >
                                </div>
                            </div>


            
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Kuota</label>
                                <div class="col-sm-9">
                                        <input type="text" class="form-control" name="kuota" id="kuota" placeholder="Kuota" value="{{ $jadwalDetails->kuota }}" >
                                </div>
                            </div>                                                                
                            </div>
                               <div class="form-action">
                                    <div class="card-body">        
                                        <button class="btn btn-primary"  type="Submit">Edit Jadwal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection