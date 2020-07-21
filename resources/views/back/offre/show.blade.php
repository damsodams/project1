@extends('layouts.templateBack')
@section('activeoffre')
  active
@endsection
@section('content')
  <section class="content">
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
        </div>
      </div>
    </div>
  </section>
@endsection
