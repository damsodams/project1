@extends('layouts.templateBack')
@section('activeentreprise')
  active
@endsection
@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Information Entreprise</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>logo</th>
                    <th>Siret</th>
                    <th>Téléphone</th>
                    <th>Addresse</th>
                    <th>Secteur d'activité</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($lesEntreprises as $entreprise)
                    <tr>
                      <td> {{$entreprise->id}} </td>
                      <td> {{$entreprise->nom}} </td>
                      <td> <img style="height : 40px; width : 40px;" src="{{url($entreprise->logo)}}"></td>
                      <td> {{$entreprise->siret}} </td>
                      <td> {{$entreprise->telephone}} </td>
                      <td> {{$entreprise->adresse}} {{$entreprise->code_postal}} {{$entreprise->ville}}</td>
                      <td> {{$entreprise->secteur_activité}} </td>

                      <td class="td-actions text-center">
                        <div style="display: inline-flex;">
                          <form action="{{route('entreprise.show', $entreprise->id)}}" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" rel="tooltip" class="btn btn-secondary btn-round">
                              <i class="material-icons">Voire</i>
                            </button>
                          </form>
                          <form action="{{route('entreprise.edit', $entreprise->id)}}" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" rel="tooltip" class="btn btn-success btn-round">
                              <i class="material-icons">Modifier</i>
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>logo</th>
                    <th>Siret</th>
                    <th>Téléphone</th>
                    <th>Addresse</th>
                    <th>Secteur d'activité</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection
