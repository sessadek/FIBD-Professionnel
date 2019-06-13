@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
<div class="b-bandeau" style="background: url({{ asset(media_url_if_not_null($palmares[0]->media)) }})">
  <img src="{{ asset(media_url_if_not_null($palmares[0]->media)) }}" alt="{{ media_alt_if_not_null($palmares[0]->media['libelle_media'])}}">
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
          <li class="breadcrumb-item active" aria-current="page">{{ $palmares[0]->titre_categoriePage }}</li>
        </ol>
      </nav>
      <div class="col-sm-12">
        <div class="title-header with-share">
          <div class="buttons-header">
            @include('front::includes.shareLink')
            <a href="#" class="icon-print"></a>
          </div>
          <h1>{{ $palmares[0]->titre_categoriePage }}</h1>
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
          {!! $palmares[0]->description_categoriePage !!}
        </h2>
      </div>
      <div class="thumbs-header">
        @foreach($palmares[0]->partenaire as $part)
        <img src="{{ asset(media_url_if_not_null($part->media)) }}" alt="{{ media_alt_if_not_null($part->media['libelle_media'])}}" width="150px" height="90px">
        @endforeach
      </div>

    </div>
  </div>
</div>
<?php
$colspan = 8;
if(count($prix[0]->mediaContent) == 0){
  $colspan = 12;
}
?>
<div class="container container-concours">
  <div class="row">
    <div class="col-md-{{$colspan}}">
      <div class="text-concours">
        {!! $prix[0]->blocPage[0]->description_blocPage !!}
      </div>
    </div>
    @if(count($prix[0]->mediaContent)> 0)
    <div class="col-md-4">
      <div class="sidebar">
          <?php
            $i_pdf =0;
           ?>
          @foreach($prix[0]->mediaContent as $pdf)
            @if($pdf->type_link == 'ressources')
              <?php
                  if($i_pdf == 0){
               ?>

                 <div class="b-sidebar">
              <?php
                }
                $i_pdf++;
                ?>
              <a href="{{url($pdf->media->url_media)}}" class="b-sidebar__pdf" target="_blank">{{$pdf->media->libelle_media}}</a>

            @endif
          @endforeach
          <?php
              if($i_pdf > 0){
           ?>
              </div>
            <?php } ?>
            @if(isset($prix[0]->mediaContent[0]->media))
        <!-- <div class="b-sidebar b-sidebar__thumb colledInMobile">

          <img src="{{ asset($prix[0]->mediaContent[0]->media->url_media) }}" alt="">

        </div> -->
        @endif
        @if($prix[0]->mediaContent !== '')
        <div class="lightbox-carousel__popup">
          <a href="#" class="lightbox-carousel__popup--transparent"></a>
          <div class="lightbox-carousel__popup--container">
            <a href="#" class="lightbox-carousel__popup--close"></a>
            <div class="lightbox-carousel">
              @foreach($prix[0]->mediaContent as $galerie)
              @if($galerie->type_link == 'galerie')
              @if(isset($galerie->media))
              <div class="lightbox-carousel__item"><img src="{{ asset($galerie->media->url_media) }}" alt="{{ media_alt_if_not_null($galerie->media->libelle_media])}}"></div>
              @endif
              @endif
              @endforeach
            </div>
            <div class="lightbox-carousel--nav">
              @foreach($prix[0]->mediaContent as $galerie)
              @if($galerie->type_link == 'galerie')
              @if(isset($galerie->media))
              <div class="lightbox-carousel--nav__item"><img src="{{ asset($galerie->media->url_media) }}" alt="{{ media_alt_if_not_null($galerie->media->libelle_media])}}"></div>
              @endif
              @endif
              @endforeach
            </div>
          </div>
        </div>
        @endif
      </div>
      @if(isset($listVideo))
      @foreach($listVideo as $video)
      <div class="embed-responsive embed-responsive-21by9">
           <iframe class="embed-responsive-item" style="padding-bottom: 20px"src="https://www.youtube.com/embed/{{$video->code_video}}" allowfullscreen></iframe>
      </div>
      @endforeach
      @endif
    </div>
    @endif
  </div>
</div>


@endsection
