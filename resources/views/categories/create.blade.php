@extends('master.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="padding-top: 100px;">
            <div class="card">
                <div class="card-header">Categories</div>
                    <div class="card-body">
                        @auth
                            <div class="container">
                                <h1>Tambah Kategori</h1>
                                <form action="{{ route('categories.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                            @endsection
                        @else
                        <p>Hanya admin yang diperbolehkan mengakses halaman ini.</p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
