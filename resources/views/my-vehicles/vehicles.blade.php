@extends('layouts.navbar')
@section('content')
<link rel="stylesheet" type="text/css" href="/css/vehicle.css">

<div class="container-ai">
    <div class="infos">
        <h5 class="title">- Meus veículos </h5>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Novo veículo</button>
    </div>

    <div class="cards-container">
      @foreach($vehicles as $vehicle)
      <div class="card-vehicle" style="width: 18rem;">
        <img @if($vehicle->image) src="{{ url('storage/'.str_replace("public/", "", $vehicle->image)) }}" @else src="/img/no-image.png" @endif class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $vehicle->nickname }}</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Modelo: <strong>@foreach ($modelos as $model) @if ($model->id == $vehicle->modelo_id) {{ $model->modelo }} @endif @endforeach</strong> </li>
            <li class="list-group-item">Marca: <strong>@foreach ($modelos as $model) @if ($model->id == $vehicle->modelo_id) {{ $model->mark }} @endif @endforeach</strong></li>
            <li class="list-group-item">Versão: <strong>{{ $vehicle->version }}</strong> </li>
          </ul>
        
          <form class="form-delete" action="/delete/vehicle/{{ $vehicle->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-primary" type="button" id="{{ $vehicle->id }}" name="{{ $vehicle->modelo_id }}" >Editar</button>
          <button type="submit" class="btn btn-danger">Excluir</button>
          </form>
        </div>
      </div>
      @endforeach
    </div>

</div>
<div id="modal-caixa" class="modal-caixa">

  <!-- Modal content -->
  <div class="modal-conteudo">
    <div class="modal-cabeca">
      <span class="close" id="close">&times;</span>
      <h5>Atualizar veículo</h5>
      <hr>
    </div>
    <form method="POST" id="edit-form" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="modal-corpo">
        <div style="text-align: center">
          <img id="imgEdit" class="imgEdit">
        </div>
        <div class="mb-3">
          <label class="form-label">Marca  <font>*</font></label>
        <select class="form-select" id="marksEdit" aria-label="Default select example">
          
        </select>
      </div>
      <div class="mb-3">
          <label class="form-label">Modelo <font>*</font></label>
          <select class="form-select" name="modelo_id_edit" id="modelosEdit" aria-label="Default select example">
            
          </select>
        </div>

        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Versão <font>*</font></label>
          <input type="text"  name="version_edit" class="form-control" id="versionEdit" placeholder="Digite a versão do seu veículo">
        </div>

        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Apelido (exclusivo) <font>*</font> </label>
          <input type="text"  name="nickname_edit" class="form-control" id="nicknameEdit" placeholder="Crie um apelido exclusivo para o seu veículo">
        </div>

        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Imagem (opcional) (só escolha se for para alterar)</label>
          <input type="file" name="image_edit" class="form-control" id="formGroupExampleInput">
        </div>
      </div>
      <div class="modal-pe">
        <button type="button" class="btn btn-secondary" id="btnClose">Fechar</button>
        <button type="reset" class="btn btn-danger">Limpar</button>
        <button type="submit" class="btn btn-primary">Atualizar veículo</button>
      </div>
      
    </div>
  </form>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/new/vehicle" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo veículo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Marca  <font>*</font></label>
                      <select class="form-select" id="marks" aria-label="Default select example">
                        
                      </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Modelo <font>*</font></label>
                        <select class="form-select" name="modelo_id" id="modelos" aria-label="Default select example">
                          
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Versão <font>*</font></label>
                        <input type="text"  name="version" class="form-control" id="versionEdit" placeholder="Digite a versão do seu veículo">
                      </div>

                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Apelido (exclusivo) <font>*</font> </label>
                        <input type="text"  name="nickname" class="form-control" id="nicknameEdit" placeholder="Crie um apelido exclusivo para o seu veículo">
                      </div>

                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Imagem (opcional)</label>
                        <input type="file" name="image" class="form-control" id="formGroupExampleInput">
                      </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="reset" class="btn btn-danger">Limpar</button>
                <button type="submit" class="btn btn-primary">Adicionar veículo</button>
                </div>
            </div>
        </div>
    </form>
  </div>

 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="/js/vehicles.js">
    

</script>   
@endsection