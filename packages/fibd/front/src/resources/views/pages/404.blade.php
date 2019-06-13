@extends('front::layouts.default')
@section('content')
<div class="header__middle--right d-flex d-md-none">
    <a href="#" class="btn btn-danger">BILLETTERIE</a>
    <div class="b-search">
        <span class="search-overlay"></span>
        <a style="display: none" href="#" class="btn-search"></a>
    </div>
</div>
<div class="container container-404">
    <div class="d-tabel-cell">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-header">
                    <div class="h1">OUPS</div>
                </div>
                <div class="content-header">
                    <div class="p">La page que vous recherchez semble introuvable.</div>
                </div>
            </div>
        </div>
        <div class="b-404">
            <div class="b-404__thumb">
                <img src="{{asset('medias/images/fibd-fauve-effraye.svg')}}" alt="Fauve vous faites fausse route !! ">
            </div>
            <div class="b-404__links">
                <div class="p">Voici quelques liens utiles à la place : </div>
                <nav class="links-404-page">
                    <ul>
                      @foreach( $link_error as $error)
                        <li><a href="{{ url($error->url_categoriePage) }}">{{ $error->titre_categoriePage}}</a></li>
                      @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
