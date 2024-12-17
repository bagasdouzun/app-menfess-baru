<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-info fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('menfess-logo-new.png') }}" alt="Logo" style="height: 50px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        @if (!Auth::check())
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('profile') }}">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </li>
          </ul>
        </div>

          <a href="{{ route('posts.create') }}" class="btn btn-outline-light mx-2">Posting</a>
          @else
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{ route('users') }}">Data Users</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('categories.index') }}">Kategori</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('posts.index') }}">Postingan</a>
                </li>
              </ul>
            </div>

          <a href="{{ route('logout') }}" class="btn btn-outline-light">Logout</a>
        @endif
        </div>
    </div>
</nav>
