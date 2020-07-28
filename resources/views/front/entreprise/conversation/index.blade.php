@extends('layouts.templateFront')
@section('content')
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <br>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-3">
        <div class="row  overlay-600">
          <div class="col-md-12">
            @foreach ($user->conversation as $conv)
              <!--  <div class="row" onclick="viewconv({{$conv->msgs}} , {{$conv->users}})">-->
              <div class="row" >
                <div class="info-box ">
                  @foreach ($conv->users as $otheru)
                    @if ($user->id != $otheru->id)
                      @if ( $otheru->statut == "dev")
                        <span class="info-box-icon timeline-logoentreprise"><img src="{{url($otheru->developpeur->photo)}}"> </span>
                      @elseif ($otheru->statut == "entreprise")
                        <span class="info-box-icon timeline-logoentreprise"><img src="{{url($user->entreprise->logo)}}"> </span>
                      @elseif ($otheru->statut == "admin")
                        <span class="info-box-icon timeline-logoentreprise"><img src="{{url('/images/admin.png')}}"> </span>
                      @endif
                      <div class="info-box-content">
                        <span class="info-box-number">{{$otheru->name}}</span>
                        <span class="info-box-text ">{{$otheru->statut}}</span>
                        <span title="3 New Messages" class="badge bg-warning">3 Nouveau message</span>
                      </div>
                    @endif
                  @endforeach
                </div>
                <button id="btn" value="{{$conv->id}}" class="btn btn-success btn-submit">Submit</button>
              </div>
            @endforeach
            <script type="text/javascript">

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $(".btn-submit").click(function(e){
              e.preventDefault();
              var id = document.getElementById('btn').value();
              alert("je suis la");
              $.ajax({
                type:'POST',
                url:"{{ route('ajaxRequest.post') }}",
                data:{name:name, password:password, email:email},
                success:function(data){
                  alert(data.success.name);
                }
              });
            });

            function viewconv(conv , users){
              usr =  <?php echo json_encode($user); ?>;
              for (let i = 0; i < 2; i++) {
                if (usr.id != users[i].id) {
                  header.innerHTML = users[i].name;
                }
              }
              var div ='';
              for (var i = 0; i < conv.length; i++) {
                if (conv[i].sender == usr.id) {
                  div += '<div class="direct-chat-msg">';
                  div += '<div class="direct-chat-infos clearfix">';
                  div +=   '<span class="direct-chat-name float-left">'+conv[i].id+'</span>';
                  div +=   '<span class="direct-chat-timestamp float-right">'+conv[i].created_at+'</span>';
                  div +=   '</div>';
                  div +=   '<img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image">';
                  div +=   '<div class="direct-chat-text">';
                  div +=    conv[i].message;
                  div +=   '  </div>';
                  div +=   '  </div>';
                }else {
                  div +=  '<div class="direct-chat-msg right">';
                  div +=    '<div class="direct-chat-infos clearfix">';
                  div +=      '<span class="direct-chat-name float-right">'+conv[i].id+'</span>';
                  div +=    '  <span class="direct-chat-timestamp float-left">'+conv[i].created_at+'</span>';
                  div +=    '</div>';
                  div +=    '<img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image">';
                  div +=  '    <div class="direct-chat-text">';
                  div +=        conv[i].message;
                  div +=      '</div>';
                  div +=    '</div>';
                }
              }
              document.getElementById("chat-div" ).innerHTML = div;
            }
            </script>

          </div>
        </div>
        <div class="card-footer">
          <form action="#" method="post">
            <span class="input-group-append">
              <button style="width : 100%"type="submit" class="btn btn-primary">Nouvelle conversation</button>
            </span>
          </form>
        </div>
      </div>
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-12">
            <div  class="card card-prirary cardutline direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title"  id="header" >Direct Chat</h3>
                <div class="card-tools">

                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="chat-div" class="direct-chat-messages">
                </div>
              </div>
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
