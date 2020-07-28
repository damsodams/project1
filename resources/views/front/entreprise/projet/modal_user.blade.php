
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="form-group col-md-12">
            <img style="max-width: 50px; max-height: 50px; align-content : center"src="{{url($postoffre->Developpeur->photo)}}">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <p>Nom : {{$postoffre->developpeur->user->name}}</p>
          </div>
          <div class="form-group col-md-6">
            <p>Email : {{$postoffre->developpeur->user->name}}</p>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <p>Date de naissance : {{$postoffre->developpeur->date_naissance}}</p>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <p>Experience pro :@foreach ($postoffre->developpeur->experiences as $experience)
              <br> {{$experience->entreprise}}
            @endforeach</p>
          </div>
          <div class="form-group col-md-6">
            <p>Diplome :@foreach ($postoffre->developpeur->diplomes as $diplome)
              <br> {{$diplome->intitule}}
            @endforeach</p>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <p>Competence : <br> {{$postoffre->developpeur->competence}}</p>
          </div>
          <div class="form-group col-md-6">
            <p>CV :</p>
            <a href="{{asset(url($postoffre->developpeur->cv))}}" target="_blank">
              <img class="card_img" style="max-height : 40px; max-width : 40px;"src="{{url('images/pdf_ico.png')}}">
            </a>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <p>Adresse : {{$postoffre->developpeur->adresse}}, <br> {{$postoffre->developpeur->code_postal}}, {{$postoffre->developpeur->ville}} </p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
