@extends('layouts.templateBack')
@section('activeentreprise')
  active
@endsection
@section('content')

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Information complete</h3>
            </div>
                <div class="form-group">
                  <label >ID Entreprise</label>
                  <input type="text" class="form-control" disabled value="{{$entreprise->id}}">
                </div>
                <div class="form-group">
                  <label >Nom de l'entreprise</label>
                  <input type="text" class="form-control" disabled value="{{$entreprise->nom}}">
                </div>
                <div class="form-group">
                  <label >Logo</label>
                  <div><img style="max-height : 250px ; max-width : 250px ; border-radius : 5px;" src="{{url($entreprise->logo)}}"></div>
                </div>
                <div class="form-group">
                  <label >N° SIRET</label>
                  <input type="text" class="form-control" disabled value="{{$entreprise->siret}}">
                </div>
                <div class="form-group">
                  <label >Adresse</label>
                  <input type="text" class="form-control" disabled value="{{$entreprise->adresse}}, {{$entreprise->code_postal}}, {{$entreprise->ville}}">
                </div>
                <div class="form-group">
                  <label >Téléphone</label>
                  <input type="text" class="form-control" disabled value="{{$entreprise->telephone}}">
                </div>
                <div class="form-group">
                  <label >Sécteur Activité</label>
                  <input type="text" class="form-control" disabled value="{{$entreprise->secteur_activité}}">
                </div>
                <div class="form-group">
                  <label>Nombre de salarié</label>
                  <input type="text" class="form-control" disabled value="{{$entreprise->nb_salarie}}">
                </div>

            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  @endsection
