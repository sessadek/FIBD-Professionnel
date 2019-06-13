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
                        <li class="breadcrumb-item active" aria-current="page">HÉBERGEMENT</li>
                    </ol>
                </nav>
                <div class="col-sm-12">
                    <div class="title-header">
                        <h1>HÉBERGEMENT</h1>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="content-header">
                        <h2 class="p">
                            Trois structures sont à la disposition des festivaliers pour trouver un hôtel ou un hébergement à Angoulême <br />et ses environs pour la durée du Festival.
                        </h2>
                    </div>
                </div>

            </div>
        </div>

        <div class="container container-adress">
            <div class="b-adress">
                <div class="h1">OFFICE DE TOURISME DU PAYS D’ANGOULÊME</div>
                <img src="{{ asset('medias/images/Image 235.png') }}" alt="{{ media_alt_if_not_null('Image 235.png')}}">
                <div class="p">Place des Halles <br>
                    BP 20222 <br>
                    16007 ANGOULEME Cedex - France <br>
                    Tél : <a href="tel:05 45 95 16 84">05 45 95 16 84</a><br>
                    Fax : <a href="tel:05 45 95 91 76">05 45 95 91 76</a><br>
                    <a href="mailto:info@angouleme-tourisme.com">info@angouleme-tourisme.com</a>
                </div>
                <a href="http://www.angouleme-tourisme.com/" class="btn btn-primary">SITE INTERNET</a>
            </div>
            <div class="b-adress">
                <div class="h1">AGENCE DE DÉVELOPPEMENT ET DE <br />RÉSERVATION TOURISTIQUES CHARENTE TOURISME</div>
                <img src="{{ asset('medias/images/Image 236.png') }}" alt="{{ media_alt_if_not_null('Image 236.png')}}">
                <div class="p">
                    21 rue d’Iéna<br>
                    CS 82407<br>
                    16024 Angoulême<br>
                    Tél : <a href="tel:05 45 69 79 09">05 45 69 79 09</a><br>
                    Fax : <a href="tel:05 45 69 48 60">05 45 69 48 60</a><br>
                    <a href="mailto:info@lacharente.com">info@lacharente.com</a>
                </div>
                <a href="https://www.infiniment-charentes.com/" class="btn btn-primary">SITE INTERNET</a>
            </div>
            <div class="b-adress">
                <div class="h1">GÎTES DE FRANCE DE LA CHARENTE</div>
                <img src="{{ asset('medias/images/Image 237.png') }}" alt="{{ media_alt_if_not_null('Image 237.png')}}">
                <div class="p">
                    21 rue d’Iéna<br>
                    16000 Angoulême<br>
                    Tél : <a href="tel:05-45-69-48-64">05-45-69-48-64</a><br>
                    Fax : <a href="tel:05-46-50-54-46">05-46-50-54-46</a><br>
                    <a href="mailto:reservations@gitescharente.com">reservations@gitescharente.com</a>
                </div>
                <a href="https://www.gitescharente.com/" class="btn btn-primary">SITE INTERNET</a>
            </div>

        </div>
@endsection
