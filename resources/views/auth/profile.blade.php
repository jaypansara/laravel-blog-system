@extends('layouts.auth')

@section('title','Profile| Admin Dashboard')

@section('styles')
@endsection

@section('content')
<div class="content-wrapper">

    <div class="content">
        <div class="card card-default">
            <div class="card-header">
                <h2>Update Profile</h2>

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
                @if (Session::has('alert-success'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Success! </strong>{{ Session::get('alert-success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <form method="post" action="">
                    @csrf
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name',$user ? $user->name:'') }}" class="form-control" autocomplete="off" placeholder=" Name">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email',$user ? $user->email:'') }}" class="form-control" autocomplete="off" placeholder=" email">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" autocomplete="off" placeholder="password">
                    </div>
                    <div class="mb-3">
                        <label>Confirm Password</label>
                        <input type="passwaord" name="password_confirmation" class="form-control" autocomplete="off" placeholder="Confirmed passwaord">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 ">Submit</button>
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
                        $('









                            #logout - form ').submit();
                        });
                });
</script>
@endsection