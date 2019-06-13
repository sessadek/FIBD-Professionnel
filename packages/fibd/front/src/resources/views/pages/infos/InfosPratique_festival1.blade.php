@extends('front::layouts.default')
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
@endsection
@section('content')

        <div class="header__middle--right d-flex d-md-none">
            <a href="{{ url('infos-pratiques/billetterie')}}" class="btn btn-danger">BILLETTERIE</a>
            <div class="b-search">
                <span class="search-overlay"></span>
                <a style="display: none" href="#" class="btn-search"></a>
            </div>
        </div>
        <!-- <div class="b-bandeau">
            <div id="mapleaf" style=" height: 500px; "></div>
        </div> -->
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb" class="w-100 d-none d-md-flex">
                    <ol class="breadcrumb col-sm-12 ">
                      @foreach($breadcrumb as $bread)
                      <?php if($count == count($breadcrumb)-1) break; ?>
                        <li class="breadcrumb-item"><a href="{{ url($bread['url']) }}">{{ $bread['name'] }}</a></li>
                        <?php $count++; ?>
                      @endforeach
                        <li class="breadcrumb-item active" aria-current="page">VENIR AU FESTIVAL</li>


                    </ol>
                </nav>
                <div class="col-sm-12">
                    <div class="title-header with-share">
                        <div class="buttons-header">
                              @include('front::includes.shareLink')
                            <a href="#" class="icon-print"></a>
                        </div>
                        <h1>VENIR AU FESTIVAL</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-header">
                        <h2 class="p h-auto">
                            Le Festival d’Angoulême aura lieu du jeudi 24 au dimanche 27 janvier 2019. <br />les jeudi et vendredi de 10h à 19h / le samedi de 10h à 20h / le dimanche de 10h à 18h. <br /><br />NAVETTES GRATUITES <br />Des navettes bus sont mises à votre disposition gratuitement reliant les différents points géographiques du festival.
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container container-festival">
             <div class="b-festival">
                <div class="h1">SNCF</div>
                <div class="b-festival__body">
                    <div class="b-festival__text">
                        <div class="b-festival__title">
                            <div class="h2">Venir à Angoulême avec la SNCF</div>
                            <img src="{{ asset('medias/images/logo_sncf.png') }}">
                        </div>
                        <div class="p">
                            <strong>ANGOULÊME FACILE D'ACCÈS AVEC NOTRE PARTENAIRE SNCF</strong><br>
                            Vente et informations dans les gares et boutiques SNCF, par téléphone au 3635, auprès des agences de voyage agréées SNCF.
                            </div>
                        <div class="p">
                            <strong>Avec TGV INOUI</strong><br>
                            Venez passer une journée dans la capitale de la bande dessinée!<br>
                            Paris – Angoulême : 2 h* <br>
                            Poitiers – Angoulême : 40mn* <br>
                            Bordeaux – Angoulême : 35mn* <br>
                            Saint-Pierre-des-Corps (Tours) – Angoulême : 1 h 20* <br>
                            <span style="font-size:12px">*temps de trajet moyen</span>

                        </div>
                        <div class="p">
                            Retrouvez l'actualité <a href="https://www.sncf.com/fr/groupe/prix-sncf-polar/competition-2019">POLAR SNCF</a><br>
                            Sur les réseaux sociaux : #PolarSNCF <br>
                            Twitter : @SNCF
                        </div>
                    </div>


                </div>
               <!--  <div class="b-festival__body">
                    <div class="b-festival__text">
                        <div class="b-festival__title">
                            <div class="h2">Profitez de l’offre Fest’TER avec le Festival</div>
                            <img src="https://via.placeholder.com/164x45">
                            <img src="https://via.placeholder.com/122x52">
                        </div>
                        <div class="p">Lorem ipsum</div>
                        <div class="p">Lorem ipsum</div>
                        <div class="text-right">
                            <a href="#" class="btn btn-primary">JE RÉSERVE MON BILLET</a>
                        </div>
                    </div>
                </div>

                <div class="b-festival__body">
                    <div class="b-festival__text">
                        <div class="b-festival__title">
                            <div class="h2">Une fois sur place les navettes gratuites sont le plus court chemin vers le festival</div>

                        </div>
                        <div class="b-festival__body--row">
                            <div class="b-festival__body--left">
                                <div class="fz-20">Les arrêts des navettes</div>
                                <ul class="circle">
                                    <li>Lorem ipsum dolor sit amet, consectetur</li>
                                    <li>Adipisicing elit, sed do eiusmod tempor</li>
                                    <li>Incididunt ut labore et dolore magna aliqua.</li>
                                    <li>Ut enim ad minim veniam, quis nostrud</li>
                                    <li>Exercitation ullamco laboris nisi ut aliquip</li>
                                </ul>
                            </div>
                            <div class="b-festival__body--right">
                                <ul class="fz-20 circle">
                                    <li>Les navettes passent toutes les xx minutes</li>
                                    <li>de 8h à 20 h le jeudi</li>
                                    <li>de 8h à 20 h le vendredi</li>
                                    <li>de 8h à 20 h le samedi</li>
                                    <li>de 8h à 20 h le dimanche</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="b-festival">
                <div class="h1">VOITURE / MOTO</div>
                <div class="b-festival__body">
                    <div class="b-festival__text">
                        <div class="b-festival__title">
                            <div class="h2">Bénéficiez d’une place de parking GARANTIE avec la RESERVATION OFFERTE !</div>
                        </div>
                        <div class="b-festival__text--image">
                            <div class="b-festival--image">
                                <img src="{{ asset('medias/images/logo-effia.jpg') }}">
                            </div>
                            <div class="b-festival--content">
                                <div class="p">
                                <strong>Bénéficiez d'une place de parking GARANTIE avec la RESERVATION OFFERTE !</strong>
                                </div>
                                <div class="p">
                                Offre valable du 24 au 27 janvier en renseignant le code <strong>BDANGOU19</strong> pour une réservation (<strong>une entrée/une sortie</strong>) sur les parkings EFFIA en Gare d’<a href="https://www.effia.com/parking/parking-gare-dangouleme-effia" target="_blank">Angoulême</a>, <a href="https://www.effia.com/parking/parking-gare-de-poitiers-effia" target="_blank">Poitiers</a>, <a href="https://www.effia.com/parking/parking-paris-gare-montparnasse-pasteur-longue-duree-effia" target="_blank">Paris Montparnasse</a>, <a href="https://www.effia.com/parking/parking-gare-de-massy-tgv-effia" target="_blank">Massy TGV</a> …
                                </div>
                                <div class="p">
                                Sans réservation, <u>en fonction des places disponibles</u>, <strong>Offre spéciale</strong> les 26 et 27 janvier et sur présentation du billet d’entrée du Festival directement à l’accueil du parking : <strong>5,50€ /10h de stationnement</strong> (au lieu de 10.20€) et <strong>18,00€ /48h consécutives</strong> (au lieu de 26,30€). Plus de renseignements au 05 45 37 60 91
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="https://www.effia.com" class="btn btn-primary ml-sm--10">JE RÉSERVE MA PLACE DE PARKING</a>
                        </div>
                    </div>
                </div>

               <!--  <div class="b-festival__body">
                    <div class="b-festival__text">
                        <div class="b-festival__title">
                            <div class="h2">Les parkings pour garer son véhicule</div>
                        </div>
                        <div class="b-card__labels">
                            <div class="b-card__label b-card__label--header">
                                <span>Parking</span>
                                <span>Tarifs</span>
                                <span>Adresse</span>
                            </div>
                            <div class="b-card__label">
                                <span>Lorem ipsum dolor sit amet, consectetur</span>
                                <span>xx € / heure</span>
                                <span>Lorem ipsum dolor sit amet, consectetur</span>
                            </div>
                            <div class="b-card__label">
                                <span>Lorem ipsum dolor sit amet, consectetur</span>
                                <span>xx € / heure</span>
                                <span>Lorem ipsum dolor sit amet, consectetur</span>
                            </div>
                            <div class="b-card__label">
                                <span>Lorem ipsum dolor sit amet, consectetur</span>
                                <span>xx € / heure</span>
                                <span>Lorem ipsum dolor sit amet, consectetur</span>
                            </div>
                            <div class="b-card__label">
                                <span>Lorem ipsum dolor sit amet, consectetur</span>
                                <span>xx € / heure</span>
                                <span>Lorem ipsum dolor sit amet, consectetur</span>
                            </div>
                            <div class="b-card__label">
                                <span>Lorem ipsum dolor sit amet, consectetur</span>
                                <span>xx € / heure</span>
                                <span>Lorem ipsum dolor sit amet, consectetur</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="b-festival__body">
                    <div class="b-festival__text">
                        <div class="b-festival__title">
                            <div class="h2">Une fois sur place les navettes gratuites sont le plus court chemin vers le festival</div>

                        </div>
                        <div class="b-festival__body--row">
                            <div class="b-festival__body--left">
                                <div class="fz-20">Les arrêts des navettes</div>
                                <ul class="circle">
                                    <li>Lorem ipsum dolor sit amet, consectetur</li>
                                    <li>Adipisicing elit, sed do eiusmod tempor</li>
                                    <li>Incididunt ut labore et dolore magna aliqua.</li>
                                    <li>Ut enim ad minim veniam, quis nostrud</li>
                                    <li>Exercitation ullamco laboris nisi ut aliquip</li>
                                </ul>
                            </div>
                            <div class="b-festival__body--right">
                                <ul class="fz-20 circle">
                                    <li>Les navettes passent toutes les xx minutes</li>
                                    <li>de 8h à 20 h le jeudi</li>
                                    <li>de 8h à 20 h le vendredi</li>
                                    <li>de 8h à 20 h le samedi</li>
                                    <li>de 8h à 20 h le dimanche</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>




            <div class="b-festival">
                <div class="h1">COVOITURAGE</div>
                <div class="b-festival__body">
                    <div class="b-festival__text">
                        <div class="b-festival__title">
                            <div class="h2">Venir à Angoulême en covoiturage</div>
                            <!-- <img src="https://via.placeholder.com/71x50"> -->
                        </div>
                        <div class="p">Le bon plan pour les petits budgets, pensez au covoiturage !<br>
                            Toulouse – Angoulême : 3 H 20<br>
                            Nantes – Angoulême : 3 H<br>
                            Tours – Angoulême : 2 H 20<br>
                            La Rochelle – Angoulême : 2 H<br>
                            Poitiers – Angoulême : 1 H 20<br>
                            Limoges – Angoulême : 1 H 30<br>
                            Bordeaux – Angoulême : 1 H 30.</div>
                        <!-- <div class="text-right">
                            <a href="#" class="btn btn-primary">JE RÉSERVE UN COVOITURAGE</a>
                        </div> -->
                    </div>
                </div>
               <!--  <div class="b-festival__body">
                    <div class="b-festival__text">
                        <div class="b-festival__title">
                            <div class="h2">Une fois sur place les navettes gratuites sont le plus court chemin vers le festival</div>
                        </div>
                        <div class="b-festival__body--row">
                            <div class="b-festival__body--left">
                                <div class="fz-20">Les arrêts des navettes</div>
                                <ul class="circle">
                                    <li>Lorem ipsum dolor sit amet, consectetur</li>
                                    <li>Adipisicing elit, sed do eiusmod tempor</li>
                                    <li>Incididunt ut labore et dolore magna aliqua.</li>
                                    <li>Ut enim ad minim veniam, quis nostrud</li>
                                    <li>Exercitation ullamco laboris nisi ut aliquip</li>
                                </ul>
                            </div>
                            <div class="b-festival__body--right">
                                <ul class="fz-20 circle">
                                    <li>Les navettes passent toutes les xx minutes</li>
                                    <li>de 8h à 20 h le jeudi</li>
                                    <li>de 8h à 20 h le vendredi</li>
                                    <li>de 8h à 20 h le samedi</li>
                                    <li>de 8h à 20 h le dimanche</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

        </div>
  @endsection

@section('js')
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>
    <script src="{{ asset('assets/scripts/exemple.js') }}"></script>
@endsection
