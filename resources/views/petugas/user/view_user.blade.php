@extends('layouts.petugasLayout.petugas_design')
@section('content')

 <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data User</h4><br><br>
                    </div>
                </div>
            </div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">      
                                    
                    @if ($message = Session::get('flash_message_success'))
                                      <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                          <strong>{{ $message }}</strong>
                                      </div>
                                    @endif

                                    @if ($message = Session::get('flash_messgae_error'))
                                      <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                        <strong>{{ $message }}</strong>
                                      </div>
                                    @endif

                                   
                    <a href="{{ route('user.create') }}"  class="btn btn-primary">Tambah User</a><br><br>
                        <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Nama </th>
                                <th>Email</th>
                                <th>Level</th>	                      
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                    @foreach($users as $user)          	
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->level }}</td>                              
                                    <td class="center">  
                                       <form class="row" method="POST" action="{{ route('user.destroy', ['id' => $user->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                         <input type="hidden" name="_method" value="DELETE">
                                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                         <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-success btn-sm ">
                                         Edit
                                         </a>&nbsp;
                                         @if ($user->name != Auth::user()->name)
                                         <button type="submit" class="btn btn-danger btn-sm ">
                                        Delete
                                        </button>
                                        @endif
                                     </form>
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