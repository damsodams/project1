@extends('layouts.templateFront')
@section('content')
  <br>
  @foreach ($OffresPostuler as $offre)
    @php
    switch ($offre->type_contrat) {
      case 0:
      $forcent = "0%";
      $action = "Candidature non transmise";
      break;
      case 1:
      $forcent = "35%";
      $action = "Candidature transmise";
      break;
      case 2:
      $forcent = "70%";
      $action = "Candidature en cours d'analyse";
      break;
      case 3:
      $forcent = "100%";
      $action = "Candidature Valider";
      break;
    }
    @endphp
    <div class="card-info">
      <div class="info-box ">
        <span class="info-box-icon"><img src="{{url($offre->offre->entreprise->logo)}}"> </span>
        <div class="info-box-content">
          <span class="info-box-number">{{$offre->offre->titre}}</span>
          <span class="info-box-text">Action : {{$action}}</span>
          <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: {{$forcent}}" aria-valuenow="80">
              <span class="sr-only">{{$forcent}}</span>
            </div>
          </div>
          <span class="progress-description">
            Progression : {{$forcent}}
          </span>
        </div>
      </div>
      <div class="box-btn">
        <form action="{{route('show_offre', ['id'=>$offre->offre->id])}}" method="get">
          @csrf
          <button type="submit" rel="tooltip" class="btn btn-info btn-round" >
            <i class="material-icons">Voire l'offre</i>
          </button>
        </form>
      </div>
    </div>
    <br>
  @endforeach
@endsection
