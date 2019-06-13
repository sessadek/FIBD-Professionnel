
@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-header pt-75">
                        <h1>{{ $choice[0]->titre_categoriePage}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- <div class="date-header"><div class="p">Le lundi 30 avril 2018 à 12h50</div></div> -->
                    <div class="content-header">
                        <h2 class="p">
                          {!! $choice[0]->description_categoriePage !!}
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="timeline timeline-actualites">
                      @foreach($actualites as $actualite)
                        <div class="b-timeline {{$actualite->id_typeFormeActualite}} node-actualite" >
                            <div class="b-timeline__date">{{date('d/m/Y', strtotime($actualite->date_start_actualite))}} {{date('H:i', strtotime($actualite->heure_start_actualite))}}</div>
                            <div class="b-timeline__body">
                                @switch($actualite->id_typeFormeActualite)
                                    @case('photo')
                                      <figure>
                                          <img src="{{ asset(media_url_if_not_null($actualite->media))}}" alt="{{ media_alt_if_not_null($actualite->media['libelle_media'])}}">
                                          <figcaption>{!! $actualite->description_courte_actualite !!}</figcaption>
                                      </figure>
                                    @break
                                    @case('youtube')
                                      <div class="embed-responsive embed-responsive-21by9">
                                           <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$actualite->video->code_video}}" allowfullscreen></iframe>
                                      </div>
                                      <h2>{{ $actualite->titre_actualite}}</h2>
                                    @break
                                    @case('article')
                                    @case('facebook')
                                        <img src="{{ asset(media_url_if_not_null($actualite->media)) }}" alt="{{ media_alt_if_not_null($actualite->media['libelle_media'])}}">
                                        <h2>{{ $actualite->titre_actualite}}</h2>
                                        <div class="b-timeline__text">
                                          {!! $actualite->description_courte_actualite !!}
                                        </div>
                                        @if(striptags($actualite->description_actualite)!='')
                                          <a href="{{ url($actualite->url_canonical_actualite) }}" class="btn btn-primary btn-more">EN SAVOIR PLUS</a>
                                        @endif
                                    @break
                                    @default

                                @endswitch
                            </div>
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>

        </div>

  @endsection
