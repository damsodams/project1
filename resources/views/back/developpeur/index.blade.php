@extends('layouts.templateBack')

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
                    <th>Competence</th>
                    <th>Téléphone</th>
                    <th>Addresse</th>
                    <th>Date de naissance</th>
                    <th>photo</th>
                    <th>cv</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($lesdev as $dev)
                    <tr>
                      <td> {{$dev->id}} </td>
                      <td> {{$dev->competence}} </td>
                      <td> {{$dev->telephone}} </td>
                      <td> {{$dev->adresse}} {{$dev->code_postal}} {{$dev->ville}}</td>
                      <td> {{$dev->date_naissance}} </td>
                      <td> <img style="height : 40px; width : 40px;" src="{{url($dev->photo)}}" </td>
                      <td><a href="{{asset(url($dev->cv))}}" target="_blank">
                        <img class="card_img" style="max-height : 40px; max-width : 40px;"src="{{url('images/pdf_ico.png')}}">
                      </a>
                    </td>

                      <td class="td-actions text-center">
                        <div style="display: inline-flex;">
                          <form action="{{route('developpeur.show', $dev->id)}}" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" rel="tooltip" class="btn btn-secondary btn-round">
                              <i class="material-icons">Voire</i>
                            </button>
                          </form>
                          <form action="{{route('developpeur.edit', $dev->id)}}" method="POST">
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
                    <th>Competence</th>
                    <th>Téléphone</th>
                    <th>Addresse</th>
                    <th>Date de naissance</th>
                    <th>photo</th>
                    <th>cv</th>
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
