@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-header pt-75">
                        <h1>{{ $palmares[0]->titre_categoriePage }}</h1>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="content-header">
                        <div class="p">
                          {!! $palmares[0]->description_categoriePage !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container b-actualites">
            <div class="row">
              @foreach($palmares[0]->children as $palm)
                <div class="col-xl-4 col-md-6">
                    @if($palm->url_categoriePage != '')
                    <a href="{{ url($palm->url_categoriePage)}}"><div class="b-actu">
                    @else
                    <a href="{{ url($palm->link_categoriePage)}}" target="_blank"><div class="b-actu">
                    @endif
                        <div class="h2">{{ $palm->titre_categoriePage}}</div>
                        <div class="b-actu__thumb">
                          <h2 style="background-image: url({{asset(media_url_if_not_null( $palm->media, 'Articles-ADMT-BD-FIBD', 'crops'))}}); background-repeat: no-repeat; background-size: cover; background-position: center; min-height: 200px; height:16vw;">
                            <img style="opacity: 0;" src="{{asset(media_url_if_not_null( $palm->media, '0'))}}" alt="{{ media_alt_if_not_null($palm->media['libelle_media'])}}">
                          </h2>
                            <span class="btn btn-primary btn-more">EN SAVOIR PLUS</span>
                        </div>
                        @if($palm->small_description_categoriePage !== '')
                        <div class="p">{!! str_limit($palm->small_description_categoriePage, $limit=200, $end='...') !!}</div>
                        @else
                        <div class="p">{!! str_limit($palm->description_categoriePage, $limit=200, $end='...') !!}</div>
                        @endif
                    </div>
                  </a>
                </div>
                @endforeach
            </div>
        </div>
        @if(count($partenaire) >0)
        <div class="s-partenaire mb-60">
            <div class="container">
                <div class="h2">NOS PARTENAIRES</div>
                <div class="slider-partenaire">
                  @foreach($partenaire as $part)
                    <div class="slider-partenaire__item"><img src="{{ asset(media_url_if_not_null($part->media, 'Partenaires-BD-FIBD')) }}" alt="{{ media_alt_if_not_null($part->media['libelle_media'])}}"></div>
                  @endforeach
                </div>
            </div>
            <div class="container">
                <a href="{{ url('/partenaires')}}" class="btn btn-primary">VOIR TOUS NOS PARTENAIRES</a>
            </div>
        </div>
        @endif
  @endsection
