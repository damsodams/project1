@extends('layouts.templateBack')
@section('activeadmin')
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
              <h3 class="card-title">Information Developpeur</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($lesAdmin as $admin)
                    <tr>
                      <td> {{$admin->id}} </td>
                      <td> {{$admin->nom}} </td>
                      <td> {{$admin->prenom}} </td>

                      <td class="td-actions text-center">
                        <div style="display: inline-flex;">
                          <form action="{{route('administrateur.show', $admin->id)}}" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" rel="tooltip" class="btn btn-secondary btn-round">
                              <i class="material-icons">Voire</i>
                            </button>
                          </form>
                          <form action="{{route('administrateur.edit', $admin->id)}}" method="POST">
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
                    <th>Prenom</th>
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
