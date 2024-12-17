@extends('master.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="padding-top: 100px;">
            <div class="card">
                <div class="card-header">Posts</div>
                    <div class="card-body">
                        @auth
                        <form method="GET" action="{{ route('posts.index') }}">
                            <div class="input-group mb-3">
                                <input type="text" name="search" class="form-control" placeholder="Search posts">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </form>
                        <div class="container">
                            <h1>Daftar Postingan</h1>
                            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Tambah Postingan</a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Kategori</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $post->from }}</td>
                                            <td>{{ $post->to }}</td>
                                            <td>{{ $post->category->name }}</td>
                                            <td>
                                                @if ($post->image)
                                                    <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}" class="img-thumbnail" width="100">
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-info">Detail</a>
                                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus postingan ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $posts->links() }}
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