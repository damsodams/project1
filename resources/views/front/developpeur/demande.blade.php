@extends('layouts.templateFront')
@section('content')
  <br>
  @foreach ($OffresPostuler as $offre)
    @php
    switch ($offre->statut) {
      case 0:
      $forcent = "0%";
      $action = "Candidature non transmise";
      $color = "warning";
      break;
      case 1:
      $forcent = "35%";
      $action = "Candidature transmise";
      $color = "info";
      break;
      case 2:
      $forcent = "70%";
      $action = "Candidature en cours d'analyse";
      $color = "warning";
      break;
      case 3:
      $forcent = "100%";
      $action = "Candidature Valider";
      $color = "success";
      break;
      case 4:
      $forcent = "100%";
      $action = "Candidature Refuser";
      $color = "danger";
      break;
    }
    @endphp
    <div class="card-info">
      <div class="info-box ">
        <span class="info-box-icon"><img src="{{url($offre->offre->entreprise->logo)}}"> </span>
        <div class="info-box-content">
          <span class="info-box-number">{{$offre->offre->titre}}</span>
          <span class="info-box-text text-{{$color}}">Action : {{$action}}</span>
          <div class="progress">
            <div class="progress-bar bg-{{$color}}" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: {{$forcent}}" aria-valuenow="80">
              <span class="sr-only">{{$forcent}}</span>
            </div>
          </div>
          <span class="progress-description">
            Progression : {{$forcent}}
          </span>
        </div>
      </div>
      @if ($offre->statut == "3")
        <div class="info-box ">
          <div class="info-box-content">
            <p> Contact entreprise: </p>
            <div class="row">
              <div class="form-group col-md-3">
                <p> Téléphone : {{$offre->offre->entreprise->telephone}} </p>
              </div>
            </div>
          </div>
        </div>
      @endif
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
