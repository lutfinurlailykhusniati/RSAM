@extends('layouts.petugasLayout.petugas_design')
@section('content')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                            
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-body wizard-content">
                        <h3 class="card-title">Form Pendaftaran</h3>
                        <h6 class="card-subtitle"></h6>
                            <div>
                                <form action="{{ url('pendaftaran') }}" method="POST">

                                    {{ csrf_field() }}
                                    @if ($message = Session::get('success'))
                                      <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                          <strong>{{ $message }}</strong>
                                      </div>
                                    @endif

                                    @if ($message = Session::get('error'))
                                      <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                        <strong>{{ $message }}</strong>
                                      </div>
                                    @endif

                                    @if ($message = Session::get('warning'))
                                      <div class="alert alert-warning alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @endif

                                    @if ($message = Session::get('info'))
                                      <div class="alert alert-info alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                        <strong>{{ $message }}</strong>
                                      </div>
                                    @endif
                                    <br>
                                    <input type="hidden" name="referer" value="admin">
                              <div class="form-group">
                                <div class="col-sm-9">
                                <label for="exampleInputEmail1">Nomor Rekam Medis</label>
                                <input type="text" name="norm" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor Rekam Medis">
                              </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-9">
                                <label for="exampleInputPassword1">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" id="exampleInputPassword1"   aria-describedby="emailHelp">
                                <!-- <small id="emailHelp" class="form-text text-muted">contoh 13 November 1995 = : 11/13/1995</small> -->
                                <div class="col-sm-9">
                              </div><br>
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </form><br><br>
                            @if(isset($pasien))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                  <strong><center>Pasien ditemukan dengan nama {{ $pasien->name }}</center></strong>
                              </div>
                            
                            @endif
                            
                            </div>
                    </div>
                </div>
                @if(isset($polyclinics))
                <div class="card">
                    <div class="card-body wizard-content">
                     
                        <h6 class="card-subtitle"></h6>
                            <div class="form-group" class="row justify-content-md-center">
                                <label for="exampleInputEmail1" class="col-3 offset-md-3">Pilih Poli</label>
                                <select name="poli" class="form-control col-3 offset-md-3" id="pilihpoli" >
                                    <option value="00">.. Pilih poli ..</option>
                                    @foreach($polyclinics as $poly)
                                    <option value="{{ $poly->id }}">{{ $poly->nama_poliklinik }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div> 
                </div>
                
                <div class="card">
                    <div class="card-body wizard-content">
                        <h4 class="card-title"><center>Pilih Jadwal</h4></center>
                        <h6 class="card-subtitle"></h6>
                        <div id="tabelnya">
                        </div>
                    </div> 
                </div>
                @endif
            </div>

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

            isi = '<div class="table-responsive"><table class="table"><thead class="thead-light"><tr><td>Nama Dokter</td><td>Hari</td><td>Tanggal</td><td>Jam Mulai</td><td>Jam Berakhir</td><td>Pesan</td></tr></thead><tbody>';
            
            for (var i=0; i<response.length; i++) {
              if(response[i].sisa_kuota > 0){
                isi = isi + '<tr><td>'+response[i].nama+'</td><td>'+response[i].hari+'</td><td>'+response[i].tanggal+'</td><td>'+response[i].jam_mulai+'</td><td>'+response[i].jam_berakhir+'</td><td><a class="btn btn-primary" href="{{ url("pendaftaran/jadwal") }}/'+response[i].id+'/@if(isset($pasien)){{$pasien->id }}@endif/'+response[i].tanggal+'">Pilih</a></td></tr>';
              }else{
                isi = isi + '<tr><td>'+response[i].nama+'</td><td>'+response[i].hari+'</td><td>'+response[i].tanggal+'</td><td>'+response[i].jam_mulai+'</td><td>'+response[i].jam_berakhir+'</td><td><button class="btn btn-danger" disabled>Penuh</button></td></tr>';
              }
            }

            isi = isi + '</tbody></table></div>';

            document.getElementById("tabelnya").innerHTML= isi;

          },
          error: function(e) {
            alert('gagal');
          }
        });
    });
</script>

@endsection