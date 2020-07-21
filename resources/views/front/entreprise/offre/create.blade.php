@extends('layouts.templateFront')
@section('activegof') active @endsection

  @section('content')
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">creation offre</h3>
      </div>

      <form  action="{{route('offre_entreprise.store')}}" method="post"  enctype="multipart/form-data">
        @csrf


        <div class="form-group">
          <label >Titre</label>
          <input name="titre" type="text" required class="form-control">
        </div>
        <div class="form-group">
          <label >Description</label>
          <textarea name="description" required class="form-control" ></textarea>
        </div>
        <div class="form-group">
          <label>Fiche Projet</label>
          <input  name="pdf"  type="file" required class="form-control">
        </div>
        <div class="form-group">
          <label >Contrainte</label>
          <input name="contrainte" type="text" required class="form-control">
        </div>
        <div class="form-group">
          <label >Type d'offre</label>
          <select name="type_offre" required class="form-control" >
            <option value="projet">Projet Gratuit</option>
            <option value="stage">Offre Stage</option>
          </select>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

    </div>
    <!-- /.card -->
  </div>
@endsection
