@extends('layouts.auth')

@section('title','Edit Post | Admin Dashboard')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
    integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="content-wrapper">

    <div class="content">
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Post</h2>
            </div>

            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="post" action="{{ route('posts.update',$post->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="title" name="title" value="{{ old('title',$post->title) }}" class="form-control"
                            autocomplete="off" placeholder="title">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea type="text" name="description" rows="3" cols="30" class="form-control" Descriptio
                            placeholder="Description"
                            style="resize: none;">{{ old('description',$post->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Is Publish</label>
                        <select name="status" class="form-control">
                            <option value="" disabled selected>Choose Option</option>
                            <option @selected( old('status', $post->status) == 1) value="1">Publish</option>
                            <option @selected( old('status', $post->status) == 0) value="0">Draft</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category" class="form-control ">
                            <option value="" disabled selected>Choose Option</option>
                            @if (count($categories)>0)
                            @foreach ($categories as $category)
                            <option @selected( old('category', $post->id) ==
                                $category->id)value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                            @endif
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Tags</label>
                        <select name="tags[]" class="form-control selectpicker" multiple data-live-search="true">
                            <option value="" disabled selected>Choose Option</option>
                            @if (count($tags)>0)
                            @foreach ($tags as $tag)
                            @if (count($post->tags)>0)
                            @foreach ($post->tags as $postTag)
                            <option @selected(old('tags',$postTag->id)==$tag->id)
                                value="{{ $tag->id }}">{{ $tag->name }}
                            </option>
                            @endforeach
                            @endif
                            @php
                            continue;
                            @endphp
                            <option value="{{ $tag->id }}">{{ $tag->name }}
                            </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="file" value="{{ old('file') }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#logout-button').click(function() {
        $('#logout-form').submit();
    });
});
</script>






























<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integri
    ty="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"
    integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
