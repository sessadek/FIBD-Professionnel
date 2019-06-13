@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
        <div class="b-bandeau" style="background-image: url({{ asset(media_url_if_not_null($detailAlbum[0]->mediaBackground)) }})">
            <img src="{{ asset(media_url_if_not_null($detailAlbum[0]->mediaBackground)) }}" alt="{{ $detailAlbum[0]->mediaBackground->libelle_media }}">
            <div class="pos-a-container d-none d-md-block">
                <div  class="b-bandeau__thumb" style=" box-shadow: 3px 3px 25px rgb(0, 0, 0, 0.95); border: 1px #FFF SOLID; ">
                    <img  src="{{ asset(media_url_if_not_null($detailAlbum[0]->media, 'Selection-couv-album-FIBD')) }}" width="300px;" height="400px;" alt="{{ $detailAlbum[0]->media->libelle_media}}">
                </div>
            </div>
        </div>
        <div class="breadcrum_background">
            <div class="container">
                <div class="row">
                    <nav aria-label="breadcrumb" class="w-100 d-none d-md-flex">
                        <ol class="breadcrumb col-sm-12 ">
                          @foreach($breadcrumb as $bread)
                            <li class="breadcrumb-item"><a href="{{ url($bread['url']) }}">{{ $bread['name']}}</a></li>
                          @endforeach
                            <li class="breadcrumb-item active" aria-current="page">{{ $detailAlbum[0]->libelle_albumSelection }}</li>
                        </ol>
                    </nav>
                    <div class="col-sm-12">
                        <div class="title-header with-share">
                            <div class="buttons-header">
                                @include('front::includes.shareLink')
                                <a href="#" class="icon-print"></a>
                            </div>
                            <h1>{{ $detailAlbum[0]->libelle_albumSelection }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="thumbs-header">
                        <!-- <img src="https://via.placeholder.com/150x90"> -->
                    </div>

                </div>
            </div>
        </div>

        <div class="container container-concours mb-3">
            <div class="row">
                <div class="col-md-8">
                    <div class="text-concours fz-16">
                        <div class="d-block d-md-none">
                            <div class="p">{!! $detailAlbum[0]->description_albumSelection !!}</div>
                        </div>
                    </div>

                    <div class="sidebar">
                        <div class="box-shadow d-block d-md-none">
                            <div class="p"><strong>ÉDITEUR</strong>{{ $detailAlbum[0]->editeur->libelle_editeurSelection}}</div>
                            @if(isset($arrayConcepteur) && count($arrayConcepteur)>0)
                              @foreach($arrayConcepteur as $key=>$value)
                            <div class="p"><strong>{{ strtoupper($value['libelle']) }}</strong>
                              {{ strtoupper($value['liste']) }}
                            </div>
                            @endforeach
                            @endif
                            <div class="p"><strong>PARUTION</strong>{{ date('d-m-Y', strtotime($detailAlbum[0]->date_parution_albumSelection)) }}</div>
                        </div>
                    </div>
                    @foreach($detailAlbum[0]->auteur as $authdetail)
                    @if(isset($authdetail->media))
                    <img src="{{ asset(media_url_if_not_null($authdetail->media)) }}" alt=" {{$authdetail->prenom_auteurSelection }} {{$authdetail->nom_auteurSelection }}" class="d-block d-md-none mx-auto">
                    @endif
                    <h2 class="d-block d-md-none fz23">{{$authdetail->prenom_auteurSelection }} {{$authdetail->nom_auteurSelection }}</h2>
                    <div class="text-concours fz-16">
                        <div class="d-none d-md-block">
                          <div class="p">{!! $detailAlbum[0]->description_albumSelection !!}</div>
                        </div>
                        <h2 class="d-none d-md-block" style="margin-top: 20px;"> {{$authdetail->prenom_auteurSelection }} {{$authdetail->nom_auteurSelection }}</h2>

                        <div class="p">
                          @if(isset($authdetail->media))
                          <span>
                          <img src="{{ asset(media_url_if_not_null($authdetail->media, 'Selection-couv-album-FIBD')) }}" alt="{{$authdetail->prenom_auteurSelection }} {{$authdetail->nom_auteurSelection }}" class="d-none d-md-block" style="float: left; margin: 0px 15px 0px 0px; max-width: 230px; max-height: 230px;">
                        </span>
                        @endif
                        {!! $authdetail->biographie_auteurSelection !!}
                      </div>

                        <div class="p">{!! nl2br($authdetail->bibliographie_auteurSelection) !!}</div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="box-shadow d-none d-md-block">
                            <div class="p"><strong>ÉDITEUR</strong>{{ $detailAlbum[0]->editeur->libelle_editeurSelection}}</div>
                              @if(isset($arrayConcepteur) && count($arrayConcepteur)>0)
                            @foreach($arrayConcepteur as $key=>$value)
                          <div class="p"><strong>{{ strtoupper($value['libelle']) }}</strong>
                            {{ strtoupper($value['liste']) }}
                          </div>
                          @endforeach
                          @endif
                            <div class="p"><strong>PARUTION</strong>{{ date('d-m-Y', strtotime($detailAlbum[0]->date_parution_albumSelection)) }}</div>
                        </div>
                        <?php
                            $libelle_media_album=$detailAlbum[0]->libelle_albumSelection;
                         ?>
                         @if(isset($detailAlbum[0]->carousel[0]->media->libelle_media) && $detailAlbum[0]->carousel[0]->media->libelle_media!='')
                            <?php $libelle_media_album=$detailAlbum[0]->carousel[0]->media->libelle_media; ?>
                         @endif
                        <div class="b-sidebar b-sidebar__thumb">
                            <img src="{{ asset(media_url_if_not_null($detailAlbum[0]->carousel[0]->media)) }}" alt="{{ media_alt_if_not_null($detailAlbum[0]->carousel[0]->media['libelle_media'])}}">
                        </div>
                      @if(isset($detailAlbum[0]->carousel))
                        <div class="lightbox-carousel__popup">
                            <a href="#" class="lightbox-carousel__popup--transparent"></a>
                            <div class="lightbox-carousel__popup--container">
                                <a href="#" class="lightbox-carousel__popup--close"></a>
                                <div class="lightbox-carousel">
                                  @foreach($detailAlbum[0]->carousel as $page)
                                    <?php
                                        $libelle_media_page='Page : '.$detailAlbum[0]->libelle_albumSelection;
                                     ?>
                                     @if(isset($page->media->libelle_media) && $page->media->libelle_media!='')
                                        <?php $libelle_media_page=$page->media->libelle_media; ?>
                                     @endif
                                    <div class="lightbox-carousel__item"><img src="{{asset(media_url_if_not_null($page->media))}}" alt="{{ media_alt_if_not_null($page->media['libelle_media'])}}"></div>
                                  @endforeach
                                </div>
                                <div class="lightbox-carousel--nav">
                                  @foreach($detailAlbum[0]->carousel as $thumb)
                                    <?php
                                        $libelle_media_page='Vignette : '.$detailAlbum[0]->libelle_albumSelection;
                                     ?>
                                     @if(isset($page->media->libelle_media) && $page->media->libelle_media!='')
                                        <?php $libelle_media_page=$page->media->libelle_media; ?>
                                     @endif
                                    <div class="lightbox-carousel--nav__item"><img src="{{asset(media_url_if_not_null($thumb->media))}}" alt="{{ media_alt_if_not_null($thumb->media['libelle_media'])}}"></div>
                                  @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
  @endsection
