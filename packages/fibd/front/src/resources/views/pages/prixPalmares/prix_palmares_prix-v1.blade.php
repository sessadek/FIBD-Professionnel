@extends('front::layouts.default')
@section('content')
        <div class="header__middle--right d-flex d-md-none">
//            <a href="{{ url('infos-pratiques/billetterie')}}" class="btn btn-danger">BILLETTERIE</a>
            <div class="b-search">
                <span class="search-overlay"></span>
                <a style="display: none" href="#" class="btn-search"></a>
            </div>
        </div>

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
                        <h1>{!! $palmares[0]->titre_categoriePage !!}</h1>
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

        <div class="container b-actualites pb-2">
            <div class="row">
              @foreach($officiel as $prix)
                <div class="col-xl-4 col-md-6">
                    <div class="b-actu">
                        <div class="h2">{{ strip_tags($prix->libelle_prixPalmares) }}</div>
                        <div class="p">
                          {{ $prix->fauve_prixPalmares }}
                        </div>
                        <div class="b-actu__thumb">
                          @if(isset($prix->attribution))
                            <h2><img src="{{ asset(media_url_if_not_null($prix->attribution->media))}}" alt="{{ strip_tags($prix->libelle_prixPalmares) }}:{{ $prix->fauve_prixPalmares }}"></h2>
                            @if($prix->attribution->id_albumSelection == 0 && substr($prix->attribution->url_albumPrixPalmares, 0, 4 ) == 'http')
                            <a href="{{ $prix->attribution->url_albumPrixPalmares }}" class="btn btn-primary btn-more" target="_blank">EN SAVOIR PLUS</a>
                            @else
                            <a href="{{ url($prix->attribution->url_albumPrixPalmares)}}" class="btn btn-primary btn-more">EN SAVOIR PLUS</a>
                            @endif
                          @else
                          <h2><img src="{{ asset('palmares-fibd.jpg')}}" alt=""></h2>
                          @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
  @endsection
