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
            <form action="{{route('administrateur.update',$admin->id)}}"  method="post">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label >ID Administrateur</label>
                  <input type="text" class="form-control"  disabled value="{{$admin->id}}">
                </div>
                <div class="form-group">
                  <label >Nom</label>
                  <input name="nom" type="text" class="form-control"  value="{{$admin->nom}}">
                </div>
                <div class="form-group">
                  <label >Prenom</label>
                  <input name="prenom" type="text" class="form-control"  value="{{$admin->prenom}}">
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
