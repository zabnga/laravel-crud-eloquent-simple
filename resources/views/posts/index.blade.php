@extends('layouts.app')
@section('title', 'Posts')
@section('content')

<style type="text/css">

</style>



<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-2 pl-3 mb-2">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Posts</li>
        </ol>
    </nav>

    <div class="card of-hide shadow-sm">
        <div class="card-header font-16 font-weight-bold px-3 py-2"> Posts
            <a href="{{ route('posts.create') }}" class="btn btn-sm btn-success grad float-right"><i class="fa fa-pencil"></i> Create</a>
        </div>
        <div class="card-body p-3">

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
            @endif
            
            <div class="table-responsive">
                <table id="post-table" class="table table-sm table-bordered table-hover" style="width: 100%">
                    <thead class="bg-light">
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Title</th>
                            {{-- <th>Body</th> --}}
                            <th>Created At</th>
                            {{-- <th>Updated At</th> --}}
                            <th width="130" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $x => $row)
                        <tr>
                            <td>{{ $x + 1 }}</td>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->user_id }}</td>
                            <td>{{ $row->title }}</td>
                            {{-- <td>{{ $row->body }}</td> --}}
                            <td>{{ $row->created_at }}</td>
                            {{-- <td>Updated At</td> --}}
                            <td class="text-center">
                                <form action="{{ action('PostController@destroy', $row->id) }}" method="post">
                                    @csrf
                                    <a href="{{ action('PostController@edit', $row->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
    
                </table>
                {{ $posts->links() }}

            </div>
    
        </div>
        <!-- /card-body -->
    </div>
    <!-- /card -->
</div>


@stop

@push('scripts')

@endpush