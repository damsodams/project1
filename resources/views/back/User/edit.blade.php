@extends('layouts.templateBack')
@section('activeuser')
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
            <form class="" action="{{route('utilisateur.update',$utilisateur->id)}}" method="post">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label >ID</label>
                  <input type="text" class="form-control"  disabled value="{{$utilisateur->id}}">
                </div>
                <div class="form-group">
                  <label >Nom</label>
                  <input name="name" type="text" class="form-control"  value="{{$utilisateur->name}}">
                </div>
                <div class="form-group">
                  <label >mot de passe</label>
                  <input name="mdp" type="password" class="form-control">
                </div>
                <div class="form-group">
                  <label >Email</label>
                  <input name="email" type="text" class="form-control"  value="{{$utilisateur->email}}">
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
  </div>
</div>

</script>
</body>
</html>
@endsection
