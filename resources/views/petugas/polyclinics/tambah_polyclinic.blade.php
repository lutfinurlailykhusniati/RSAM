@extends('layouts.petugasLayout.petugas_design')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" method="post" action="{{ url('/tambah-polyclinic') }}" name="tambah_pasien" id="tambah_pasien"> {{ csrf_field() }}
                     <div class="card-body">
                        <h4 class="card-title">Tambah Poli</h4>
                             <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Poliklinik</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_poliklinik" id="nama_poliklinik" placeholder="Nama Poliknilik">
                                    </div>
                            </div>
    
                            </div>
                               <div class="form-action">
                                    <div class="card-body">        
                                        <button class="btn btn-primary"  name="Submit"  type="Submit">Tambah Poli</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection