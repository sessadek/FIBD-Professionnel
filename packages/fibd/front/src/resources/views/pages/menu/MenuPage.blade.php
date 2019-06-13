@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-header">
                        <h1>{{ $choice[0]->titre_categoriePage }}</h1>
                    </div>
                      <!-- @if($choice[0]->url_categoriePage == '/programmation-fibd')
                    <form action="" id="" class="filter-exposition" id="form-filter">
                        <label for="">FILTRER PAR</label>
                        <select name="lieux" id="lieux" class="form-filter">
                          @foreach($lieux as $lieu)
                            <option value="{{$lieu->code_lieu}}">{{$lieu->libelle_lieu}}</option>
                          @endforeach
                        </select>
                        <select name="public" id="public" class="form-filter">
                          @foreach($public as $pub)
                            <option value="{{ $pub->short_libelle_public }}">{{ $pub->libelle_public }}</option>
                          @endforeach
                        </select>
                    </form>
                    @endif -->

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
                </div>
            </div>
        </div>
        <div class="container b-actualites">
            <div class="row">
              @foreach($choiceNew as $detail)

                <div class="col-xl-4 col-md-6">
                  @if($detail->url_categoriePage != '' || $detail->url_add_bloc != '')
                  @if(isset($detail->url_add_block))
                    <a href="{{ url($detail->url_add_block) }}"><div class="b-actu">
                  @else
                    <a href="{{ url($detail->url_categoriePage) }}"><div class="b-actu">
                  @endif
                  @else
                  <a href="{{ url($detail->link_categoriePage) }}" target="_blank"><div class="b-actu">
                  @endif
                        <div class="h2">{{ $detail->titre_categoriePage }}</div>
                        <div class="b-actu__thumb">
                          <h2 style="background-image: url({{asset(media_url_if_not_null( $detail->media, 'Articles-ADMT-BD-FIBD', 'crops'))}}); background-repeat: no-repeat; background-size: cover; background-position: center; min-height: 200px; height:16vw;">
                            <img style="opacity: 0;" src="{{asset(media_url_if_not_null( $detail->media, '0'))}}" alt="{{ media_alt_if_not_null($detail->media['libelle_media'])}}">
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
        @if($choice[0]->url_categoriePage == '/programmation-fibd')
        <!-- <div class="body-thumb container clearfix">
            <h2 class="h1">EXPOSITIONS ITINÉRANTES</h2>
            <div class="body-thumb__image">
                <img src="https://via.placeholder.com/492x328" alt="">
            </div>

            <div class="p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Donec elementum ligula eu sapien <br />consequat eleifend. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Donec elementum ligula eu sapien consequat eleifend.</div>
            <div class="p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Donec elementum ligula eu sapien consequat eleifend.</div>
            <div class="p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint</div>
        </div> -->

        <!-- <div class="container container-form">
            <form class="row form-general" method="POST" id="exposition-form">
                <div class="col-md-4 form-group">
                    <input type="text" class="form-control " id="nom" name="nom" placeholder="*Nom">
                </div>
                <div class="col-md-4 form-group">
                    <input type="text" class="form-control " id="prenom" name="prenom" placeholder="Prénom">
                </div>
                <div class="col-md-4 form-group">
                    <input type="text" class="form-control " id="entreprise" name="entreprise" placeholder="Entreprise ou organisme">
                </div>
                <div class="col-md-6 form-group">
                    <input type="email" class="form-control " id="email" name="email" placeholder="*Mail">
                </div>
                <div class="col-md-6 form-group">
                    <input type="tel" class="form-control " id="tel" name="tel" placeholder="*Téléphone">
                </div>
                <div class="col-sm-12 form-group">
                    <textarea class="form-control " id="message" name="message" placeholder="Informations supplémentaires" cols="30" rows="8"></textarea>
                </div>
                <div class="col-md-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="check-exposition-form" name="check-exposition-form" checked="">
                        <label class="custom-control-label" for="check-exposition-form">J’accepte les <strong>conditions d’utilisation et la politique de confidentialité</strong>
                        </label>
                    </div>
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        </div> -->
        @endif

          @if(count($partenaire) >0)
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
