@extends('layouts.templateFront')
@section('content')

  <br>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Boite au lettre</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="mailbox-controls">
              <!-- Check all button -->
              <button type="button" onclick="chkall({{$messages->count()}})"  class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
              </button>
              <div class="btn-group">
                <button type="button" onclick="trash({{$messages->count()}});"class="btn btn-default btn-sm">
                  <i class="far fa-trash-alt"></i>
                </button>
              </div>
              <button type="button" onclick="document.location.href='{{route('mail_index')}}'"class="btn btn-default btn-sm">
                <i class="fas fa-sync-alt"></i>
              </button>
              <div class="float-right">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive mailbox-messages">
              <table class="table table-hover table-striped">
                <tbody>
                  @php
                  $i = 0;
                  @endphp
                  @foreach ($messages as $message)
                    <tr>
                      <td>
                        <div class="icheck-primary">
                          <input type="checkbox" value="{{$message->id}}" id="check{{$i}}">
                          <label for="check{{$i}}"></label>
                        </div>
                      </td>
                      @if ($message->is_open == true)
                        <td onclick=" document.location.href='{{route('mail_show', ['id'=>$message->id])}}'" class="mailbox-star"><i class="fas fa-circle text-dark"></i></a></td>
                      @else
                        <td onclick=" document.location.href='{{route('mail_show', ['id'=>$message->id])}}'" class="mailbox-star"><i class="fas fa-circle text-warning"></i></a></td>
                      @endif
                      <td onclick=" document.location.href='{{route('mail_show', ['id'=>$message->id])}}'" class="mailbox-name">{{$message->emetteur->name}}</a></td>
                      @if ($message->is_open == true)
                        <td onclick=" document.location.href='{{route('mail_show', ['id'=>$message->id])}}'" class="mailbox-attachment">{{$message->objet}}</td>
                      @else
                        <td onclick=" document.location.href='{{route('mail_show', ['id'=>$message->id])}}'" class="mailbox-subject"><b>{{$message->objet}}</b></td>
                      @endif
                      <td onclick=" document.location.href='{{route('mail_show', ['id'=>$message->id])}}'" class="mailbox-date">{{$message->created_at}}</td>
                    </tr>
                    <script>
                    function trash(nb_mess){
                      var myArray = [];
                      for (var i = 0; i < nb_mess; i++) {
                        if(document.getElementById('check' + i).checked){
                          myArray.push(document.getElementById('check' + i).value);
                        }
                      }
                      var url = '{{ route("mail_destroy", ":id") }}';
                      url = url.replace(':id', myArray);
                      document.location.href= url;
                    }
                    function chkall(nb_mess){
                      if (document.getElementById('check0').checked == true) {
                        for (var i = 0; i < nb_mess; i++) {
                          document.getElementById('check' + i).checked = false;
                        }
                      }else{
                        for (var i = 0; i < nb_mess; i++) {
                          document.getElementById('check' + i).checked = true;
                        }
                      }
                    }

                    </script>
                    @php
                    $i++;
                    @endphp
                  @endforeach
                </tbody>



              </table>
              <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer p-0">
            <div class="mailbox-controls">
              <!--AJOUT POSSIBLE D'UN FOOTER ICI-->
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>

  <!-- /.content -->
</div>
@endsection
