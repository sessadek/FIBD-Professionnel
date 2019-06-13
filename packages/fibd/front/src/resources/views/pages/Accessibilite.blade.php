@extends('front::layouts.default')
@section('content')
        <div class="header__middle--right d-flex d-md-none">
            <a href="#" class="btn btn-danger">BILLETTERIE</a>
            <div class="b-search">
                <span class="search-overlay"></span>
                <a style="display: none" href="#" class="btn-search"></a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb" class="w-100 d-none d-md-flex">
                    <ol class="breadcrumb col-sm-12 ">
                        <li class="breadcrumb-item"><a href="#">INFOS PRATIQUES</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ACCESSIBILITÉ</li>
                    </ol>
                </nav>
                <div class="col-sm-12">
                    <div class="title-header pt35-sm">
                        <h1>ACCESSIBILITÉ P.M.R.</h1>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="content-header">
                        <div class="p">
                            Groupes ou particuliers, des solutions sont proposées : parking avec navettes relais, places de parking réservées.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container b-actualites">
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="b-actu">
                        <div class="h2">PRÉPARATION <br />DE VOTRE SÉJOUR</div>
                        <div class="b-actu__thumb">
                            <h2><img src="https://via.placeholder.com/600x400" alt=""></h2>
                            <a href="#" class="btn btn-primary btn-more">EN SAVOIR PLUS</a>
                        </div>

                        <div class="p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut</div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="b-actu">
                        <div class="h2">SITES DU FESTIVAL / PLANS</div>
                        <div class="b-actu__thumb">
                            <h2><img src="https://via.placeholder.com/600x400" alt=""></h2>

                            <a href="#" class="btn btn-primary btn-more">EN SAVOIR PLUS</a>
                        </div>

                        <div class="p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut</div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="b-actu">
                        <div class="h2">CIRCULATION STATIONNEMENT</div>
                        <div class="b-actu__thumb">
                            <h2><img src="https://via.placeholder.com/600x400" alt=""></h2>
                            <a href="#" class="btn btn-primary btn-more">EN SAVOIR PLUS</a>
                        </div>

                        <div class="p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container container-accessibilite">
            <div class="row">
                <div class="col-md-8">
                    <div class="h2">SOURDS ET MALENTENDANTS</div>
                    <div class="p">La grande majorité de la programmation du Festival est accessible au public sourd et malentendant. Cependant, les Projections ne sont pas sous-titrées, et les Rencontres et Conférences ne font pas l’objet d’une interprétation en langue des signes française.</div>
                    <div class="h2">UN TARIF SPÉCIFIQUE</div>
                    <div class="p">Tarif réduit handicapé : pass 1 jour à 11 €, sauf le samedi, sur présentation d’un justificatif ; Personnes titulaires d’une carte d’invalidité portant la mention « Besoin d’accompagnement » (tierce personne) : gratuité pour l’accompagnateur.</div>
                </div>
                <div class="col-md-4">
                    <div class="h2">CONTACTS UTILES</div>
                    <div class="box-shadow">
                        <div class="p">• Lignes de bus STGA <span>(Société de Transport du Grand Angoulême)</span></div>
                        <div class="p">• APF 16 : 05 45 92 96 64</div>
                        <div class="p">• Standard FIBD : 05 45 97 86 50</div>
                    </div>
                </div>
            </div>
        </div>
@endsection
