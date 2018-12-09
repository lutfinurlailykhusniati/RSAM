@extends('layouts.petugasLayout.petugas_design')
@section('content')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card" id="print-kartu">
                    <div class="card-body wizard-content">
                        <h4 class="card-title">Data Pemeriksaan</h4><br>
                        <h6 class="card-subtitle"></h6>
                        <div>
                            <table class="table">
                                <tr>
                                  <td>Nama</td>
                                  <td>:</td>
                                  <td>{{ $pasien->name }}</td>
                                </tr>
                                <tr>
                                  <td>No RM Pasien </td>
                                  <td>:</td>
                                  <td>{{ $pasien->id }}</td>
                                </tr>
                                <tr>
                                  <td>Poli Tujuan</td>
                                  <td>:</td>
                                  <td>{{ $poly->nama_poliklinik }}</td>
                                </tr>
                                <tr>
                                  <td>Dokter</td>
                                  <td>:</td>
                                  <td>{{ $dokter->nama }}</td>
                                </tr>
                                <tr>
                                  <td>Jadwal</td>
                                  <td>:</td>
                                  <td>{{ $booking->tanggal_jadwal }}</td>
                                </tr>
                                <tr>
                                  <td>Jam</td>
                                  <td>:</td>
                                  <td>{{ $hari_jadwal->jam_mulai }} - {{$hari_jadwal->jam_berakhir}}</td>
                                </tr>
                                <tr>
                                  <td>No Antrian</td>
                                  <td>:</td>
                                  <td>{{ $booking->no_antrian }}</td>
                                </tr>
                            </table>
                            <p>*NB : Silahkan Cetak Bukti Pendaftaran atau Screenshot Halaman Data Pemeriksaan ini sebagai bukti pendaftaran online</p>
                            <div style="float: right;">
                            <a target="_blank" href="{{ url('pendaftaran/print') }}/{{ $pasien->id.'/'.$hj->id }}" class="btn btn-default" >Print</a>
                                <a href="{{ url('view-pendaftaran') }}" class="btn btn-primary" >OK</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
@section('extra-js')
<script type="text/javascript">
    $('document').ready(function(){
        $("#btn-print").on('click', function(){
            $('#print-kartu').print();
        });
    });
</script>

@endsection
