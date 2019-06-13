@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
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
                        <!-- <a href="{{ url()->previous() }}" class="btn btn-retour d-none d-md-flex">RETOUR ACCESSIBILITÉ</a> -->
                        <h1>PRÉPARATION DE VOTRE SÉJOUR</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row text-sejour pt-45 pt-sm-25">
                <div class="col-sm-12">
                    <h2>PRÉPARATION DE VOTRE VISITE EN AMONT</h2>
                    <div class="p">Afin de vous accueillir au mieux et de vous informer des différentes dispositions mises en place sur le festival, merci de remplir ce formulaire.</div>
                </div>

            </div>
        </div>
        <div class="container container-form">

            <form class="row form-general mt-0 pb-70" method="POST" id="pratique-sejour-form">
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
                        <input type="checkbox" class="custom-control-input" id="check-pratique-sejour-form" name="check-pratique-sejour-form" checked="">
                        <label class="custom-control-label" for="check-pratique-sejour-form">J’accepte les <strong>conditions d’utilisation et la politique de confidentialité</strong>
                        </label>
                    </div>
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </form>

        </div>
        <div class="container">
            <div class="row text-sejour mb-25">
                <div class="col-sm-12">
                    <h2>LES ORGANISMES QUI VOUS AIDENT</h2>
                    <div class="p">Pour organiser votre séjour, nous vous invitons à consulter la page dédiée du site Charente Tourisme</div>
                    <a href="#" class="btn btn-primary">CLIQUEZ ICI</a>
                    <div class="mt-30">
                        <div class="p">Vous pouvez également contacter l’Office de Tourisme d’Angoulême</div>
                        <div class="d-flex">
                            <a href="tel:05 45 95 16 84" class="btn btn-primary btn-tel">05 45 95 16 84</a>
                            <a href="#" class="btn btn-primary">CLIQUEZ ICI</a>
                        </div>
                    </div>


                </div>

            </div>
        </div>
@endsection
