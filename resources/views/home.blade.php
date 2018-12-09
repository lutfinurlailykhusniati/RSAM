@extends('layouts.petugasLayout.petugas_design')
@section('content')
<div class="page-breadcrumb">
     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4><br>
                    </div>
                </div>
            </div>
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <a href="{{ url('/home') }}"h6 class="text-white">Dashboard</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3" href="{{ url('/view-pasiens') }}">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline" ></i></h1>
                                <a href="{{ url('/view-pasiens') }}"h6 class="text-white">Data Pasien</a></h6>
                            </div>
                        </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                                <a href="{{ url('/view-polyclinics') }}"h6 class="text-white">Data Poliklinik</a></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                                <a href="{{ url('view-doctors') }}"h6 class="text-white">Data Dokter</a></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-arrow-all"></i></h1>
                                <a href="{{ url('/view-jadwal') }}" h6 class="text-white">Data Jadwal Dokter</a></h6>
                            </div>
                        </div>
                    </div>    
                     <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                <a href="{{ url('/view-pendaftaran') }}"h6 class="text-white">Pendaftaran Online</h6>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-relative-scale"></i></h1>
                                <a href="{{ url('/report') }}"h6 class="text-white">Laporan Bulanan</a></h6>
                            </div>
                        </div>
                    </div>  

                    @can('isAdmin')
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-pencil"></i></h1>
                                <a href="{{ url('/view-user') }}" h6 class="text-white">User</a></h6>
                            </div>
                        </div>
                    </div>  
                    @endcan      
                </div>
            </div><br><br><br><br><br>
                                      
@endsection
