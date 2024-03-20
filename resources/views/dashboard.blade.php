@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h1 class="display-4">Hello, {{ auth()->user()->name }}</h1>
                    <p class="lead">Welcome to your dashboard!</p>
                    <p>Great to have you here. Feel free to explore and manage your account.</p>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <p>You are Logged In</p>

                    <div class="d-flex justify-content-center">
                        <!-- Jumlah Pengguna -->
                        <div class="statistic-box mr-2" style="margin-right: 10px;">
                            <div class="icon-box">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <div class="statistic-info">
                                <div class="statistic-value">1000</div> <!-- Ganti dengan jumlah pengguna -->
                                <div class="statistic-title">Users</div>
                            </div>
                        </div>

                        <!-- Jumlah Fasilitas -->
                        <div class="statistic-box ml-2" style="margin-left: 10px;">
                            <div class="icon-box">
                                <i class="fas fa-building fa-2x"></i>
                            </div>
                            <div class="statistic-info">
                                <div class="statistic-value">500</div> <!-- Ganti dengan jumlah fasilitas -->
                                <div class="statistic-title">Facilities</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
