@extends('layouts.templateFront')
@section('activepro') active @endsection

  @section('content')
    <br>


    @foreach ($lesOffres as $offre)
      @php
      //Recuperation de l'etat de l'offre
      $candidat = false;
      $validate = false;
      $candidaturefuser = false;
      foreach ($offre->postuler_offre as $postoffre ){

        if($postoffre->type_contrat != "4"){
          $candidat = true;
        } else {
          $candidaturefuser = true;
        }
        if (($postoffre->is_validate == true) && ($postoffre->type_contrat == "3")) {
          $validate = true;
        }
      }
      // Parametrage de v ariable pour affichage en fonction de l'etat-->
      if ($candidat == true) {
        if($validate == true) {

          $color = "success";
          $action = "Developpeur trouvé !";
          $forcent = "100%";
        }else {
          $color = "success";
          $action = "Des candidats sont disponnible .. ";
          $forcent = "70%";
        }

      }else {
        $color = "success";
        $action = "Pas encore de candidat";
        $forcent = "35%";
      }
      @endphp
      <div class="card-info">
        <div class="info-box ">
          <span class="info-box-icon"><img src="{{url($offre->entreprise->logo)}}"> </span>
          <div class="info-box-content">
            <span class="info-box-number">{{$offre->titre}}</span>
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
        @if ($offre->type_contrat == "3")
          <div class="info-box ">
            <div class="info-box-content">
              <p> Contact entreprise: </p>
              <div class="row">
                <div class="form-group col-md-3">
                  <p> Téléphone : {{$offre->entreprise->telephone}} </p>
                </div>
              </div>
            </div>
          </div>
        @endif
        <!-- Si des candidat existe affichage de ceux ci : -->
        @if (($candidat == true) || ($candidaturefuser == true))
          <h3>Candidats:</h3><hr>
          <div class="row">
            @foreach ($offre->postuler_offre as $postoffre )
              <div class="form-group col-md-6">
                {{$postoffre->developpeur->user->name}}
              </div>
              <div class="form-group col-md-6">
                <div class="box-btn">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Voire le profil</button>
                  <!-- Modal -->
                  @include('front.entreprise.projet.modal_user')
                  @if ($postoffre->is_validate == false)
                    <a class="btn btn-success" onclick="return confirm('Tu as cliquer sur valider, est tu sûre de ton choix?')" href="{{route('candidature_accepter',['id'=>$offre->id])}}">Accepter</a>
                    <a class="btn btn-danger"  onclick="return confirm('Tu as cliquer sur refuser, est tu sûre de ton choix?')" href="{{route('candidature_refuser',['id'=>$offre->id])}}">Refuser</a>
                  @elseif ($postoffre->type_contrat == '3')
                    <a class="btn btn-success"  href="#">Contacter</a>
                    <p class="text-success"> Vous avez Accepté cette candidature </p>
                  @else
                    <p class="text-danger"> Vous avez Refusé cette candidature </p>
                  @endif
                </div>
              </div>
              <br><hr>
            @endforeach
          </div>
        @endif
      </div>
      <br>
    @endforeach
  @endsection
