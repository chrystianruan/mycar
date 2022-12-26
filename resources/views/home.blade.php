@extends('layouts.navbar')
@section('content')
<link rel="stylesheet" type="text/css" href="/css/vehicle.css">

<div class="container">
    <<div class="infos">
      <h5 class="title">- Próximas manutenções (7 dias) </h5>
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
        
        </div>
      </div>
      @endforeach
    </div>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>   
  <script src="js/home.js"></script>

@endsection