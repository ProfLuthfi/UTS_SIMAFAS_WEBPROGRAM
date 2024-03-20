@extends('layout')

@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Add Fasilitas</div>
                    <div class="card-body">
                        <form action="{{ route('fasilitas.store') }}" method="POST">
                            @csrf
                            <div class="form-group row mt-3">
                                <label for="nama_fasilitas" class="col-md-4 col-form-label text-right">Nama Fasilitas</label>
                                <div class="col-md-6">
                                    <input type="text" id="nama_fasilitas" class="form-control" name="nama_fasilitas" required autofocus>
                                    @if ($errors->has('nama_fasilitas'))
                                    <span class="text-danger">{{ $errors->first('nama_fasilitas') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="alamat" class="col-md-4 col-form-label text-right">Alamat</label>
                                <div class="col-md-6">
                                    <input type="text" id="alamat" class="form-control" name="alamat" required autofocus>
                                    @if ($errors->has('alamat'))
                                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="Pj_fasilitas" class="col-md-4 col-form-label text-right">PJ Fasilitas</label>
                                <div class="col-md-6">
                                    <input type="text" id="Pj_fasilitas" class="form-control" name="Pj_fasilitas" required autofocus>
                                    @if ($errors->has('Pj_fasilitas'))
                                        <span class="text-danger">{{ $errors->first('Pj_fasilitas') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                            <label for="role" class="col-md-4 col-form-label text-right">Kondisi</label>
                            <div class="col-md-6">
                                <select class="form-select" id="kondisi" name="kondisi" aria-label="kondisi">
                                    <option value="">Choose</option>
                                    @foreach($kondisis as $val)
                                        <option value="{{$val->guid}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                                    @if ($errors->has('kondisi'))
                                        <span class="text-danger">{{ $errors->first('kondisi') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4 mt-3 p-2 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
