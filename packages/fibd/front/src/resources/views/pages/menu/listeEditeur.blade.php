@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
<div class="b-bandeau">
  <img src="{{ asset(media_url_if_not_null($choice[0]->media)) }}" alt="{{ media_alt_if_not_null($choice[0]->media['libelle_media'])}}">
</div>
<div class="fixed-breadcrumb">
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
          <li class="breadcrumb-item active" aria-current="page">{{ $choice[0]->titre_categoriePage }}</li>
        </ol>
      </nav>
      <div class="col-sm-12">
        <div class="title-header with-share">
          <!-- <a href="{{ URL::previous() }}" class="btn btn-retour d-none d-md-flex">RETOUR PROGRAMMATIONS</a> -->
          <div class="buttons-header">
            @include('front::includes.shareLink')
            <a href="#" class="icon-print"></a>
          </div>
          <h1>{{ $choice[0]->titre_categoriePage }}</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row" >
    <div class="col-sm-12">
      <div class="content-header">
        <h2 class="p">
          {!! $choice[0]->description_categoriePage !!}
        </h2>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row b-actualites">
      @foreach($intervenants as $intervenant)
        <div class="col-xl-3 col-md-6" style="max-height: 200px;">
              <div class="b-actu" style="box-shadow: 0 0 15px rgba(0, 0, 0, 0.16);">
                <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 b-actu__thumb">
                  <img src="{{ asset(media_url_if_not_null($intervenant->media)) }}" alt="{{ media_alt_if_not_null($intervenant->media['libelle_media'])}}" style="max-width: 150px !important; max-height:90px !important">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12" style="padding: 0px 10px;">
                @if($intervenant->nom_societe)
                <div>
                  <B>{!! $intervenant->nom_societe !!}</B><br>
                  {!! $intervenant->lieuExposition['libelle_lieuExposition'] !!}<br>
                Stand : {!! $intervenant->numero_stand_societe !!}
              </div>
                @else
                <div class="p"></div>
                @endif
              </div>
            </div>
            </div>
        </div>
      @endforeach
    </div>
</div>

@endsection
