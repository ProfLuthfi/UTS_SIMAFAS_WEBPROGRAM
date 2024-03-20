@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @elseif (session('failed'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('failed') }}
                    </div>
                @endif
                <div class="card-header">{{ __('Fasilitas List') }}</div>

                <div class="card-body">
                    <a href="{{ route('fasilitas.create') }}" class="btn btn-sm btn-secondary">
                        Tambah Fasilitas
                    </a>

                    <a href="{{ route('generate-pdf') }}" class="btn btn-sm btn-primary">
                        Cetak PDF
                    </a>

                    <a href="{{ route('generate-excel') }}" class="btn btn-sm btn-primary">
                        Cetak EXCEL
                    </a>
                    <table class="table" id="fasilitas">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Fasilitas</th>
                                <th scope="col">alamat</th>
                                <th scope="col">PJ Fasilitas</th>
                                <th scope="col">kondisi</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach($fasilitas as $row)
                            <?php $no++ ?>
                            <tr>
                                <th scope="row">{{ $no }}</th>
                                <td>{{$row->nama_fasilitas}}</td>
                                <td>{{$row->alamat}}</td>
                                <td>{{$row->Pj_fasilitas}}</td>
                                <td>{{$row->kondisi?->name}}</td>
                                <td>
                                    <a href="{{ route('fasilitas.edit', $row->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('fasilitas.destroy',$row->id) }}" method="POST"
                                        style="display: inline" onsubmit="return confirm('Do you really want to delete {{ $row->nama_fasilitas }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><span class="text-muted">
                                            Delete
                                        </span></button>
                                        </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    new DataTable('#fasilitas');
</script>
@endsection
