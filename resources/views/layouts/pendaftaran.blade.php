@extends('layouts.app2')
@section('content')
<section id="contact" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <br><br><br><br>
        <h2 class="ser-title">Pendaftaran Online</h2>
        <hr class="botm-line">
        <div class="card">
                    <div class="card-body wizard-content">
                        <h3 class="card-title"><center>Form Pendaftaran Online</center></h3>
                        <h6 class="card-subtitle"></h6>
                            <div>
                                <form action="{{ url('daftar') }}" method="POST">
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
                                    <input type="hidden" name="referer" value="ngarep">
                            
                            <div class="form-group"><center>
                                <label for="exampleInputEmail1" class="col-sm-5"><h4>Nomor Rekam Medis</h4></label>
                                <div class="col-sm-5">
                                <input type="text" name="norm" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor Rekam Medis" onkeypress="return isNumberKeyTrue(event)">
                               <!--  <small id="emailHelp" class="form-text text-muted">*No Rekam Medis Tertera pada Kartu Berobat Pasien</small> -->
                                </div><br>
                            </div></center><br><br>
                            <div class="form-group"><center>
                                <label for="exampleInputEmail1" class="col-sm-5"><h4>Tanggal Lahir Pasien</h4></label>
                                <div class="col-sm-5">
                                <input type="date" name="tanggal_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <!-- <small id="emailHelp" class="form-text text-muted">*contoh 13 November 1995 = : 11/13/1995</small> -->
                                </div><br><br>
                            </div></center>
                            <div class="form-group"><center>
                           <div class="col-sm-11">                  
                              <button type="submit" class="btn btn-primary">Submit</button></div></div></center>
                            </form><br><br><br>
                            @if(isset($pasien))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                
                                  <strong><center>Pasien ditemukan dengan nama {{ $pasien->name }}</center></strong>
                              </div>
                            
                            @endif
                            
                            </div>
                    </div>
                </div>
                <br>
                @if(isset($polyclinics))
                <div class="card">
                    <div class="card-body wizard-content">
                        <h6 class="card-subtitle"></h6>
                        <div class="form-group"><center>
                                <label for="exampleInputEmail1" class="col-sm-5"><h4>Pilih Poli</h4></label>
                                <div class="col-sm-5">
                                <select name="poli" class="form-control" id="pilihpoli" >
                                    <option value="00">.. Pilih Poli ..</option>
                                    @foreach($polyclinics as $poly)
                                    <option value="{{ $poly->id }}">{{ $poly->nama_poliklinik }}</option>
                                    @endforeach
                                </select>
                                </div><br><br>
                            </div></center>
                            
                    </div> 
                </div>
                <br><br><br>
                <div class="card">
                    <div class="card-body wizard-content"><center>
                        <h4 class="card-title">Pilih Jadwal</h4><br>
                        <h6 class="card-subtitle"></h6>
                        <div id="tabelnya">
                        </div>
                    </div> 
                </div>
                @endif
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
          url: '{{ url('daftar/get-jadwal') }}/'+valuex+'/@if(isset($pasien)){{$pasien->id }}@endif',
          type: 'GET',
          data: "{}",
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          success: function(response) {
            console.log(response[0]);

            isi = '<div class="table-responsive"><table class="table"><thead class="thead-light"><tr><td>Nama Dokter</td><td>Hari</td><td>Tanggal</td><td>Jam Mulai</td><td>Jam Berakhir</td><td>Pesan</td></tr></thead><tbody>';
            
            for (var i=0; i<response.length; i++) {
              if(response[i].sisa_kuota > 0){
                isi = isi + '<tr><td>'+response[i].nama+'</td><td>'+response[i].hari+'</td><td>'+response[i].tanggal+'</td><td>'+response[i].jam_mulai+'</td><td>'+response[i].jam_berakhir+'</td><td><a class="btn btn-primary" href="{{ url("daftar/jadwal") }}/'+response[i].id+'/@if(isset($pasien)){{$pasien->id }}@endif/'+response[i].tanggal+'">Pilih</a></td></tr>';
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
