@extends('layouts.templateBack')

@section('content')
  <!-- Main content -->

  <section class="content">
    <div class="container-fluid">
      <form action="{{route('utilisateur.create')}}" method="POST">
        @csrf
        @method('GET')
        <button type="submit" rel="tooltip" class="btn btn-info">
          <i class="material-icons">Ajouter Utilisateur</i>
        </button>
      </form>
      <br>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Information Utilisateurs</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Statut</th>
                    <th>Entreprise</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($lesUtilisateurs as $utilisateur)
                    <tr>
                      <td> {{$utilisateur->id}} </td>
                      <td> {{$utilisateur->name}} </td>
                      <td> {{$utilisateur->email}} </td>
                      <td> {{$utilisateur->statut}} </td>
                      @if ($utilisateur->statut == "entreprise")
                        <td> {{$utilisateur->entreprise->nom}}</td>
                      @else
                        <td> N/A </td>
                      @endif



                          <td class="td-actions text-center">
                            <div style="display: inline-flex;">
                              <form action="{{route('utilisateur.show', $utilisateur->id)}}" method="POST">
                                @csrf
                                @method('GET')
                                <button type="submit" rel="tooltip" class="btn btn-secondary btn-round">
                                  <i class="material-icons">Voire</i>
                                </button>
                              </form>
                              <form action="{{route('utilisateur.edit', $utilisateur->id)}}" method="POST">
                                @csrf
                                @method('GET')
                                <button type="submit" rel="tooltip" class="btn btn-success btn-round">
                                  <i class="material-icons">Modifier</i>
                                </button>
                              </form>
                              <form action="{{route('utilisateur.destroy', $utilisateur->id)}}" method="POST">
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
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Statut</th>
                        <th>Entreprise</th>
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
