@extends('layout')

@section('content')
<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Login</h1>
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="{{ route('register') }}">Create an Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
