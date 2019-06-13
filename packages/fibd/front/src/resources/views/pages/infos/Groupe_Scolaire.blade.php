@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
        <div class="b-bandeau" style="background: url({{ asset(media_url_if_not_null($id[0]->media, 'Banniere-BDFIBD')) }})">
            <img src="{{ asset(media_url_if_not_null($id[0]->media, 'Banniere-BDFIBD')) }}" alt="{{ media_alt_if_not_null($id[0]->media['libelle_media'])}}">
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
                            <li class="breadcrumb-item active" aria-current="page">SCOLAIRES</li>
                        </ol>
                    </nav>
                    <div class="col-sm-12">
                        <div class="title-header with-share">
                            <div class="buttons-header">
                                @include('front::includes.shareLink')
                                <a href="#" class="icon-print"></a>
                            </div>
                            <h1>GROUPES SCOLAIRES</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-header">
                        <h2 class="p">
                            Venir au Festival de la Bande Dessinée d’Angoulême : <br />une sortie pédagogique enrichissante
                        </h2>
                    </div>

                </div>
            </div>
        </div>

        <div class="container container-concours mt-100 mb-3">
            <div class="row">
                <div class="col-md-8">
                    <div class="text-concours">
                      {!! $page[0]->description_blocPage !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="b-sidebar">
                            {!! $page[1]->description_blocPage !!}
                        </div>

                            {!! $page[2]->description_blocPage !!}


                        <div class="b-sidebar b-sidebar__thumb colledInMobile">
                            <img src="{{ asset($pagesite[0]->mediaContent[0]->media->url_media) }}" alt="{{ media_alt_if_not_null($pagesite[0]->mediaContent[0]->media->libelle_media)}}">
                        </div>
                        <div class="lightbox-carousel__popup">
                            <a href="#" class="lightbox-carousel__popup--transparent"></a>
                            <div class="lightbox-carousel__popup--container">
                                <a href="#" class="lightbox-carousel__popup--close"></a>
                                <div class="lightbox-carousel">
                                  @foreach($pagesite[0]->mediaContent as $galerie)
                                    @if($galerie->type_link == 'galerie')
                                    <div class="lightbox-carousel__item"><img src="{{ asset($galerie->media->url_media) }}" alt="{{ media_alt_if_not_null($galerie->media->libelle_media)}}"></div>
                                    @endif
                                  @endforeach
                                </div>
                                <div class="lightbox-carousel--nav">
                                  @foreach($pagesite[0]->mediaContent as $galerie)
                                    @if($galerie->type_link == 'galerie')
                                    <div class="lightbox-carousel--nav__item"><img src="{{ asset($galerie->media->url_media) }}" alt="{{ media_alt_if_not_null($galerie->media->libelle_media)}}"></div>
                                    @endif
                                  @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="container container-form container-contact-form">
            <div class="row">
                <div class="col-sm-12">
                    <div class="h1 text-center">{{ $id[0]->PageSite[0]->titre_pageSite }}</div>
                    <div class="p">{!! $id[0]->PageSite[0]->description_pageSite !!}</div>
                </div>
            </div>

            <form class="row form-general" method="POST" id="contact-form">
                <div class="col-md-6 form-group">
                    <div class="h2">Votre demande</div>
                </div>
                <div class="col-md-6 form-group">
                    <select name="choix" id="choix" class="form-control">
                        <option selected disabled hidden>*Le déjeuner, comment réserver, autre</option>
                        <option value="Le déjeuner">Le déjeuner</option>
                        <option value="comment réserver">comment réserver</option>
                        <option value="autre">autre</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="*Nom">
                </div>
                <div class="col-md-6 form-group">
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
                </div>
                <div class="col-md-6 form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="*Mail">
                </div>
                <div class="col-md-6 form-group">
                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="*Téléphone">
                </div>
                <div class="col-md-12">
                    <hr class="" />
                </div>

                <div class="col-md-6 form-group">
                    <div class="h2">Votre établissement scolaire</div>
                </div>
                <div class="col-md-6 form-group">
                    <input type="text" class="form-control" id="nomEtablissement" name="nomEtablissement" placeholder="*Nom">
                </div>
                <div class="col-sm-12 form-group">
                    <input type="text" class="form-control" id="adresseEtablissement" name="adresseEtablissement" placeholder="*Adresse">
                </div>
                <div class="col-sm-12 form-group">
                    <input type="tel" class="form-control" id="telEtablissement" name="telEtablissement" placeholder="Téléphone">
                </div>
                <div class="col-sm-12 form-group">
                    <textarea class="form-control" id="message" name="message" placeholder="Informations supplémentaires" cols="30" rows="8"></textarea>
                </div>
                <div class="col-md-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="check-contact-form" name="check-contact-form" checked="">
                        <label class="custom-control-label" for="check-contact-form">J’accepte les <strong>conditions d’utilisation et la politique de confidentialité</strong>
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        </div> -->
    @endsection
