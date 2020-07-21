@extends('layouts.templateBack')
@section('activeadmin')
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
              <label >ID Administrateur</label>
              <input type="text" class="form-control" disabled value="{{$admin->id}}">
            </div>
            <div class="form-group">
              <label >CV</label>
              <input type="text" class="form-control" disabled value="{{$admin->nom}}">
            </div>
            <div class="form-group">
              <label >Photo</label>
              <input type="text" class="form-control" disabled value="{{$admin->prenom}}">
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
