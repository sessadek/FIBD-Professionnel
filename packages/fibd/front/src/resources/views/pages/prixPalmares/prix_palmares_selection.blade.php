@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb" class="w-100 d-none d-md-flex">
                    <ol class="breadcrumb col-sm-12 ">
                      <?php $count= 0 ?>
                      @foreach($breadcrumb as $bread)
                      @if($count !== count($breadcrumb)-1)
                        <li class="breadcrumb-item"><a href="{{ url($bread['url']) }}">{{ $bread['name']}}</a></li>
                      @endif
                      <?php $count++ ?>
                      @endforeach
                        <li class="breadcrumb-item active" aria-current="page">{{ $palmares[0]->titre_categoriePage }}</li>
                    </ol>
                </nav>
                <div class="col-sm-12">
                    <div class="title-header">
                        <h1>{{ $palmares[0]->titre_categoriePage }}</h1>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="content-header">
                        <div class="p">
                          {{ $palmares[0]->description_categoriePage }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container b-actualites pb-2">
            <div class="row">
              @foreach($officiel[0]->selectionAlb as $prix)

                <div class="col-xl-4 col-md-6">
                    <div class="b-actu">
                        <div class="h2">{{ $prix->libelle_albumSelection }}</div>
                        <div class="b-actu__thumb">
                          <a href="{{ url($prix->url_albumSelection)}}">
                            <h2><img src="{{ asset(media_url_if_not_null($prix->media, 'Selection-rond-point-FIBD', 'crops'))}}" alt="{{ media_alt_if_not_null($prix->media['libelle_media'])}}"></h2>
                            <a href="{{ url($prix->url_albumSelection)}}" class="btn btn-primary btn-more">EN SAVOIR PLUS</a>
                          </a>
                        </div>
                        @if(count($prix->auteur) > 0 && $prix->editeur)
                        <div class="p">{{ $prix->auteur[0]->prenom_auteurSelection }} {{ $prix->auteur[0]->nom_auteurSelection }}<br>{{ $prix->editeur->libelle_editeurSelection }}</div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @if(count($partenaire) > 0 )
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
