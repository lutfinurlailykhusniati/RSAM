@extends('layouts.app2')
  <!--banner-->
  <section id="banner" class="banner">
    <div class="bg-color">
      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
              <img src="{{ asset ('img/logoo.png') }}" class="img-responsive">
            </div>
            <div class="banner-text text-center">
              <h1 class="white">Selamat Datang !!!</h1><br>
              <p><b>Selamat Datang di Sistem Informasi Pendaftaran Online Pemeriksaan Kesehatan RS Aisyiyah Muntilan.</b></p>
              <a href="{{ url('lihatjadwal') }}" class="btn btn-appoint"><b>Lihat Jadwal</b></a>
              <a href="{{ url('daftar') }}" class="btn btn-appoint"><b>Daftar Sekarang!</b></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ banner-->
  <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <h2 class="ser-title">Ketentuan Umum Pendaftaran Online</h2>
          <hr class="botm-line"><br>
              <table style="margin: 0px 0px 0px;" border="0">
                <tbody>
                  <tr>
                    <td size="5px"><h5><li></li></h5></td>
                    <td><h5>Pendaftaran Online sementara ini hanya berlaku bagi Pasien yang telah memiliki No RM RS Aisyiyah Muntilan yang akan berobat Rawat Jalan</h5></td>
                  </tr>
                  <tr>
                    <td><h5><li></li></h5></td>
                    <td><h5>Bagi pasien baru yang belum pernah mendaftar di RS Aisyiyah Muntilan harap datang langsung ke Gedung RS Aisyiyah Muntilan</h5></td>
                  </tr>
                  <tr>
                    <td><h5><li></li></h5></td>
                    <td><h5>Pendaftaran Online dapat dilakukan untuk mendaftar dengan memasukkan : No RM , Tanggal Lahir, dan Pilihan Jadwal.</h5></td>
                  </tr>
                  <tr>
                    <td><h5><li></li></h5></td>
                    <td><h5>Apabila Anda telah melakukan pendaftaran Online, Anda akan mendapatkan Bukti pendaftaran yang dapat dicetak dan dibawa pada Hari Berobat.</h5></td>
                  </tr>
                  <tr>
                    <td><h5><li></li></h5></td>
                    <td><h5>Pasien yang telah melakukan registrasi online diharapkan datang tepat waktu</h5></td>
                  </tr>
                  <tr>
                    <td><h5><li></li></h5></td>
                    <td><h5>Apabila terlambat dan nomor antrian telah terpanggil, maka pasien akan menerima pemeriksaan kesehatan setelah semua nomor antrian terpanggil</h5></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

         <!--  <h5><li>Pendaftaran Online sementara ini hanya berlaku bagi Pasien yang telah memiliki No RM RS Aisyiyah Muntilan yang akan berobat Rawat Jalan</li>
          <li>Bagi pasien baru yang belum pernah mendaftar di RS Aisyiyah Muntilan harap datang langsung ke Gedung RS Aisyiyah Muntilan</li>
          <li>Pendaftaran Online dapat dilakukan untuk mendaftar dengan memasukkan : No RM , Tanggal Lahir, dan Pilihan Jadwal. </li> 
          <li>Apabila Anda telah melakukan pendaftaran Online, Anda akan mendapatkan Bukti pendaftaran yang dapat dicetak dan dibawa pada Hari Berobat.</li>
          <li>Pasien yang telah melakukan registrasi online diharapkan datang tepat waktu</li>
          <li>Apabila terlambat dan nomor antrian telah terpanggil, maka pasien akan menerima pemeriksaan kesehatan setelah semua nomor antrian terpanggil </li></h5><br> -->
         <!--  <center><a href="{{ url('lihatjadwal') }}" class="btn btn-primary"><b>Lihat Jadwal</b></a>
          <a href="{{ url('daftar') }}" class="btn btn-success btn-sm"><b>Daftar Sekarang!</b></a> -->
        </div>
      </div>
    </div>
  </section>

  

       

        
        </div>
      </div>
    </div>
  </section>

  
 