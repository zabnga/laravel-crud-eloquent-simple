@extends('layouts.app')
@section('title', 'Edit Post')
@section('content')
<style>
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
            <li class="breadcrumb-item"><a href="{{ url('posts') }}"> Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Create</li>
        </ol>
    </nav>
    
    <div class="card of-hide shadow-sm">
        <div class="card-header font-16 font-weight-bold px-3 py-2"> 
            Create
            <span class="fa fa-pencil font-20 pt-2 float-right"></span>
        </div>
        <div class="card-body pt-3">
    
            <div class="post-form">
    
                {{--@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif--}}
    
				<form class="form-horizontal" form method="post" action="{{ action('PostController@update', $post->id) }}"
					enctype="multipart/form-data">
					{{csrf_field()}}
					<input name="_method" type="hidden" value="PATCH">
					{{-- <input name="post_id" type="hidden" value="{{ $post->id }}"> --}}
    
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Title :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="title" name="title" value="{{ $post->title }}" requiredz>
                            @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <small class="offset-sm-2 pl-1 form-text text-muted">Slug kosong otomatis dibuat, isi bila ingin custom slug.</small>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Slug :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" placeholder="slug" name="slug" value="{{ $post->slug }}">
                            @if ($errors->has('slug'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('slug') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
   
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend col-md-2 bg-info pl-1 pr-0 rounded">
                            <span class="input-group-text w-100" id="">Body :</span>
                        </div>
                    </div>
                    <textarea class="form-control tinymce {{ $errors->has('title') ? 'is-invalid': '' }}" placeholder="Body of Post..." name="body" cols="50" rows="10" id="body">{{ $post->body }}</textarea>
                    @if ($errors->has('body'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                    @endif
    
                    <div class="form-group btn-group1 my-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary grad" name="submit">Update</button>
                            {{-- <button type="submit" class="btn btn-success grad" name="submit" value="draft">Save as Draft</button> --}}
                            <a href="{{ url('posts') }}" class="btn btn-danger grad">Cancel | Back</a>
                        </div>
                    </div>
    
                </form>
            </div>
            <!-- /form -->
    
        </div>
        <!-- /card-body -->
    </div>
    <!-- /card -->
</div>


@push('scripts')

@endpush

@endsection