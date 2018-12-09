@extends('layouts.petugasLayout.petugas_design')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user.update', ['id' => $users->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                        <h4 class="card-title">Edit User</h4>
                        <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-3 control-label col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $users->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-3 control-label col-form-label">Email</label>

                            <div class="col-sm-9">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $users->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                      
                        
                        <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-sm-3 control-label col-form-label">Password Baru</label>

                            <div class="col-sm-9">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-3 control-label col-form-label">Konfirmasi Password</label>

                            <div class="col-sm-9">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-action">
                                    <div class="card-body">        
                                        <button class="btn btn-primary"  name="Submit"  type="Submit">Edit User</button>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection