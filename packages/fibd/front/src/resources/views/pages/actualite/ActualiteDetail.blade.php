@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
<div class="b-bandeau">
  <img src="{{ asset(media_url_if_not_null($actualiteDetail[0]->media)) }}" alt="{{ media_alt_if_not_null($actualiteDetail[0]->media['libelle_media'])}}">
</div>
<div class="breadcrum_background">
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
          <li class="breadcrumb-item active" aria-current="page">{{ $actualiteDetail[0]->titre_actualite}}</li>
        </ol>
      </nav>
      <div class="col-sm-12">
        <div class="title-header with-share">
          <div class="buttons-header">
              @include('front::includes.shareLink')
            <a href="#" class="icon-print"></a>
          </div>
          <h1>{{ $actualiteDetail[0]->titre_actualite }}</h1>
        </div>
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
                  {!! $actualiteDetail[0]->description_courte_actualite !!}
                </h2>
            </div>
        </div>
    </div>
</div>
<div class="container container-concours" style="margin-top: 30px;">
  <div class="row">
    <div class="col-md-12">
      <div class="text-concours">
        {!! $actualiteDetail[0]->description_actualite !!}
      </div>
    </div>
  </div>
</div>
@endsection
