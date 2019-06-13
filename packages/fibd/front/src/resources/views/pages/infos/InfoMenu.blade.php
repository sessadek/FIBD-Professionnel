@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb" class="w-100 d-none d-md-flex">
                    <ol class="breadcrumb col-sm-12 ">
                      <?php $count = 0; ?>
                      @foreach($breadcrumb as $bread)
                      <?php if($count == count($breadcrumb)-1) break; ?>
                        <li class="breadcrumb-item"><a href="{{ url($bread['url']) }}">{{ $bread['name'] }}</a></li>
                        <?php $count++; ?>
                      @endforeach
                        <li class="breadcrumb-item active" aria-current="page">ACCESSIBILITÉ</li>
                    </ol>
                </nav>
                <div class="col-sm-12">
                    <div class="title-header pt35-sm">
                        <h1>ACCESSIBILITÉ P.M.R.</h1>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="content-header">
                        <div class="p">
                            Groupes ou particuliers, des solutions sont proposées : parking avec navettes relais, places de parking réservées.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container b-actualites">
          <div class="row">
            @foreach($choice[0]->children as $detail)
              <div class="col-xl-4 col-md-6">
                  <a href="{{ url('/infos-pratiques/accessibilite-pmr'.$detail->url_categoriePage) }}"><div class="b-actu">
                      <div class="h2">{{ $detail->titre_categoriePage }}</div>
                      <div class="b-actu__thumb">
                        <h2 style="background-image: url({{asset(media_url_if_not_null( $detail->media, 'Articles-ADMT-BD-FIBD'))}}); background-repeat: no-repeat; background-size: cover; background-position: center; min-height: 200px; height:16vw;">
                          <img style="opacity: 0;" src="{{asset(media_url_if_not_null( $detail->media, '0' ))}}" alt="{{ media_alt_if_not_null($detail->media['libelle_media'])}}">
                        </h2>
                        <span class="btn btn-primary btn-more">EN SAVOIR PLUS</span>
                      </div>
                      @if($detail->small_description_categoriePage)
                      <div class="p">{!! str_limit($detail->small_description_categoriePage, $limit= 210, $end = '...') !!}</div>
                      @else
                      <div class="p">{!! str_limit($detail->description_categoriePage, $limit= 210, $end = '...') !!}</div>
                      @endif
                  </div>
                </a>
              </div>
              @endforeach
          </div>
        </div>

        <div class="container container-accessibilite">
            <div class="row">
                <div class="col-md-8">
                  <?php $i = 0; ?>
                  @foreach($page as $detail)
                    <?php if($i == 2){break;}  ?>
                    <div class="h2">{{ $detail->titre_blocPage }}</div>
                    <div class="p">{!! $detail->description_blocPage !!}</div>
                    <?php $i++ ?>
                  @endforeach
                    </div>
                <div class="col-md-4">
                    <div class="h2">CONTACTS UTILES</div>
                    <div class="box-shadow">
                      {!! $page[2]->description_blocPage !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
