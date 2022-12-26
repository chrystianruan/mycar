<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title>Login</title>
</head>
<body>
  @if(session('msg-permission'))
    <p class="msg-permission">{{session('msg-permission')}}</p>
  @endif
  @if(session('msg-sucess'))
    <p class="msg-sucess">{{session('msg-sucess')}}</p>
  @endif

    @if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container">
        <div class="wrapper">
          <div class="title"><span><img width=150 src="img/mycar_png.png"></span></div>
          <form action="/login" method="POST">
            @csrf
            <div class="row">
              <i class="fas fa-user"></i>
              <input type="text" name="email" placeholder=" Digite seu Email" required>
            </div>
            <div class="row">
              <i class="fas fa-lock" id="lock"></i>
              <input type="password" name="password" id="password" placeholder="Digite sua Senha" required>
             
            </div>
            <div class="pass" style="font-size:13px"><p>Clique no <span class="fas fa-lock"></span> para ver a senha</p></div>
            
            <div class="row button">
              <input type="submit" value="Login">
            </div>
            <div class="pass"><a href="#">Esqueceu a senha?</a></div>
            <div class="signup-link">Ainda não registrado? <a href="/register">Registre-se</a></div>
          </form>
        </div>
      </div>

<script src="js/login.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>   
</body>
</html>