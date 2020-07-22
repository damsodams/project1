@extends('layouts.templateFront')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Information complete</h3>
          </div>
          <div class="form-group">
            <label >ID Offre</label>
            <input type="text" class="form-control" disabled value="{{$offre->id}}">
          </div>
          <div class="form-group">
            <label >Titre</label>
            <input type="text" class="form-control" disabled value="{{$offre->titre}}">
          </div>
          <div class="form-group">
            <label >Description</label>
            <textarea class="form-control" disabled>{{$offre->description}}</textarea>
          </div>
          <div class="form-group">
            <label>Fiche Projet</label>
            <div>
              <a href="{{asset(url($offre->pdf))}}" target="_blank">
                <img class="card_img" style="max-height : 40px; max-width : 40px;"src="{{url('images/pdf_ico.png')}}">
              </a>
            </div>
          </div>
          <div class="form-group">
            <label >Contrainte</label>
            <input type="text" class="form-control" disabled value="{{$offre->contrainte}}">
          </div>
          <div class="form-group">
            <label >Type offre</label>
            <input type="text" class="form-control" disabled value="{{$offre->type_offre}}">
          </div>
        </div>
        <div class="show-btn-post">
          <?php $user = auth()->user();?>
          @if(isset($user))
            @if($user->statut == "dev")
              @if ($test == false)
                <a href="{{route('postuler_offre', ['id'=>$offre->id])}}" class="btn btn-post-offre btn-success btn-sm">Postuler</a>
              @else
                <a href="{{route('index_offre')}}" class="btn btn-warning btn-sm">Vous avez postulé à cette offre, consulter le suivi ?</a>
              @endif

            @endif
          @endif
          @if(isset($user) == false)
            <a href="{{ route('login') }}" class="btn btn-success btn-sm">Veuiller vous connecter pour postuler a une offre</a>
          @endif
        </div>
      </div>
    </div>
  </div>


@endsection
