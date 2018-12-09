@extends('layouts.app2')
@section('content')
<section id="contact" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <br><br><br><br>
        <h2 class="ser-title">Rekap</h2>
        <hr class="botm-line">
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
                                  <td>Tanggal Lahir</td>
                                  <td>:</td>
                                  <td>{{ $pasien->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                  <td>Tempat Lahir</td>
                                  <td>:</td>
                                  <td>{{ $pasien->tempat_lahir }}</td>
                                </tr>
                                  <td>Poli</td>
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
                            <a target="_blank" href="{{ url('daftar/print') }}/{{ $pasien->id.'/'.$hj->id }}" class="btn btn-default" >Print</a>
                                <a href="{{ url('/') }}" class="btn btn-primary" >OK</a> 
                            </div>
                        </div>
      </div>
    </div>
  </div>

</section>
@endsection
@section('extra-js')
<script type="text/javascript">
    $('#pilihpoli').on('change', function(){
        var valuex = $(this).val();
        var isi;   
        $.ajax({
          url: '{{ url('pendaftaran/get-jadwal') }}/'+valuex+'/@if(isset($pasien)){{$pasien->id }}@endif',
          type: 'GET',
          data: "{}",
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          success: function(response) {
            console.log(response[0]);

            isi = '<table class="table"><thead class="thead-light"><tr><td>Nama Dokter</td><td>Tanggal Jadwal</td><td>Jam Mulai</td><td>Jam Berakhir</td><td>Pesan</td></tr></thead><tbody>';
            
            for (var i=0; i<response.length; i++) {
              if(response[i].sisa_kuota){
                isi = isi + '<tr><td>'+response[i].nama+'</td><td>'+response[i].tanggal_jadwal+'</td><td>'+response[i].jam_mulai+'</td><td>'+response[i].jam_berakhir+'</td><td><a class="btn btn-primary" href="{{ url("pendaftaran/jadwal") }}/'+response[i].id+'/@if(isset($pasien)){{$pasien->id }}@endif">Pilih</a></td></tr>';
              }else{
                isi = isi + '<tr><td>'+response[i].nama+'</td><td>'+response[i].tanggal_jadwal+'</td><td>'+response[i].jam_mulai+'</td><td>'+response[i].jam_berakhir+'</td><td><button class="btn btn-danger" disabled>Penuh</button></td></tr>';
              }
            }

            isi = isi + '</tbody></table>';

            document.getElementById("tabelnya").innerHTML= isi;

          },
          error: function(e) {
            alert('gagal');
          }
        });
    });
</script>
@endsection
