@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
        <div class="b-bandeau" style="background: url({{ asset(media_url_if_not_null($choice[0]->media)) }})">
            <img src="{{ asset(media_url_if_not_null($choice[0]->media)) }}" alt="{{ media_alt_if_not_null($choice[0]->media['libelle_media'])}}">
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
                            <li class="breadcrumb-item active" aria-current="page">{{ $choice[0]->titre_categoriePage }}</li>
                        </ol>
                    </nav>
                    <div class="col-sm-12">
                        <div class="title-header with-share">
                            <!-- <a href="{{ URL::previous() }}" class="btn btn-retour d-none d-md-flex">RETOUR CONCOURS BD SCOLAIRE</a> -->
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
            <div class="row">
                <div class="col-sm-12">
                    <!-- <div class="date-header"><div class="p">Le lundi 30 avril 2018 à 12h50</div></div> -->
                    <div class="content-header">
                        <h2 class="p">
                            {!! $choice[0]->description_categoriePage !!}
                        </h2>
                    </div>
                    <div class="thumbs-header">
                      @foreach($choice[0]->partenaire as $part)
                        <img src="{{ asset(media_url_if_not_null($part->media)) }}" width="150px" height="90px" alt="{{ media_alt_if_not_null($part->media['libelle_media'])}}">
                      @endforeach
                    </div>

                </div>
            </div>
        </div>
        <?php
          $colspan = 8;
          if(count($detail[0]->mediaContent) == 0){
            $colspan = 12;
          }
         ?>
        <div class="container container-concours">

            <div class="row">
                <div class="col-md-{{$colspan}}">
                    <div class="text-concours">
                      {!! $detail[0]->blocPage[0]->description_blocPage !!}
                    </div>
                </div>
                @if(count($detail[0]->mediaContent)> 0)
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="b-sidebar">
                          @foreach($detail[0]->mediaContent as $pdf)
                            @if($pdf->type_link == 'ressources')
                              <a href="{{url($pdf->media->url_media)}}" class="b-sidebar__pdf" target="_blank">{{$pdf->media->libelle_media}}</a>
                            @endif
                          @endforeach
                        </div>
                        @if(isset($detail[0]->mediaContent[0]->media))
                        <div class="b-sidebar b-sidebar__thumb">
                            <img src="{{ asset($detail[0]->mediaContent[0]->media->url_media) }}" alt="{{ media_alt_if_not_null($detail[0]->mediaContent[0]->media->libelle_media)}}">
                        </div>
                        @endif
                        @if(isset($detail[0]->mediaContent))
                        <div class="lightbox-carousel__popup">
                            <a href="#" class="lightbox-carousel__popup--transparent"></a>
                            <div class="lightbox-carousel__popup--container">
                                <a href="#" class="lightbox-carousel__popup--close"></a>
                                <div class="lightbox-carousel">
                                  @foreach($detail[0]->mediaContent as $galerie)
                                    @if(isset($galerie->media))
                                    @if($galerie->type_link == 'galerie')
                                    <div class="lightbox-carousel__item"><img src="{{ asset($galerie->media->url_media) }}" alt="{{ media_alt_if_not_null($galerie->media->libelle_media)}}"></div>
                                    @endif
                                    @endif
                                  @endforeach
                                </div>
                                <div class="lightbox-carousel--nav">
                                  @foreach($detail[0]->mediaContent as $galerie)
                                    @if(isset($galerie->media))
                                    @if($galerie->type_link == 'galerie')
                                    <div class="lightbox-carousel--nav__item"><img src="{{ asset($galerie->media->url_media) }}" alt="{{ media_alt_if_not_null($galerie->media->libelle_media)}}"></div>
                                    @endif
                                    @endif
                                  @endforeach
                                </div>
                            </div>

                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
@endsection
