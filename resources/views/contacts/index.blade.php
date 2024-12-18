@extends('master.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="padding-top: 100px;">
            <div class="card">
                <div class="card-header">Pengaduan</div>
                    <div class="card-body">
                        @auth
                        <form method="GET" action="{{ route('contacts.index') }}">
                            <div class="input-group mb-3">
                                <input type="text" name="search" class="form-control" placeholder="Search contacts">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </form>
                        <div class="container">
                            <h1>Daftar Pengaduan</h1>
                            <a href="{{ route('contacts.create') }}" ></a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Isi</th>
                                        <th>Link</th>
                                        <th>Dikirim Pada</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->message }}</td>
                                            <td>{{ $contact->link }}</td>
                                            <td>{{ $contact->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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