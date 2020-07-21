@extends('layouts.templateFront')
@section('activegof') active @endsection

@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Information complete</h3>
  </div>
  <form  action="{{route('offre_entreprise.update',$offre->id)}}" method="post"  enctype="multipart/form-data">
    @csrf
    @method('PUT')

  <div class="form-group">
    <label >ID Offre</label>
    <input type="text" class="form-control" disabled value="{{$offre->id}} ">
  </div>
  <div class="form-group">
    <label >Titre</label>
    <input name="titre" type="text" class="form-control"  value="{{$offre->titre}}">
  </div>
  <div class="form-group">
    <label >Description</label>
    <textarea name="description" class="form-control" >{{$offre->description}}</textarea>
  </div>
  <div class="form-group">
    <label>Fiche Projet</label>
    <div>
      <a href="{{asset(url($offre->pdf))}}" target="_blank">
        <img class="card_img" style="max-height : 40px; max-width : 40px;"src="{{url('images/pdf_ico.png')}}">
      </a>
    </div>
    <br>
    <input  name="pdf"  type="file" class="form-control"  value="{{$offre->pdf}}">
  </div>
  <div class="form-group">
    <label >Contrainte</label>
    <input name="contrainte" type="text" class="form-control"  value="{{$offre->contrainte}}">
  </div>
  <div class="form-group">
    <label >Type offre</label>
    <select name="type_offre" class="form-control" >
      <option selected value="{{$offre->type_offre}}">{{$offre->type_offre}}</option>
      <option value="projet">Projet Gratuit</option>
      <option value="stage">Offre Stage</option>
    </select>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>
</div>
@endsection
