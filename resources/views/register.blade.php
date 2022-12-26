<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title>Registrar-se</title>
</head>
<body>
  @if(session('msg-permission'))
  <p class="msg-permission">{{session('msg-permission')}}</p>
@endif
@if(session('msg-sucess'))
  <p class="msg-sucess">{{session('msg-sucess')}}</p>
@endif
@if ($errors->any())
<div class="alert" id="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>- {{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <div class="container">
        <div class="wrapper">

          <div class="title"><span><img width=150 src="img/mycar_png.png"></span></div>
          <form action="/register/user" method="POST">
            @csrf
            <div class="row">
                <i class="fas fa-id-card"></i>
                <input type="text" placeholder="Nome" required name="name">
              </div>
            <div class="row">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Email" required name="email">
            </div>
            <div class="row">
              <i class="fas fa-lock" id="lock"></i>
              <input type="password" id="password" placeholder="Senha" required name="password">
             
            </div>
            <div class="pass" style="font-size:13px"><p>Clique no <span class="fas fa-lock"></span> para ver a senha</p></div>
            
            <div class="row button">
              <input type="submit" value="Cadastrar-se">
            </div>

            <div class="signup-link">Já possui conta? <a href="/login">Fazer login</a></div>
          </form>
        </div>
      </div>

<script src="js/login.js"></script>
    
</body>
</html>