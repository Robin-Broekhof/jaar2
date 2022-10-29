
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">

      <ul class="navbar-nav">
        <a class="nav-link {{ request()->is(
          '/') ? 'active' : ''}}" href="/"> Home</a>

        <a class="nav-link {{ request()->is(
          'genres', 'genres/showbygenre/*'
          ) ? 'active' : ''}}" href="/genres">Genres</a>

        <a class="nav-link {{ request()->is(
          'songs', 'songs/details/*', 'songs/addtoplaylist/*'
          ) ? 'active' : ''}}" href="/songs">Songs</a>

        @if (auth::check())
        <a class="nav-link {{ request()->is(
          'songs/myuploads', 'songs/create', 'songs/update/*'
          ) ? 'active' : ''}}" href="/songs/myuploads">Myuploads</a>

        <a class="nav-link {{ request()->is(
          'playlists', 'playlists/details/*', 'playlists/create', 'playlists/update/*'
          ) ? 'active' : ''}}" href="/playlists">Playlists</a>
        @endif
      </ul>


      

        <div class="d-flex align-items-center">
          <ul class="navbar-nav">
            @if (!Auth::check())
              <a class="nav-link {{ request()->is('login') ? 'active' : ''}}" href="/login/">Login</a>
              <a class="nav-link {{ request()->is('register') ? 'active' : ''}}" href="/register/">Register</a>
            @else
              <a class="nav-link">welcome:{{ Auth::user()->name }}</a>
              <a class="nav-link {{ request()->is('playlists') ? 'active' : ''}}" href="/logout/">Logout</a> 
            @endif
          </ul>
        </div>

      


  </div>
</nav>