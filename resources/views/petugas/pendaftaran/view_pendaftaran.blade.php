@extends('layouts.petugasLayout.petugas_design')
@section('content')

 <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Pendaftaran Online</h4><br><br><br>
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
                    @if(Session::has('flash_message_success'))
                        <div class="alert alert-succes alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{!! session('flash_message_success') !!}</strong>
                        </div>
                    @endif
                    <a href="{{ url('/pendaftaran') }}"  class="btn btn-primary">Tambah Pendaftaran</a><br><br>
                        <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No RM</th>
                                <th>Nama Pasien</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>	
                                <th>No Antrian</th>
                                <th>Poli</th> 
                                <th>Dokter</th>                       
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)           	
                                <tr>
                                    <td>{{ $booking->id_pasien }}</td>
                                    <td>{{ $booking->name }}</td>
                                    <td>{{ date('d F Y', strtotime($booking->tanggal_jadwal)) }}</td>
                                    <td>{{ $booking->jam_mulai }} - {{ $booking->jam_berakhir }}</td>
                                    <td>{{ $booking->no_antrian }}</td>
                                    <td>{{ $booking->nama_poliklinik }}</td>
                                    <td>{{ $booking->nama }}</td>
                                                                                                   
                                    <td class="center">  
                                       <!--  <a href="{{ url('pendaftaran/jadwal', ['id_jadwal' => $booking->id_jadwal, 'id_pasien'=>$booking->id_pasien]) }}"  class="btn btn-primary btn-sm">Detail</a> -->
                                        <a target="_blank" data-toggle="tooltip" rel="tip-top" data-original-title="Cetak No Antrian" href="{{ url('pendaftaran/print', ['id_pasien' => $booking->id_pasien, 'id_jadwal'=>$booking->id_harijadwal]) }}"  class="btn btn-primary btn-sm">Cetak</a>

                                       <!--  <a href="{{ url('pendaftaran/done', $booking->id) }}" class="btn btn-success btn-sm">Selesai</a>  -->
                                        <a data-toggle="tooltip" rel="bottip" data-original-title="Batalkan Pendaftaran" href="{{ url('pendaftaran/destroy', $booking->id) }}"  class="btn btn-danger btn-sm">Batal</a>
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
<script type="text/javascript">
    $(document).ready(function(){
        $("[rel=tooltip]").tooltip({ placement: 'top'});
    });
    $(document).ready(function(){
        $("[rel=bottip]").tooltip({ placement: 'bottom'});
    });
</script>