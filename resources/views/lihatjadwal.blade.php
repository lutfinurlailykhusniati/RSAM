@extends('layouts.app2')
@section('content')
<section id="contact" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <br><br><br><br>
        <h2 class="ser-title">Jadwal Dokter</h2>
        <hr class="botm-line"><br>
        <div class="card">
          <div class="card-body wizard-content">
            <h6 class="card-subtitle"></h6>
              <div class="form-group"><center>
                <label for="exampleInputEmail1" class="col-sm-5"><h4> Pilih Poli</h4></label>
                  <div class="col-sm-5">
                    <select name="poli" class="form-control" id="pilihpoli" >
                    <option value="00">.. Pilih Poli ..</option>
                    @foreach($polyclinics as $poly)
                    <option value="{{ $poly->id }}">{{ $poly->nama_poliklinik }}</option>
                    @endforeach
                    </select>
                  </div><br><br>
            </div>    
          </center>     
        </div>
        <br><br>

          <div id="tabelnya"></div><br>
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
           url: '{{ url('lihatjadwal/get-jadwal') }}/'+valuex+'/@if(isset($poli))@endif',
          type: 'GET',
          data: "{}",
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          success: function(response) {
            console.log(response[0]);

            isi = '<div class="table-responsive"><div class="table-responsive"><table class="table"><thead class="thead-light"><tr><td><h4>Nama Dokter</h4></td><td><h4>Hari</h4></td><td><h4>Tanggal</h4></td><td><h4>Jam Mulai</h4></td><td><h4>Jam Berakhir</h4></td><td><h4>Status<h4></td></tr></thead><tbody>';
            
            for (var i=0; i<response.length; i++) {
              if(response[i].sisa_kuota > 0){
                isi = isi + '<tr><td>'+response[i].nama+'</td><td>'+response[i].hari+'</td><td>'+response[i].tanggal+'</td><td>'+response[i].jam_mulai+'</td><td>'+response[i].jam_berakhir+'</td><td><span class="label label-primary label-lg" disabled>Tersedia</a></td></tr>';

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
