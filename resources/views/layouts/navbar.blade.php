<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/navbar.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style=" background-color: #4aa3d6;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="/img/mycar_png.png" width="65" height="65">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/my-vehicles/vehicles">Meus veículos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/my-maintenances/maintenances">Minha manutenções</a>
              </li> 
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(auth()->user()) {{ current(explode(" ", auth()->user()->name)) }} @else user @endif
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Meus dados</a></li>
                  <li><a class="dropdown-item" href="#">Trocar senha</a></li>
                  <li><a class="dropdown-item" href="#">Sair</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
    
        @if(session('msg-denied'))
        <div class="msg">
          <p class="msg-denied">{{ session('msg-denied') }}</p>
        </div>
        @endif

        @if(session('msg-accomplished'))
        <div class="msg">
          <p class="msg-accomplished">{{session('msg-accomplished')}}</p>
        </div>
        @endif
      
      @yield('content')

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      <script src="/js/navbar.js"></script>
</body>
</html>

