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
                        <li class="breadcrumb-item active" aria-current="page">CONTACTS</li>

                    </ol>
                </nav>
                <div class="col-sm-12">
                    <div class="title-header underline-none">
                        <h1>CONTACT</h1>
                    </div>
                </div>
            </div>
        </div>


        <div class="container container-form">

            <form class="row form-general mt-0" action="{{ url('/contact') }}" method="POST" id="pratique-contact-form">
                <div class="col-sm-12 form-group">
                    <select name="serviceContact" id="choix" class="form-control">
                        <option selected="" disabled="" hidden="">* Quel service souhaitez-vous joindre</option>
                        @foreach($contacts as $contact)
                        <option value="{{ $contact->id_serviceMessagerie}}">{{ $contact->libelle_serviceMessagerie}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12 h2">DEMANDE DE CONTACT</div>
                <div class="col-md-6 form-group">
                    <input type="text" class="form-control " id="nom" name="nomContact" placeholder="*Nom">
                </div>
                <div class="col-md-6 form-group">
                    <input type="text" class="form-control " id="prenom" name="prenomContact" placeholder="Prénom">
                </div>
                <div class="col-md-6 form-group">
                    <input type="email" class="form-control " id="email" name="EmailContact" placeholder="*Mail">
                </div>
                <div class="col-md-6 form-group">
                    <input type="tel" class="form-control " id="tel" name="TelephoneContact" placeholder="*Téléphone">
                </div>
                <div class="col-sm-12 form-group">
                    <textarea class="form-control " id="message" name="MessageContact" placeholder="Informations supplémentaires" cols="30" rows="8"></textarea>
                </div>
                <div class="col-sm-12 form-group">
                    <input class="form-control " id="provenance" name="ProvenanceContact" value="{{ url()->current() }}" style="visibility: hidden;"></input>
                </div>
                <div class="col-md-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="check-pratique-contact-form" name="check-pratique-contact-form" checked="">
                        <label class="custom-control-label" for="check-pratique-contact-form">J’accepte les <strong>conditions d’utilisation et la politique de confidentialité</strong>
                        </label>
                    </div>
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        </div>
    @endsection
