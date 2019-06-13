@if(!isset($exception) || $exception->getStatusCode() != 404)
    <footer class="{{ (Route::currentRouteName() == 'home') ? 'footer-home' : '' }}">
        <div class="footer__top">
            <div class="b-newsletter">
                <div class="h2">NEWSLETTER</div>
                <div class="p">Toute l’actualité du Festival</div>
                <form  action="" id="form-newsletter" method="POST">
                    <div class="form-group">
                        <input type="email" class="form-control " id="email" name="email" placeholder="Entrez votre adresse mail">
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="check-newsletter-form" name="check-newsletter-form">
                        <label class="custom-control-label" for="check-newsletter-form">J’accepte les <strong><a href="{{url('/politique-confidentialite')}}">conditions d’utilisation et la politique de confidentialité</a></strong>
                        </label>
                    </div>
                    <button class="btn btn-primary validate" type="submit">S’ABONNER</button>
                </form>
                <div class="validation_message" style="font-size: 10px;"></div>
            </div>

            <div class="b-download-apps">
                <div class="b-download-apps--container">
                    <!-- <div class="h2">TÉLÉCHARGER L’APPLICATION</div>
                    <div class="b-download-apps--links">
                        <a href="#" target="_blank"><img src="{{ asset('images/AppStore_Fr.svg') }}" alt="" width="160px"></a>
                        <span><img src="medias/images/logoFIBD_46e_noir.svg" style="width: 234px;"alt=""></span>
                        <a href="#" target="_blank"><img src="{{ asset('images/AndroidStore_Fr.svg') }}" alt="" width="160px"></a>
                    </div> -->
                </div>
            </div>
            <div class="b-social__links">
                <div class="h2">SUIVRE LE FESTIVAL SUR LES RÉSEAUX</div>
                <div class="b-social__links--container">
                    <a href="https://www.facebook.com/festivalBDangouleme/" class="link-facebook" target="_blank"></a>
                    <a href="https://twitter.com/bdangouleme?lang=fr" class="link-twitter" target="_blank"></a>
                    <a href="https://www.instagram.com/bdangouleme/" class="link-instagram" target="_blank"></a>
                    <a href="https://www.youtube.com/user/bdangouleme" class="link-youtube" target="_blank"></a>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="footer__bottom--container">
                <nav>
                    <ul>
                    @foreach($menuFooter as $footer)
                        @if($footer->titre_categoriePage !== 'Mentions légales')
                        <li><a href="{{ url($footer->url_categoriePage) }}">{{ $footer->titre_categoriePage }}</a></li>
                        @endif
                    @endforeach
                    </ul>
                </nav>
                <div class="footer-copyright">
                    <div class="p">TOUS DROITS RÉSERVÉS © 9E ART+, ORGANISATEUR DU FESTIVAL DE LA BANDE DESSINÉE D'ANGOULÊME 9EART+
                    @foreach($menuFooter as $footer)
                        @if($footer->titre_categoriePage == 'Mentions légales')
                    <a href="{{ url($footer->url_categoriePage) }}">{{ $footer->titre_categoriePage }}</a>
                    @endif
                    @endforeach
                    / RÉALISATION SITE INTERNET : <a href="https://www.idealcoms.net/" target="_blank">AGENCE WEB IDEALCOMS</a></div>
                </div>
            </div>

        </div>
    </footer>

@endif
