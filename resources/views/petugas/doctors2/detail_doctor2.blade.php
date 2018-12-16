@extends('layouts.petugasLayout.petugas_design')
@section('content')
 <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Detail Dokter</h4><br>
                    </div>
                </div>
            </div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <a href="{{ url('/edit-doctor2/'.$detailDoctor2->id) }}"  class="btn btn-primary">Edit Dokter 2</a><br>
                        <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <tr>
                                <td> ID Dokter</td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailDoctor2->id }} </td>
                            </tr>
                            <tr>
                                <td> Status Dokter</td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailDoctor2->status }} </td>
                            </tr>
                            <tr>
                                <td> Nama Dokter</td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailDoctor2->nama }} </td>
                            </tr>
                            <tr>
                                <td> Alamat </td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailDoctor2->alamat }} </td>
                            </tr>
                            <tr>
                                <td> Poli</td>
                                <td><center>:</td>
                                <td colspan = 9> @foreach ($detailDoctor2->polipolinya as $key => $value)
                                                    {{ ($key+1).'. '.$value->nama_poliklinik }}<br>
                                                 @endforeach </td>
                            </tr>
                            <tr>
                                <td> Nama Dokter</td>
                                <td><center>:</td>
                                <td colspan = 9> {{ $detailDoctor2->nama }} </td>
                            </tr>

                            <tr>
                                <td> Tempat Tanggal Lahir </td>
                                <td><center>:</center></td>
                                <td colspan=9>{{ $detailDoctor2->tempat_lahir }}, {{ $detailDoctor2->tanggal_lahir }} </td>
                            <tr>


                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
