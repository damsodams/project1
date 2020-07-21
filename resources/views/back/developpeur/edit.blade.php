@extends('layouts.templateBack')
@section('activedev')
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
            <form action="{{route('developpeur.update',$dev->id)}}"  method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label >ID Entreprise</label>
                  <input type="text" class="form-control"  disabled value="{{$dev->id}}">
                </div>
                <div class="form-group">
                  <label >Competence</label>
                  <textarea name="competence" type="text" class="form-control">{{$dev->competence}}</textarea>
                </div>
                <div class="form-group">
                  <label >Cv</label>
                  <div>
                    <a href="{{asset(url($dev->cv))}}" target="_blank">
                      <img class="card_img" style="max-height : 40px; max-width : 40px;"src="{{url('images/pdf_ico.png')}}">
                    </a>
                  </div>
                  <br>
                  <input  name="cv"  type="file" class="form-control"  value="{{$dev->cv}}">
                </div>
                <div class="form-group">
                  <label >Photo</label>
                  <div>
                    <img style="max-height : 250px ; max-width : 250px ; border-radius : 5px;" src="{{url($dev->photo)}}">
                  </div>
                  <br>
                  <input  name="photo" type="file" class="form-control" >
                </div>
                <div class="form-group">
                  <label >Adresse</label>
                  <input name="adresse"  type="text" class="form-control"  value="{{$dev->adresse}}">
                </div>
                <div class="form-group">
                  <label >Ville</label>
                  <input name="ville"  type="text" class="form-control"  value="{{$dev->ville}}">
                </div>
                <div class="form-group">
                  <label >Code Postal</label>
                  <input name="cp" type="text" class="form-control"  value="{{$dev->code_postal}}">
                </div>
                <div class="form-group">
                  <label >Téléphone</label>
                  <input name="tel" type="text" class="form-control"  value="{{$dev->telephone}}">
                </div>
                <div class="form-group">
                  <label>Date de Naissance</label>
                  <input name="dn" type="text" class="form-control"  value="{{$dev->date_naissance}}">
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
