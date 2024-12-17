@extends('master.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="padding-top: 100px;">
            <div class="card">
                <div class="card-header">Categories</div>
                    <div class="card-body">
                        @auth
                            <form method="GET" action="{{ route('categories.index') }}">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control" placeholder="Search users">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </form>
                            <div class="container">
                                <h1>Daftar Kategori</h1>
                                <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $categories->links() }}
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
