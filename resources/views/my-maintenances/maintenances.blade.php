@extends('layouts.navbar')
@section('content')
<link rel="stylesheet" type="text/css" href="/css/vehicle.css">
<div class="container-ai">
  <div class="infos">
    <h5 class="title">- Minhas manutenções </h5>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Nova manutenção</button>
  </div>

  <div class="cards-container">
    @foreach ($maintenances as $maint)
    <div class="card-vehicle" style="width: 18rem;">
      <img @if($maint->image) src="{{ url('storage/'.str_replace("public/", "", $maint->image)) }}" @else src="/img/no-image.png" @endif class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $maint->nickname }}</h5>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Modelo: <strong>@foreach ($modelos as $model) @if ($model->id == $maint->modelo_id) {{ $model->modelo }} @endif @endforeach</strong> </li>
          <li class="list-group-item">Marca: <strong>@foreach ($modelos as $model) @if ($model->id == $maint->modelo_id) {{ $model->mark }} @endif @endforeach</strong></li>
          <li class="list-group-item">Versão: <strong>{{ $maint->version }}</strong> </li>
          <li class="list-group-item">Próxima manutenção: <font> {{ date('d/m/Y', strtotime($maint->next_date_maintenance)) }}</font> </li>
        </ul>
      
        <form class="form-delete" action="/delete/maintenance/{{ $maint->maint_id }}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-primary" type="button" id="{{ $maint->maint_id }}" name="{{ $maint->modelo_id }}" >Editar</button>
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
      <h5>Atualizar manutenção </h5>
      <hr>
    </div>
    <form method="POST" id="edit-form" >
      @csrf
      @method('PUT')
      <div class="modal-corpo">
        <div style="text-align: center">
          <img id="imgEdit" class="imgEdit">
        </div>
        <div class="mb-3">
          <label class="form-label">Veículo <font>*</font></label>
        <select class="form-select" id="modelo_userEdit" name="modelo_user_idEdit">
          @foreach ($vehicles as $vehicle)
            <option value="{{ $vehicle->id }}"> @foreach ($modelos as $modelo) @if($vehicle->modelo_id == $modelo->id) {{ $vehicle->nickname }} ({{ $modelo->modelo }}/{{$modelo->mark}} - {{$vehicle->version}} ) @endif @endforeach</option>
          @endforeach
        </select>
      </div>
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Próxima data de manutenção <font>*</font> </label>
          <input type="date"  name="next_dateEdit" class="form-control" id="next_dateEdit" placeholder="Crie um apelido exclusivo para o seu veículo">
        </div>

      </div>
      <div class="modal-pe">
        <button type="button" class="btn btn-secondary" id="btnClose">Fechar</button>
        <button type="reset" class="btn btn-danger">Limpar</button>
        <button type="submit" class="btn btn-primary">Atualizar manutenção</button>
      </div>
      
    </div>
  </form>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/new/maintenance" method="POST">
      @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nova manutenção</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Veículo  <font>*</font></label>
                      <select class="form-select" id="vehicles" name="modelo_user_id" aria-label="Default select example">
                        <option selected disabled value="">Selecionar</option>
                        @foreach ($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}"> @foreach ($modelos as $modelo) @if($vehicle->modelo_id == $modelo->id) {{ $vehicle->nickname }} ({{ $modelo->modelo }}/{{$modelo->mark}} - {{$vehicle->version}} ) @endif @endforeach</option>
                        @endforeach
                      </select>
                    </div>

                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Data da próxima manutenção  <font>*</font></label>
                        <input type="date" class="form-control" name="next_date_maintenance" id="formGroupExampleInput" placeholder="Digite a data da próxima manutenção">
                      </div>

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="reset" class="btn btn-danger">Limpar</button>
                <button type="submit" class="btn btn-primary">Adicionar manutenção</button>
                </div>
            </div>
        </div>
    </form>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>   
<script src="/js/maintenance.js"></script>
@endsection