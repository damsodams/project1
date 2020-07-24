@extends('layouts.templateFront')
@section('content')
  <br><hr><br>
  <form action="{{route('experience.store')}}" method="post">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Nom de l'entreprise</label>
        <input name="nom" required type="text" class="form-control" placeholder="Nom de l'entreprise">
      </div>
      <div class="form-group col-md-3">
        <label for="inputPassword4">Année début</label>
        <input name="datedebut" required type="date" class="form-control">
      </div>
      <div class="form-group col-md-3">
        <label for="inputPassword4">Année fin</label>
        <input name="datefin" required type="date" class="form-control">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputPassword4">Ville</label>
        <input name="ville" required type="text" class="form-control" placeholder="Ville">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Poste occupé</label>
        <input name="poste" required type="text" class="form-control" placeholder="Poste occupé">
      </div>
    </div>
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" required type="checkbox" onchange="testd()"id="gridCheck">
        <label class="form-check-label"  for="gridCheck">
          Je certifie l'exactitude des renseignements fournis.
        </label>
      </div>
    </div>
    <button  type="submit" class="btn btn-primary">Valider</button>
  </form>
  <br><hr><br>
@endsection
