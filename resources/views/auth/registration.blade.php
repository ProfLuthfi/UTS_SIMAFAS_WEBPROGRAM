@extends('layout')

@section('content')
<main class="my-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Register</h1>
                        <form action="{{ route('register.post') }}" method="POST">
                            @csrf
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="name" placeholder="Name" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="email" placeholder="Email" required>
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
                                <select class="form-select" name="role_id" aria-label="Select Role" required>
                                    <option value="">Choose Role</option>
                                    @foreach($roles as $val)
                                        <option value="{{$val->guid}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role_id'))
                                    <span class="text-danger">{{ $errors->first('role_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}">Already have an account? Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
