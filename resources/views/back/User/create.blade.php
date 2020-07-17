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
              <h3 class="card-title">creation utilisateur</h3>
            </div>

            <form class="" action="{{route('utilisateur.store')}}" method="post">
              @csrf

              <div class="form-group">
                <label >Nom</label>
                <input name="name" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label >Email</label>
                <input type="text" name="email" class="form-control" required >
              </div>
              <div class="form-group">
                <label >mot de passe</label>
                <input name="mdp" type="text" class="form-control" required >
              </div>
              <div class="form-group">
                <label>Statut</label>
                <select name="statut" class="form-control" onchange="showmore()"  id="combobox" required>
                  <option selected value="">Selectionner un status</option>
                  <option value="dev">developpeur</option>
                  <option value="admin">administrateur</option>
                  <option value="entreprise">entreprise</option>
                </select>
              </div>
              <div id="dev" style="display:none;">
                <div class="form-group">
                  <label >Competence</label>
                  <textarea name="competence" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
                </div>
                <div class="form-group">
                  <label >CV</label>
                  <input name="cv" type="file" class="form-control"  >
                </div>
                <div class="form-group">
                  <label >Photo</label>
                  <input name="photo" type="file" class="form-control"  >
                </div>
                <div class="form-group">
                  <label >Adresse</label>
                  <input name="adressed" type="text" class="form-control"  >
                </div>
                <div class="form-group">
                  <label >Ville</label>
                  <input name="villed" type="text" class="form-control"  >
                </div>
                <div class="form-group">
                  <label >Code Postal</label>
                  <input name="cpd" type="text" class="form-control"  onkeyup="verif_cp(this);">
                </div>
                <div class="form-group">
                  <label >Téléphone</label>
                  <input name="teld" type="text" class="form-control"  onkeyup="verif_tel(this);">
                </div>
                <div class="form-group">
                  <label >Date de naissance</label>
                  <input name="dn" class="form-control" type="date" value="2011-08-19" id="example-date-input" >
                </div>
              </div>

              <div id="entreprise" style="display:none;">
                <div class="form-group">
                  <label >Nom de l'entreprise</label>
                  <input name="nome" type="text" class="form-control"  >
                </div>
                <div class="form-group">
                  <label >Logo d'entreprise</label>
                  <input name="logo" type="text" class="form-control"  >
                </div>
                <div class="form-group">
                  <label >n° Siret</label>
                  <input name="siret" type="text" class="form-control"  >
                </div>
                <div class="form-group">
                  <label >Adresse</label>
                  <input name="adresse" type="text" class="form-control"  >
                </div>
                <div class="form-group">
                  <label >Ville</label>
                  <input name="ville" type="text" class="form-control"  >
                </div>
                <div class="form-group">
                  <label >Code Postal</label>
                  <input name="cp" type="text" class="form-control"  onkeyup="verif_cp(this);">
                </div>
                <div class="form-group">
                  <label >Téléphone</label>
                  <input name="tel" type="text" class="form-control"  onkeyup="verif_tel(this);">
                </div>
                <div class="form-group">
                  <label >Sécteur Activité</label>
                  <input name="secteur_activite" type="text" class="form-control"  >
                </div>
                <div class="form-group">
                  <label>Nombre de salarié</label>
                  <select name="nb_salarie" class="form-control">
                    <option selected >Selectionner une valeur</option>
                    <option value="10">< 10</option>
                    <option value="15">10 à 20</option>
                    <option value="30">20 à 50</option>
                    <option value="75">50 à 99</option>
                    <option value="99">+ 99</option>
                  </select>
                </div>
              </div>

              <div id="admin" style="display:none;">
                <div class="form-group">
                  <label >mot de passe</label>
                  <input type="text" class="form-control"  >
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>

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
<script>
document.addEventListener('DOMContentLoaded', function() {
  showmore();
});
function verif_cp(champ)
{
  var chiffres = new RegExp("[0-9]");
  var verif;
  var points = 0;

  for(x = 0; x < champ.value.length; x++)
  {
    verif = chiffres.test(champ.value.charAt(x));
    if(champ.value.charAt(x) == "."){points++;}
    if(points > 1){verif = false; points = 1;}
    if(verif == false){champ.value = champ.value.substr(0,x) + champ.value.substr(x+1,champ.value.length-x+1); x--;}
    if(champ.value.length > 5){champ.value = champ.value.substr(0,x) + champ.value.substr(x+1,champ.value.length-x+1); x--;}
  }
}
function verif_tel(champ)
{
  var chiffres = new RegExp("[0-9]");
  var verif;
  var points = 0;

  for(x = 0; x < champ.value.length; x++)
  {
    verif = chiffres.test(champ.value.charAt(x));
    if(champ.value.charAt(x) == "."){points++;}
    if(points > 1){verif = false; points = 1;}
    if(verif == false){champ.value = champ.value.substr(0,x) + champ.value.substr(x+1,champ.value.length-x+1); x--;}
    if(champ.value.length > 10){champ.value = champ.value.substr(0,x) + champ.value.substr(x+1,champ.value.length-x+1); x--;}
  }
}
function showmore(){
  document.getElementById('dev').style.display = "none";
  document.getElementById('admin').style.display = "none";
  document.getElementById('entreprise').style.display = "none";
  var id = document.getElementById('combobox').value;
  var div = document.getElementById(id);
  div.style.display = "block";
}
</script>
</body>
</html>

@endsection
