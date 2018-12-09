<!DOCTYPE html>
<html>
<head>
   <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/assets/images/logo1.png') }}">
  <title>Bukti Pendaftaran</title>
  <style type="text/css">
      @media print {
        html, body {
          width: 111mm;
          height: 146mm;
        }
      }
  </style>
</head>
<body>  
  <br>
        <center><h2>RS. AISYIAH MUNTILAN</h2>
          <hr>
        <p>Jl. KH Admad Dahlan, Pucang Rejo No. 24 Muntilan - Magelang</p></center>
        <div><br>

          <center><div style="text-transform: capitalize; font-size: 14pt">Poli : {{ $poly->nama_poliklinik }}</div></center>
          <center><div style="text-transform: capitalize; font-size: 14pt">Dokter : {{ $dokter->nama }}</div></center><br><br><br><br><br>
          <center><div style="text-transform: capitalize; font-size: 44pt">{{ $booking->no_antrian }}</div></center><br><br><br>
          <center><div style=" font-size: 16pt">Nomor RM: {{ $pasien->id }}</div></center><br>
          <center><div style=" font-size: 16pt; font-weight: bold">{{ $pasien->name }}</div></center><br>
          <center><div style=" font-size: 16pt">{{ $booking->tanggal_jadwal}}</div></center>
          <center><div style=" font-size: 16pt">{{ $hari_jadwal->jam_mulai }} - {{$hari_jadwal->jam_berakhir}}</div></center>
        </div>

<script type="text/javascript">
  window.print();
  setTimeout(window.close, 0);
</script>

</body>
</html>