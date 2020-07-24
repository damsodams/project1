@extends('layouts.templateFront')
@section('content')
  <br><hr><br>
  <form action="{{route('diplome.store')}}" method="post">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Nom diplome</label>
        <input name="intitule" required type="text" class="form-control" placeholder="Nom diplome">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Mention</label>
        <select required name="mention" id="inputState" class="form-control">
          <option selected>Non</option>
          <option>Assez Bien</option>
          <option>Bien</option>
          <option>Très Bien</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputAddress">Date obtention du diplome</label>
      <input name="date" required type="date" class="form-control">
    </div>
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" required type="checkbox" onchange="testd()"id="gridCheck">
        <label class="form-check-label"  for="gridCheck">
          Je certifie l'exactitude des renseignements fournis.
        </label>
      </div>
    </div>
    <button id="btn"   type="submit" class="btn btn-primary">Valider</button>
  </form>
  <br><hr><br>
@endsection
