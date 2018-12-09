<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/home') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                         
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/view-pasiens') }}" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Data Pasien</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/view-polyclinics') }}" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu">Data Poli</span></a></li>
              
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"  href="{{ url('view-doctors') }}" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Data Dokter</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"  href="{{ url('view-doctors2') }}" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Data Dokter 2</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/view-jadwal') }}" ria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Data Jadwal Dokter</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/view-jadwal2') }}" ria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Data Jadwal Dokter 2</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/view-pendaftaran') }}" aria-expanded="false"><i class="mdi mdi-note-plus"></i><span class="hide-menu">Pendaftaran Online</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/report') }}" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Laporan Bulanan</span></a></li>

                @can('isAdmin')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/view-user') }}" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Users</span></a></li>
                  @endcan
    
              </ul>
         </nav>
        <!-- End Sidebar navigation -->
     </div>
    <!-- End Sidebar scroll-->
</aside>