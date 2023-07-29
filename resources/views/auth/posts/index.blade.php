@extends('layouts.auth')

@section('title','Posts')

@section('styles')
<!-- FontAwesome v6.6.6 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link href="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
    rel="stylesheet" />
@endsection

<style>
#outer {
    /* width: 100%; */
    text-align: center;
}

.inner {
    display: inline-block;
}
</style>

@section('content')

<div class="content-wrapper">

    <div class="content">
        <div class="card card-default">
            <div class="card-header">
                <h2>Posts</h2>
            </div>
            @if (Session::has('alert-success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ Session::get('alert-success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @endif
            @if (Session::has('alert-info'))

            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ Session::get('alert-info') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @endif
            @if (Session::has('alert-warning'))

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ Session::get('alert-warning') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @endif
            <div class="card-body">
                @if (count($posts)>0 ) <div class="table-responsive">
                    <table class="table table-primary" id="posts">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Username</th>
                                <th scope="col">Status </th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post )
                            <tr>
                                <td><img src="{{ $post->gallery->image}}" style="width: 100px;" alt="">
                                </td>
                                <td>{{ Str::limit($post->title, 10,'...') }}</td>
                                <td>{{ Str::limit($post->description,15,'..')}}</td>
                                <td>{{ $post->category->name}}</td>
                                <td>{{ $post->user->name}}</td>
                                <td>{{ $post->status ==  1 ? 'Active': 'InActive'}}</td>
                                <td id=" outer">
                                    <a href="{{ route('posts.show',$post->id) }}" class="btn btn-success btn-sm inner">
                                        <i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-info btn-sm inner"><i
                                            class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('posts.destroy',$post->id) }}" method="post" class="inner">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit"><a class=" btn btn-danger btn-sm inner"><i
                                                    class="fa-solid fa-trash"></i>
                                            </a></button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @else
                <h3 class="text-center text-danger">No Posts Found</h3>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://kit.fontawesome.com/3f696bc338.js" crossorigin="anonymous"></script>
<script src="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('#posts').DataTable({
        "bLengthChange": false,
    });
});
</script>





















@endsection