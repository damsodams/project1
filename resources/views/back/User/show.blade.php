@extends('layouts.templateBack')

@section('content')

  <!-- Main content -->
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

            <div class="card-body">
              <div class="form-group">
                <label >ID</label>
                <input type="text" class="form-control" disabled value="{{$utilisateur->id}}">
              </div>
              <div class="form-group">
                <label >Nom</label>
                <input type="text" class="form-control" disabled value="{{$utilisateur->name}}">
              </div>
              <div class="form-group">
                <label >Email</label>
                <input type="text" class="form-control" disabled value="{{$utilisateur->email}}">
              </div>
              <div class="form-group">
                <label >Statut</label>
                <input type="text" class="form-control" disabled value="{{$utilisateur->statut}}">
              </div>
              @if ($utilisateur->statut == "dev")
                <div class="form-group">
                  <label >ID Developpeur</label>
                  <input type="text" class="form-control" disabled value="{{$utilisateur->developpeur->id}}">
                </div>
                <div class="form-group">
                  <label >Compétencr</label>
                  <textarea name="competence" disabled class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$utilisateur->developpeur->competence}}</textarea>
                </div>
                <div class="form-group">
                  <label >CV</label>
                  <input type="text" class="form-control" >
                </div>
                <div class="form-group">
                  <label >Photo</label>
                  <input type="text" class="form-control" >
                </div>
                <div class="form-group">
                  <label >Adresse</label>
                  <input type="text" class="form-control" disabled value="{{$utilisateur->developpeur->adresse}}, {{$utilisateur->developpeur->code_postal}}, {{$utilisateur->developpeur->ville}}">
                </div>
                <div class="form-group">
                  <label >Téléphone</label>
                  <input type="text" class="form-control" disabled value="{{$utilisateur->developpeur->telephone}}">
                </div>
                <div class="form-group">
                  <label >Date de naissance</label>
                  <input type="text" class="form-control" disabled value="{{$utilisateur->developpeur->date_naissance}}">
                </div>
              @endif
              @if ($utilisateur->statut == "entreprise")
                <div class="form-group">
                  <label >ID Entreprise</label>
                  <input type="text" class="form-control" disabled value="{{$utilisateur->entreprise->id}}">
                </div>
                <div class="form-group">
                  <label >Nom de l'entreprise</label>
                  <input type="text" class="form-control" disabled value="{{$utilisateur->entreprise->nom}}">
                </div>
                <div class="form-group">
                  <label >Logo</label>
                  <input type="text" class="form-control" disabled value="{{$utilisateur->entreprise->siret}}">
                </div>
                <div class="form-group">
                  <label >N° SIRET</label>
                  <input type="text" class="form-control" disabled value="{{$utilisateur->entreprise->siret}}">
                </div>
                <div class="form-group">
                  <label >Adresse</label>
                  <input type="text" class="form-control" disabled value="{{$utilisateur->entreprise->adresse}}, {{$utilisateur->entreprise->code_postal}}, {{$utilisateur->entreprise->ville}}">
                </div>
                <div class="form-group">
                  <label >Téléphone</label>
                  <input type="text" class="form-control" disabled value="{{$utilisateur->entreprise->telephone}}">
                </div>
                <div class="form-group">
                  <label >Sécteur Activité</label>
                  <input type="text" class="form-control" disabled value="{{$utilisateur->entreprise->secteur_activité}}">
                </div>
                <div class="form-group">
                  <label>Nombre de salarié</label>
                  <input type="text" class="form-control" disabled value="{{$utilisateur->entreprise->nb_salarie}}">
                </div>


              @endif
              @if ($utilisateur->statut == "admin")
                <div class="form-group">
                  <label>ID Administrateur</label>
                  <input type="text" class="form-control" disabled value="{{$utilisateur->administrateur->id}}">
                </div>
                <div class="form-group">
                  <label>Nom</label>
                  <input type="text" class="form-control" disabled value="{{$utilisateur->administrateur->nom}}">
                </div>
                <div class="form-group">
                  <label>Preom</label>
                  <input type="text" class="form-control" disabled value="{{$utilisateur->administrateur->prenom}}">
                </div>
              @endif


              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

</div>
<!-- ./wrapper -->


</script>
</body>
</html>

@endsection
