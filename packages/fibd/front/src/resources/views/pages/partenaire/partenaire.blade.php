@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-header pt-75">
                        <h1>{{ $choice[0]->titre_categoriePage}}</h1>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="content-header">
                        <div class="p">
                            {{ $choice[0]->description_categoriePage }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container b-actualites">
            <div class="row">
                <?php $i=0; ?>
              @foreach($choice[0]->children as $partDetail)
                <div class="col-xl-4 col-md-6">
                    <div class="b-actu">
                        <div class="h2">{{ $partDetail->titre_categoriePage}}</div>
                        <div class="b-actu__thumb">
                            <h2><img src="{{ asset(media_url_if_not_null( $partDetail->media, 'Partenaires-MD-FIBD' )) }}" alt="{{ media_alt_if_not_null($partDetail->media['libelle_media'])}}"></h2>
                            <a href="{{ url($partDetail->url_categoriePage) }}" class="btn btn-primary btn-more">EN SAVOIR PLUS</a>
                        </div>
                        <div class="p">{{ $partDetail->description_categoriePage }}</div>
                    </div>
                </div>
                <?php if($i == 4){
                  echo('</br>');
                }; $i++;?>
              @endforeach
            </div>
        </div>
        <!-- <div class="container">
            <div class="row text-form-partenaire">
                <div class="col-sm-12">
                    <h2>VOUS SOUHAITEZ DEVENIR PARTENAIRE</h2>
                    <div class="p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                </div>
            </div>
        </div> -->


        <!-- <div class="container container-form">

            <form class="row form-general mt-2" method="POST" id="partenaire-form">
                <div class="col-md-6 form-group">
                    <input type="text" class="form-control " id="nom" name="nom" placeholder="*Nom">
                </div>
                <div class="col-md-6 form-group">
                    <input type="text" class="form-control " id="prenom" name="prenom" placeholder="Prénom">
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
                        <input type="checkbox" class="custom-control-input" id="check-partenaire-form" name="check-partenaire-form" checked="">
                        <label class="custom-control-label" for="check-partenaire-form">J’accepte les <strong>conditions d’utilisation et la politique de confidentialité</strong>
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        </div> -->

@endsection
