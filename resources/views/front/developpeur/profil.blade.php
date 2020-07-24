@extends('layouts.templateFront')
@section('content')
  <div class="user-info">
    <h1>Information Utilisateur</h1>
    <form>
      <h2>General</h2>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Email" disabled value="{{$user->email}}">
        </div>
        <div class="form-group col-md-3">
          <label for="inputPassword4">Pseudo</label>
          <input type="text" class="form-control" id="inputname" placeholder="name" disabled value="{{$user->name}}">
        </div>
        <div class="form-group col-md-3">
          <label for="inputPassword4">Date de naissance</label>
          <input type="text" class="form-control" id="inputname" placeholder="name" disabled value="{{$user->developpeur->date_naissance}}">
        </div>
        <div class="form-group col-md-2 center-align">
          <img  class="profile-user-img img-responsive img-circle" src="{{url($user->developpeur->photo)}}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputAddress">Adresse</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" disabled value="{{$user->developpeur->adresse}}">
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">Ville</label>
          <input type="text" class="form-control" id="inputCity" disabled value="{{$user->developpeur->ville}}">
        </div>
        <div class="form-group col-md-2">
          <label for="inputCity">Code Postal</label>
          <input type="text" class="form-control" id="inputCity" disabled value="{{$user->developpeur->code_postal}}">
        </div>
        <div class="form-group col-md-2">
          <label for="inputCity">Telephone</label>
          <input type="text" class="form-control" id="inputCity" disabled value="{{$user->developpeur->telephone}}">
        </div>
      </div>
      <button type="submit" class="btn btn-info">Modifier mes information</button>
    </form>
    <br><hr><br>
    <form>
      <h2>Mot de passe</h2>
      <button type="submit" class="btn btn-info">Modifier le mot de passe</button>
    </form>
    <br><hr><br>
    <form>
      <h2>information professionnelle</h2>
      <div class="form-row">
        <div class="form-group col-md-10">
          <label for="inputEmail4">Competence</label>
          <textarea name="competence" type="text" class="form-control" disabled>{{$user->developpeur->competence}}</textarea>
        </div>
        <div class="form-group col-md-2">
          <label for="inputEmail4">CV</label>
          <div>
            <a href="{{asset(url($user->developpeur->cv))}}" target="_blank">
              <img class="card_img center-align" style="max-height : 80px; max-width : 80px;"src="{{url('images/pdf_ico.png')}}">
            </a>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-info">Modifier mes information</button>
    </form>
  </div>
  <br><hr><br>
  <div class="diplome-info">
    <h1>Gestion des diplomes</h1>
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('diplome.create')}}" method="GET">
          @csrf
          <button type="submit" rel="tooltip" class="btn btn-info">
            <i class="material-icons">Ajouter un diplome</i>
          </button>
        </form>
        <br>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Intitule</th>
              <th>Date d'obtention</th>
              <th>Mention</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($diplomes as $diplome)
              <tr>
                <td>{{$diplome->id}}</td>
                <td>{{$diplome->intitule}}</td>
                <td>{{$diplome->date_obtention}}</td>
                <td>{{$diplome->mention}}</td>
                <td class="td-actions text-center">
                  <div style="display: inline-flex;">
                    <form action="{{route('diplome.destroy', $diplome->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" rel="tooltip" class="btn btn-danger btn-round" onclick="return confirm('Est tu sur de vouloir supprimer cette entreprise ?')">
                        <i class="material-icons">Supprimer</i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <br><hr><br>
    <div class="exp-info">
      <h1>Experiences professionnel</h1>
      <div class="row">
        <div class="col-md-12">
          <form action="{{route('experience.create')}}" method="POST">
            @csrf
            @method('GET')
            <button type="submit" rel="tooltip" class="btn btn-info">
              <i class="material-icons">Ajouter une experience professionnel</i>
            </button>
          </form>
          <br>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Annee Debut</th>
                <th>Annee Fin</th>
                <th>Entreprise</th>
                <th>Ville</th>
                <th>Poste occupé</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($experiences as $experience)
                <tr>
                  <td data-label="ID" >{{$experience->id}}</td>
                  <td>{{$experience->annee_debut}}</td>
                  <td>{{$experience->annee_fin}}</td>
                  <td>{{$experience->entreprise}}</td>
                  <td>{{$experience->ville}}</td>
                  <td>{{$experience->poste}}</td>
                  <td class="td-actions text-center">
                    <div style="display: inline-flex;">
                      <form action="{{route('experience.destroy', $diplome->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" class="btn btn-danger btn-round" onclick="return confirm('Est tu sur de vouloir supprimer cette entreprise ?')">
                          <i class="material-icons">Supprimer</i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <br><hr><br>
  @endsection
