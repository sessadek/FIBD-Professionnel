@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
		<a name="pass-eo"></a>
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb" class="w-100 d-none d-md-flex">
                    <ol class="breadcrumb col-sm-12 ">
                        <li class="breadcrumb-item"><a href="{{ url()->previous() }}">INFOS PRATIQUES</a></li>
                        <li class="breadcrumb-item active" aria-current="page">TARIFS ET BILLETTERIE</li>
                    </ol>
                </nav>
                <div class="col-sm-12">
                    <div class="title-header with-share underline-none">
                        <div class="buttons-header">
                            @include('front::includes.shareLink')
                            <a href="#" class="icon-print"></a>
                        </div>
                        <div class="h1">TARIFS ET BILLETTERIE</div>
                    </div>
                </div>
            </div>
        </div>
            <div class="container text-center" style="margin-bottom: 200px">
        Ouverture de la billetterie de la 47ème édition du Festival en septembre 2019. <br><br>
        Rendez-vous l'année prochaine à Angoulême.

         <!--28-01-2019 caroline - fin du Festival 2019
            <div class="tags">
                <span class="tag"><a style="color: black;"href="#pass-eo">PASS EARLY OPENING</a></span>
                <span class="tag"><a style="color: black;"href="#tarifs-uniques">TARIFS UNIQUES</a></span>
                <span class="tag"><a style="color: black;"href="#tarifs-spectacles">TARIFS SPECTACLES</a></span>
                <span class="tag"><a style="color: black;"href="#tarifs-scolaires">TARIFS GROUPES SCOLAIRES</a></span>
                <span class="tag"><a style="color: black;"href="#tarifs-ce">TARIFS COMITES D’ENTREPRISES</a></span>
                <span class="tag"><a style="color: black;"href="#tarifs-reduits">TARIFS REDUITS</a></span>
            </div>

            <div class="p">Accès à tous les lieux du Festival ouverts au public<br>
                <strong>les jeudi et vendredi de 10h à 19h / le samedi de 10h à 20h / le dimanche de 10h à 18h.</strong><br>(sauf pour les Pass Early Opening et Pass Festival 5 jours Premium)
            </div>
            <hr>

            <div class="h1">PASS EARLY OPENING</div>
            <div class="p"><strong>Samedi 26 janvier - tarif unique : 25 €</strong></div>
            <div class="p"><strong>Devenez un visiteur premium</strong> en achetant le pass early opening et visitez l’exposition de votre choix<br>
                <strong>avant l’ouverture au public</strong> (ouverture dès 9h dans la limite des places disponibles).</div>
            <div class="p"><strong>Après 10h, ce pass donne accès à l’ensemble des expositions et lieux d’animations sur le Festival.</strong></div>

			<a name="tarifs-uniques"></a>
            <div class="row row-eq-height b-cards">
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="b-card">
                        <div class="h2">PASS EARLY OPENING</div>
                        <div class="h3">Musée d’Angoulême</div>
                        <div class="b-card__content">
                            <div class="b-card__left">
                                <div class="p">Expos <strong>Richard Corben - Donner corps à l'imaginaire</strong> et <strong>Dessiner l'enfance - Rétrospective Taiyo Matsumoto</strong></div>
                            </div>
                            <div class="b-card__right">
                                <strong>25 €</strong>
                            </div>
                        </div>
                        <a href="https://bdangouleme.fnacspectacles.com/place-spectacle/manifestation/Salon-Foire-1J-FESTIVAL-INTERNATIONAL-DE-LA-BD-BD1.htm" target="_blank" class="btn btn-primary mx-auto">RÉSERVER</a>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="b-card">
                        <div class="h2">PASS EARLY OPENING</div>
                        <div class="h3">L’alpha-médiathèque</div>
                        <div class="b-card__content">
                            <div class="b-card__left">
                                <div class="p">Expo <strong>Batman 80 ans : un genre américain démasqué</strong>, Expo <strong>La Saga de Jérémie Moreau</strong></div>
                            </div>
                            <div class="b-card__right">
                                <strong>25 €</strong>
                            </div>
                        </div>
                        <button class="btn btn-default mx-auto">INDISPONIBLE</button>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="b-card">
                        <div class="h2">PASS EARLY OPENING</div>
                        <div class="h3">Espace Franquin</div>
                        <div class="b-card__content">
                            <div class="b-card__left">
                                <div class="p">Expo <strong>Milo Manara l’itinéraire d’un maestro de Hugo Pratt à Caravage</strong>, Expo <strong>Tsutomu Nihei</strong></div>
                            </div>
                            <div class="b-card__right">
                                <strong>25 €</strong>
                            </div>
                        </div>
                        <a href="https://bdangouleme.fnacspectacles.com/place-spectacle/manifestation/Salon-Foire-1J-FESTIVAL-INTERNATIONAL-DE-LA-BD-BD1.htm" target="_blank" class="btn btn-primary mx-auto">RÉSERVER</a>
                    </div>
                </div>
            </div>

			<a name="tarifs-spectacles"></a>
            <div class="h1" >TARIFS UNIQUES</div>
            <div class="p"><strong>A partir du lundi 21 janvier 2019 (site internet et sur place)</strong></div>
            <div class="p">Achat sur place au Quartier Jeunesse, Place Marengo et Alpha-médiathèque (nouveaux emplacements)</div>
            <div class="row row-eq-height b-cards">
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="b-card">
                        <div class="h2">PASS FESTIVAL 1 JOUR</div>
                        <div class="p days">Jeudi / Vendredi / Dimanche</div>
                        <div class="b-card__label">
                            <span>+ de 10 ans</span>
                            <strong>19 €</strong>
                        </div>

                        <div class="b-card__label">
                            <span>- de 10 ans</span>
                            <strong>GRATUIT</strong>
                        </div>
                            <a href="https://bdangouleme.fnacspectacles.com/place-spectacle/manifestation/Salon-Foire-1J-FESTIVAL-INTERNATIONAL-DE-LA-BD-BD1.htm" target="_blank" class="btn btn-primary mx-auto">RESERVER</a>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="b-card">
                        <div class="h2">PASS FESTIVAL 1 JOUR</div>
                        <div class="p days">Samedi</div>
                        <div class="b-card__label">
                            <span>+ de 10 ans</span>
                            <strong>25 €</strong>
                        </div>

                        <div class="b-card__label">
                            <span>- de 10 ans</span>
                            <strong>GRATUIT</strong>
                        </div>
                            <a href="https://bdangouleme.fnacspectacles.com/place-spectacle/manifestation/Salon-Foire-1J-FESTIVAL-INTERNATIONAL-DE-LA-BD-BD1.htm" target="_blank" class="btn btn-primary mx-auto">RESERVER</a>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="b-card">
                        <div class="h2">PASS FESTIVAL 4 JOURS</div>
                        <div class="p days">Jeudi / Vendredi / Samedi / Dimanche</div>
                        <div class="b-card__label">
                            <span>+ de 10 ans</span>
                            <strong>45 €</strong>
                        </div>

                        <div class="b-card__label">
                            <span>- de 10 ans</span>
                            <strong>GRATUIT</strong>
                        </div>
                            <a href="https://bdangouleme.fnacspectacles.com/place-spectacle/manifestation/Salon-Foire-4J-FESTIVAL-INTERNATIONAL-DE-LA-BD-BD4.htm" target="_blank" class="btn btn-primary mx-auto">RESERVER</a>
                    </div>
                </div>
            </div>


			<a name="tarifs-scolaires"></a>
            <div class="h1">TARIFS SPECTACLES</div>
            <div class="p">Achat sur place au Théâtre d’Angoulême ou par téléphone au <a href="tel:05 45 38 61 62/63">05 45 38 61 62/63</a> <br>ou sur <a href="https://www.theatre-angouleme.org">www.theatre-angouleme.org</a></div>
            <div class="row row-eq-height b-cards">
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="b-card">
                        <div class="b-card__header">
                            <div class="h2">Concert de dessins®<br>Monstres d’Asie</div>
                            <div class="p days">Jeudi 24 janvier 14h<br>Vendredi 25 janvier 14h (complet)<br>Samedi 26 janvier 14h</div>
                        </div>

                        <div class="b-card__labels">
                            <div class="b-card__label">
                                <span>Offre spéciale scolaire <br><span style="font-size:14px">(jeudi et vendredi)</span></span>
                                <strong>6 €</strong>
                            </div>

                            <div class="b-card__label justify-content-center">
                                <strong>14 €</strong>
                            </div>
                        </div>

                        <a href="#" class="btn btn-primary mx-auto">RESERVER</a>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="b-card">
                        <div class="b-card__header">
                            <div class="h2">Concert dessiné<br></div>
                            <div class="p days">Vendredi 25 janvier à 21h</div>
                        </div>

                        <div class="b-card__labels">
                            <div class="b-card__label justify-content-center">
                                <strong>27 €</strong>
                            </div>
                        </div>

			                     <a href="#" class="btn btn-primary mx-auto">RESERVER</a>
						</div>
                </div>
            </div>


			<a name="tarifs-ce"></a>
            <div class="h1">TARIFS GROUPES SCOLAIRES</div>
            <div class="p">Réservations au <strong>0820 206 828 </strong>(0,09€ TTC/MIN)<br>
            Possibilité de visites accompagnées - Groupe à partir de 20 personnes</div>
            <div class="row row-eq-height b-cards mt-5">
                <div class="col-md-8 col-sm-12">
                    <div class="b-card">
                        <div class="b-card__labels">
                            <div class="b-card__label three-element">
                                <strong style="float:left !important;text-align: left;">PASS FESTIVAL</strong>
                                <span>- de 10 ans</span>
                                <strong>GRATUIT</strong>
                            </div>
                            <div class="b-card__label three-element">
                                <strong style="float:left !important;text-align: left;">PASS SCOLAIRE ENFANT</strong>
                                <span>10 - 17 ans</span>
                                <strong>6 €</strong>
                            </div>
                            <div class="b-card__label three-element">
                                <strong style="float:left !important;text-align: left;">PASS SCOLAIRE ADULTE</strong>
                                <span>+ de 18 ans</span>
                                <strong>12 €</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h1">TARIFS COMITÉS D’ENTREPRISES</div>
            <div class="p">Réservation au <strong>0892 707 905</strong> (0,40 TTC/MIN)<br>
            Tarifs valables uniquement les jeudi, vendredi et dimanche. <strong>Achat uniquement en prévente</strong> (jusqu’au 20 janvier 2019 minuit)</div>
                <div class="row row-eq-height b-cards mt-5">
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="b-card">
                        <div class="h2">PASS FESTIVAL 1 JOUR</div>
                        <div class="p days">Jeudi / Vendredi / Dimanche</div>
                        <div class="b-card__label">
                            <span>Adulte</span>
                            <strong>13 €</strong>
                        </div>
                        <div class="b-card__label">
                            <span>10 - 17 ans</span>
                            <strong>6 €</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="b-card">
                        <div class="h2">PASS FESTIVAL 1 JOUR</div>
                            <div class="p days"><strong>avec visite accompagnée</strong><br>Jeudi / Vendredi / Dimanche</div>

                            <div class="b-card__label">
                            <span>Adulte</span>
                            <strong>27 €</strong>
                        </div>
                        <div class="b-card__label">
                            <span>10 - 17 ans</span>
                            <strong>20 €</strong>
                        </div>
                    </div>
                </div>
                    <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="b-card">
                        <div class="h2">PASS FESTIVAL 4 JOURS</div>
                            <div class="p days">Jeudi / Vendredi / Samedi/ Dimanche</div>

                            <div class="b-card__label">
                            <span>Adulte</span>
                            <strong>30 €</strong>
                        </div>
                        <div class="b-card__label">
                            <span>10 - 17 ans</span>
                            <strong>20 €</strong>
                        </div>
                    </div>
                </div>
            </div>


            <div class="h1" id="tarifs-reduits">TARIFS REDUITS</div>
            <div class="p">Les tarifs réduits sont réservés aux personnes à mobilité réduite, demandeurs d’emplois <br> ou bénéficiaires du RSA, AAH et ASS les jeudi, vendredi et dimanche du Festival <br> (pas de réduction le samedi), <strong>achat uniquement en prévente</strong> (jusqu’au 20 janvier 2019 minuit).<br>Un justificatif sera demandé au moment du retrait du Pass.</div>
            <div class="row row-eq-height b-cards mt-5">
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="b-card">
                        <div class="h2">PASS FESTIVAL 1 JOUR</div>
                        <div class="p days">Jeudi / Vendredi / Dimanche</div>
                        <div class="b-card__labels">
                            <div class="b-card__label justify-content-center">
                                <strong>11 €</strong>
                            </div>
                        </div>

                        <a href="https://bdangouleme.fnacspectacles.com/place-spectacle/manifestation/Salon-Foire-1J-FESTIVAL-INTERNATIONAL-DE-LA-BD-BD1.htm" target="_blank" class="btn btn-primary mx-auto">RÉSERVER</a>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="b-card">
                        <div class="h2">PASS FESTIVAL 4 JOURS</div>
                        <div class="p days">Jeudi / Vendredi / Samedi / Dimanche</div>
                        <div class="b-card__labels">
                            <div class="b-card__label justify-content-center">
                                <strong>25 €</strong>
                            </div>
                        </div>

                        <a href="https://bdangouleme.fnacspectacles.com/place-spectacle/manifestation/Salon-Foire-4J-FESTIVAL-INTERNATIONAL-DE-LA-BD-BD4.htm" target="_blank" class="btn btn-primary mx-auto">RÉSERVER</a>
                    </div>
                </div>
            </div>-->
        </div>
@endsection
