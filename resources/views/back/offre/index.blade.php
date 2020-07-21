@extends('layouts.templateBack')
@section('activeoffre')
  active
@endsection
@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <form action="{{route('offre.create')}}" method="POST">
        @csrf
        @method('GET')
        <button type="submit" rel="tooltip" class="btn btn-info">
          <i class="material-icons">Ajouter une offre</i>
        </button>
      </form>
      <br>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Information Offres</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Entreprise</th>
                    <th>Date creation</th>
                    <th>nb Vue</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($lesoffres as $offre)
                    <tr>
                      <td> {{$offre->id}} </td>
                      <td> {{$offre->titre}} </td>
                      <td> {{$offre->description}} </td>
                      <td> {{$offre->entreprise->nom}} </td>
                      <td> {{$offre->date_inline}} </td>
                      <td> {{$offre->vue}} </td>
                      <td class="td-actions text-center">
                        <div style="display: inline-flex;">
                          <form action="{{route('offre.show', $offre->id)}}" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" rel="tooltip" class="btn btn-secondary btn-round">
                              <i class="material-icons">Voire</i>
                            </button>
                          </form>
                          <form action="{{route('offre.edit', $offre->id)}}" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" rel="tooltip" class="btn btn-success btn-round">
                              <i class="material-icons">Modifier</i>
                            </button>
                          </form>
                          <form action="{{route('offre.destroy', $offre->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" rel="tooltip" class="btn btn-danger btn-round" onclick="return confirm('Est tu sur de vouloir supprimer cette entreprise ?')">
                              <i class="material-icons">Supprimer</i>
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
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Entreprise</th>
                    <th>Date creation</th>
                    <th>nb Vue</th>
                    <th>action</th>
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
