@extends('layouts.petugasLayout.petugas_design')
@section('content')



             <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-4">
          <h3 class="box-title">Laporan Pendaftaran Online</h3>
        </div>
        <div class="col-sm-10">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('report.excel') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$searchingVals['from']}}" name="from" />
                <input type="hidden" value="{{$searchingVals['to']}}" name="to" />
                <button type="submit" class="btn btn-primary" style="float:right">
                  Export to Excel
                </button>
            </form>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-9"></div>
        <div class="col-sm-9"></div>
      </div>
      <form method="POST" action="{{ route('report.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => ''])
          @component('layouts.two-cols-date-search-row', ['items' => ['From', 'To'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['from'] : '', isset($searchingVals) ? $searchingVals['to'] : '']])
          @endcomponent
         @endcomponent
        
      </form>
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">      
              
                        <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No RM </th>
                                <th>Nama Pasien </th>
                                <th>Tanggal </th>
                                <th>Waktu</th>
                                <th>No Antrian</th>  
                                <th>Poli</th>  
                                 <th>Nama Dokter</th>                            
                            </tr>
                            </thead>
                            <tbody>
                                
                              @foreach($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->Pasien->id }}</td>
                                    <td>{{ $booking->Pasien->name }}</td>
                                    <td>{{ $booking->tanggal_jadwal }}</td>
                                    <td>{{ $booking->jam_mulai }} - {{ $booking->jam_berakhir }} </td>
                                    <td>{{ $booking->no_antrian}}</td>
                                    <td>{{ $booking->Jadwal->Doctor->Polyclinic->nama_poliklinik }}</td>
                                    <td>{{ $booking->Jadwal->Doctor->nama }} </td>

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
    </section>
    <!-- /.content -->
  </div>

@endsection
@section('extra-js')
<script type="text/javascript">
  $(document).ready(function(){
    $('#golek').on('click', function(){
      $('#golekane').toggle("slow");
  });
});
</script>
  

@endsection