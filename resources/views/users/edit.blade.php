@extends('layouts.app')
@section('title', 'Edit User')
@section('content')
<style>
#user_form {
    max-width: 720px;
    margin: auto;
}

.btn-group1 .btn {
    min-width: 100px;
    margin-right: 10px;
    margin-bottom: 10px;
}

</style>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-2 pl-3 mb-2">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"> Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('users') }}"> Users</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Edit</li>
        </ol>
    </nav>
    
    <div id="user_form">
        <div class="card of-hide shadow-sm">
            <div class="card-header font-16 font-weight-bold px-3 py-2"> 
                Create
                <span class="fa fa-pencil font-20 pt-2 float-right"></span>
            </div>
            <div class="card-body pt-3">
        
                {{--@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif--}}
    
                <form class="form-horizontal" form method="post" action="{{ action('UserController@update', $user->id) }}" enctype="multipart/form-data">
					{{csrf_field()}}
					<input name="_method" type="hidden" value="PATCH">
    
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label">Name :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" name="name" value="{{ $user->name }}" autocomplete="on">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Email :</label>
                        <div class="col-sm-8">
                            <input type="email" class="email form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" id="email" name="email" value="{{ $user->email }}">
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <small class="offset-sm-4 pl-3 form-text text-muted">Biarkan kosong Jika Password Tidak diganti</small>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Password :</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password">
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Confirm Password :</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" placeholder="Password" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group row btn-group1 my-3">
                        <div class="offset-sm-4 col">
                            <button type="submit" class="btn btn-primary grad" name="submit"> Update</button>
                            <a href="{{ url('users') }}" class="btn btn-danger grad">Cancel | Back</a>
                        </div>
                    </div>
    
                </form>
        
            </div>
            <!-- /card-body -->
        </div>
        <!-- /card -->
    </div>

</div>


@push('scripts')

@endpush

@endsection