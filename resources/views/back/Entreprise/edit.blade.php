@extends('layouts.templateBack')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Information complete</h3>
            </div>
            <form action="{{route('entreprise.update',$entreprise->id)}}"  method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label >ID Entreprise</label>
                  <input type="text" class="form-control"  disabled value="{{$entreprise->id}}">
                </div>
                <div class="form-group">
                  <label >Nom de l'entreprise</label>
                  <input name="nome" type="text" class="form-control"  value="{{$entreprise->nom}}">
                </div>
                <div class="form-group">
                  <label >Logo</label>
                  <div><img style="max-height : 250px ; max-width : 250px ; border-radius : 5px;" src="{{url($entreprise->logo)}}"></div>
                  <br>
                  <input name="logo"  type="file" class="form-control" value="{{$entreprise->logo}}">
                </div>
                <div class="form-group">
                  <label >N° SIRET</label>
                  <input  name="siret" type="text" class="form-control"  value="{{$entreprise->siret}}">
                </div>
                <div class="form-group">
                  <label >Adresse</label>
                  <input name="adresse"  type="text" class="form-control"  value="{{$entreprise->adresse}}">
                </div>
                <div class="form-group">
                  <label >Ville</label>
                  <input name="ville"  type="text" class="form-control"  value="{{$entreprise->ville}}">
                </div>
                <div class="form-group">
                  <label >Code Postal</label>
                  <input name="cp" type="text" class="form-control"  value="{{$entreprise->code_postal}}">
                </div>
                <div class="form-group">
                  <label >Téléphone</label>
                  <input name="tel" type="text" class="form-control"  value="{{$entreprise->telephone}}">
                </div>
                <div class="form-group">
                  <label >Sécteur Activité</label>
                  <input name="secteur_activite" type="text" class="form-control"  value="{{$entreprise->secteur_activité}}">
                </div>
                <div class="form-group">
                  <label>Nombre de salarié</label>
                  <input name="nb_salarie" type="text" class="form-control"  value="{{$entreprise->nb_salarie}}">
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection
