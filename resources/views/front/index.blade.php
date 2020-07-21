@extends('layouts.templateFront')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="timeline">
        <br>
        @php
          $i = 0;
        @endphp
        @foreach ($lesoffres as $offre)
        @if ($i == 0)
          <div class="time-label">
            @if (date("d-m-Y" , strtotime($offre->date_inline)) == date("d-m-Y"))
              <span class="bg-red">Aujourd'hui</span>
            @else
              <span class="bg-red">{{date("d-m-Y" , strtotime($offre->date_inline))}}</span>
            @endif
          </div>
        @else
          @if (date("d-m-Y", strtotime($lesoffres[$i-1]->date_inline)) != date("d-m-Y" , strtotime($offre->date_inline)))
            <div class="time-label">
              <span class="bg-red">{{date("d-m-Y" , strtotime($offre->date_inline))}}</span>
            </div>
          @endif
        @endif
          <div>
          <img class="timeline-logoentreprise" src="{{url($offre->entreprise->logo)}}">
            <div class="timeline-item">
              <span class="time"><i class="fas fa-clock"></i>{{$offre->date_inline}}</span>
              <h3 class="timeline-header"><a href="#">{{$offre->titre}}</a>  {{$offre->entreprise->nom}}</h3>

              <div class="timeline-body">
                {{$offre->description}}
              </div>
              <div class="timeline-footer">
                <a href="#" class="btn btn-primary btn-sm">Voir +</a>
                <a href="#" class="btn btn-success btn-sm">Postuler</a>
              </div>
            </div>
          </div>
          @php
            $i++;
          @endphp
        @endforeach
        <div>
          <i class="fas fa-clock bg-gray"></i>
        </div>
      </div>
    </div>
  </div>
@endsection
