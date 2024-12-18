@extends('master.layout')

@section('content')
    <div class="container" style="padding-top: 130px; padding-bottom: 50px;">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4" style="color: #2C3E50;">Aturan Penggunaan Website Menfess</h1>
                <div class="card p-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h5><i class="bi bi-shield-lock"></i> <strong>Anonymity:</strong></h5>
                            <p>Pengguna diizinkan untuk mengirimkan pesan secara anonim. Tidak ada kewajiban untuk mengungkapkan identitas asli.</p>
                        </li>
                        <li class="list-group-item">
                            <h5><i class="bi bi-exclamation-circle"></i> <strong>Konten yang Dilarang:</strong></h5>
                            <ul>
                                <li>Tidak diperbolehkan mengirimkan pesan yang berisi ujaran kebencian, rasisme, diskriminasi, atau kekerasan terhadap individu atau kelompok.</li>
                                <li>Penggunaan kata-kata yang kasar, menghina, atau merendahkan orang lain sangat dilarang.</li>
                                <li>Tidak diperbolehkan untuk menyebarkan informasi palsu atau hoaks.</li>
                                <li>Tidak boleh mengirimkan konten yang melanggar hak cipta atau mencuri karya orang lain.</li>
                            </ul>
                        </li>
                        <li class="list-group-item">
                            <h5><i class="bi bi-shield-lock"></i> <strong>Privasi:</strong></h5>
                            <ul>
                                <li>Pengguna dilarang mengirimkan pesan yang berisi informasi pribadi orang lain tanpa izin, termasuk namun tidak terbatas pada alamat, nomor telepon, atau informasi sensitif lainnya.</li>
                                <li>Website ini berkomitmen untuk menjaga kerahasiaan data pengguna dan tidak akan membagikan informasi pengirim atau penerima pesan tanpa izin.</li>
                            </ul>
                        </li>
                        <li class="list-group-item">
                            <h5><i class="bi bi-chat-right-text"></i> <strong>Konten Positif dan Konstruktif:</strong></h5>
                            <p>Meskipun website ini memberikan kebebasan berkomunikasi secara anonim, kami mendorong pengguna untuk berpartisipasi dalam menciptakan lingkungan yang positif dan mendukung. Pesan yang bersifat motivasional, positif, atau memberikan dukungan sangat dihargai.</p>
                        </li>
                        <li class="list-group-item">
                            <h5><i class="bi bi-person-check"></i> <strong>Tanggung Jawab Pengguna:</strong></h5>
                            <p>Pengguna bertanggung jawab sepenuhnya terhadap pesan yang dikirimkan. Pengelola website berhak menghapus pesan yang melanggar aturan dan memblokir pengguna yang terus melanggar kebijakan ini.</p>
                        </li>
                        <li class="list-group-item">
                            <h5><i class="bi bi-gavel"></i> <strong>Moderasi dan Pelaporan:</strong></h5>
                            <ul>
                                <li>Pengelola website berhak untuk memoderasi, menghapus, atau menangguhkan akses terhadap pesan yang dianggap melanggar aturan.</li>
                                <li>Pengguna dapat melaporkan pesan yang tidak sesuai dengan aturan atau melakukan pengaduan serta meminta penghapusan menfess melalui halaman <strong><a href="{{ route('contacts.create') }}">Kontak</a></strong> yang tersedia di website.</li>
                            </ul>
                        </li>
                        <li class="list-group-item">
                            <h5><i class="bi bi-arrow-repeat"></i> <strong>Perubahan Ketentuan:</strong></h5>
                            <p>Pengelola website berhak mengubah, memperbarui, atau memperbaiki aturan ini kapan saja. Setiap perubahan akan diberitahukan melalui pengumuman di website.</p>
                        </li>
                        <li class="list-group-item">
                            <h5><i class="bi bi-file-earmark-lock"></i> <strong>Penggunaan Layanan:</strong></h5>
                            <p>Pengguna setuju untuk tidak menggunakan layanan website menfess untuk tujuan ilegal atau yang bertentangan dengan hukum yang berlaku.</p>
                        </li>
                        <li class="list-group-item">
                            <h5><i class="bi bi-shield-lock"></i> <strong>Keamanan Website:</strong></h5>
                            <p>Pengguna diharapkan untuk tidak mencoba mengeksploitasi atau merusak keamanan website, baik itu melalui peretasan, penyebaran virus, atau tindakan berbahaya lainnya.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
