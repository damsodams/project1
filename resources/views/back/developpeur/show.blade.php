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
            <div class="form-group">
              <label >ID Developpeur</label>
              <input type="text" class="form-control" disabled value="{{$dev->id}}">
            </div>
            <div class="form-group">
              <label >Compétence</label>
              <textarea type="text" class="form-control" disabled >{{$dev->competence}}</textarea
              </div>
              <div class="form-group">
                <label >CV</label>
                <div>
                  <a href="{{asset(url($dev->cv))}}" target="_blank">
                    <img class="card_img" style="max-height : 40px; max-width : 40px;"src="{{url('images/pdf_ico.png')}}">
                  </a>
                </div>
              </div>
              <div class="form-group">
                <label >Photo</label>
                <div><img style="max-height : 250px ; max-width : 250px ; border-radius : 5px;" src="{{url($dev->photo)}}"></div>
              </div>
              <div class="form-group">
                <label >Adresse</label>
                <input type="text" class="form-control" disabled value="{{$dev->adresse}}, {{$dev->code_postal}}, {{$dev->ville}}">
              </div>
              <div class="form-group">
                <label >Téléphone</label>
                <input type="text" class="form-control" disabled value="{{$dev->telephone}}">
              </div>
              <div class="form-group">
                <label >Date de naissance</label>
                <input type="text" class="form-control" disabled value="{{$dev->date_naissance}}">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endsection
