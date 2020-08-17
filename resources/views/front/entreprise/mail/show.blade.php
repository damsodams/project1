@extends('layouts.templateFront')
@section('content')

  <br><hr><br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <a href="{{route('mail_index')}}" class="btn btn-primary btn-block mb-3">Back to Inbox</a>
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Read Mail</h3>

            <div class="card-tools">
              <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
              <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="mailbox-read-info">
              <h5>{{$message->objet}}</h5>
              <h6>From: {{$message->emetteur->name}} ({{$message->emetteur->email}})
                <span class="mailbox-read-time float-right">{{$message->created_at}}</span></h6>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
                    <i class="fas fa-reply"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm" data-container="body" title="Forward">
                    <i class="fas fa-share"></i>
                  </button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" title="Print">
                  <i class="fas fa-print"></i>
                </button>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p>Bonjour,</p>

                <p>L'utilisateur {{$message->emetteur->name}} a postuler à l'offre "{{$message->post->offre->titre}}".</p>
                <p>Information sur l'utilisateur : <p>

                  <div class="row">
                    <div class="form-group col-md-9">
                      <p>{{$message->emetteur->name}}   <br>
                        né le : {{$message->emetteur->developpeur->date_naissance}}<br>
                        {{$message->emetteur->developpeur->adresse}}  <br>
                        {{$message->emetteur->developpeur->code_postal}}, {{$message->emetteur->developpeur->ville}}  <br>
                        Email : {{$message->emetteur->email}}  <br>
                        Tel : {{$message->emetteur->developpeur->telephone}}  <br></p>
                      </div>
                      <div class="form-group col-md-2">
                        <img style="max-width : 100px ;max-height : 100px;"src="{{url($message->emetteur->developpeur->photo)}}"><br>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <p>Diplome : <br>
                          @foreach ($message->emetteur->developpeur->diplomes as $diplome )
                            - {{$diplome->intitule}} - Mention {{$diplome->mention}}, Obtenue en {{$diplome->date_obtention}} <br>
                          @endforeach
                        </p>
                      </div>
                      <div class="form-group col-md-6">
                        <p>Experience professionelle :<br>
                          @foreach ($message->emetteur->developpeur->experiences as $xp )
                            - {{$xp->entreprise}} a {{$xp->ville}} - Au poste de : {{$xp->poste}}.<br>
                            du {{$xp->annee_debut}} au {{$xp->annee_fin}}
                          @endforeach
                        </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <p>Competence : {{$message->emetteur->developpeur->competence}}</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <p>CV:
                          <div>
                            <a href="{{asset(url($message->emetteur->developpeur->cv))}}" target="_blank">
                              <img class="card_img center-align" style="max-height : 80px; max-width : 80px;"src="{{url('images/pdf_ico.png')}}">
                            </a>
                          </div>
                        </p>
                      </div>
                    </div>
                    @if ($message->post->is_validate == false)
                      <p><a class="btn btn-success" onclick="return confirm('Tu as cliquer sur valider, est tu sûre de ton choix?')" href="{{route('candidature_accepter',['id'=>$message->post->id])}}">Accepter</a>
                         <a class="btn btn-danger"  onclick="return confirm('Tu as cliquer sur refuser, est tu sûre de ton choix?')" href="{{route('candidature_refuser',['id'=>$message->post->id])}}">Refuser</a></p>
                    @else
                      @if ($message->post->statut == "3")
                        <p class="text-danger"> Vous avez validé cette candidature </p>
                      @else
                        <p class="text-danger"> Vous avez Refusé cette candidature </p>
                      @endif
                    @endif
                    <p>L'utilisateur sera automatiquement informer de votre choix. <br>
                      dans le cas ou vous avez accepter l'offre , l'utilisateur recevera vos information  de contact
                      afin de pour vous joindre.
                      dans le cas ou vous reffuser l'utilisateur ne pouras plus postuler a cette offre .
                      dans le cas ou vous desirerier plus d'information sur l'utilisateur, vous disposer de toute les
                      information necessaire pour rentrer en contacte avec celui-ci.
                    </p>
                    <p>Thanks,<br>Jane</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
        <br><hr><br>
      @endsection
