@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
<div class="container">
  <div class="row">
    <div class="col-sm-12"><div class="h1" style="padding: 20px; text-align: center;"> {{ mb_strtoupper('Résultats de recherche', 'UTF-8') }}</div></div>
  </div>
  @foreach($display_search as $key => $value)
  @if(count($value) > 0)
  @if($key !== 'medias')
  <div class="row">
    <div class="col-sm-12"><div class="h2" style="padding: 20px; text-align: center;">{{ strtoupper($key) }}</div></div>
  </div>
  @foreach($value as $search)
  <div class="row">
      <div class="col-md-6">
        <div class="b-result">
          <div class="b-result__thumb" style="background-image: url({{ asset(media_url_if_not_null($search['media']))}});">
            <img src="{{ asset(media_url_if_not_null($search['media']))}}" alt="" style="opacity: 0;">
          </div>
          <div class="b-result__body">
            <div class="h3">{!! $search['titre'] !!}</div>
            <div class="p">{!! $search['description'] !!}</div>
            <a href="{{ url($search['url']) }}" class="btn btn-primary btn-more">EN SAVOIR PLUS</a>
          </div>
        </div>
      </div>
  </div>
  @endforeach
  @else
  <div class="col-sm-12">
    <div class="b-result__medias">
      @foreach($value as $media)
      <div class="b-result__medias--item" style="background-image: url({{ asset(media_url_if_not_null($media))}}); background-size: cover; width: 463px; height: 309px;">
        <img src="{{ asset(media_url_if_not_null($media))}}" alt="{{ $media->libelle_media }}" style="opacity: 0;">
      </div>
      @endforeach
    </div>
  </div>
  @endif
  @endif
  @endforeach
</div>
@endsection
