@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb" class="w-100 d-none d-md-flex">
                    <ol class="breadcrumb col-sm-12 ">
                        <li class="breadcrumb-item"><a href="{{ url()->previous() }}">PARTENAIRES</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $choice[0]->titre_categoriePage}}</li>
                    </ol>
                </nav>
                <div class="col-sm-12">
                    <div class="title-header with-share">
                        <a href="{{ url()->previous() }}" class="btn btn-retour d-none d-md-flex">RETOUR PARTENAIRES</a>
                        <h1>{{ $choice[0]->titre_categoriePage}}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-header">
                        <h2 class="p">
                          {!! $choice[0]->description_categoriePage !!}
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container b-partenaires">
            <div class="b-partenaire">
              @if(count($type[0]->children) == 0)
              <?php $i=0; ?>
              @foreach($type as $part)
                <h2 style="margin-top: 20px;">{{ strtoupper($part->libelle_typePartenaire) }}</h2>
                <div class="p">{!! $part->description_typePartenaire !!}</div>
                <div class="b-partenaire__links">
                  @foreach($part->partenaire as $detail)
                    @if($detail->link_url_partenaire !== '')
                      <a href="{{ $detail->link_url_partenaire }}" class="b-partenaire__link" target="_blank">
                          <img class="small_partenaire" src="{{ asset(media_url_if_not_null($detail->media, 'Partenaires-MD-FIBD')) }}" alt="{{ media_alt_if_not_null($detail->media->libelle_media) }}">
                      </a>
                    @else
                      <img class="small_partenaire" src="{{ asset(media_url_if_not_null($detail->media, 'Partenaires-MD-FIBD')) }}" alt="{{ media_alt_if_not_null($detail->media->libelle_media) }}">
                    @endif
                    <?php if($i == 4){
                      echo('</br>');
                    }; $i++;?>
                  @endforeach
                </div>
                @endforeach
                @else
                  <?php $i=0; ?>
                @foreach($type[0]->children as $part)
                  <h2 style="margin-top: 20px;">{{ strtoupper($part->libelle_typePartenaire) }}</h2>
                  <div class="p">{!! $part->description_typePartenaire !!}</div>
                  <div class="b-partenaire__links">
                    @foreach($part->partenaire as $detail)
                      @if($detail->link_url_partenaire !== '')
                        <a href="{{ $detail->link_url_partenaire }}" class="b-partenaire__link" target="_blank">
                          @if($part->libelle_typePartenaire == 'Partenaire principal')
                            <img class="big_partenaire" src="{{ asset(media_url_if_not_null($detail->media, 'Partenaires-HD-FIBD')) }}" alt="{{ media_alt_if_not_null($detail->media->libelle_media) }}">
                          @else
                            <img class="small_partenaire" src="{{ asset(media_url_if_not_null($detail->media, 'Partenaires-MD-FIBD')) }}" alt="{{ media_alt_if_not_null($detail->media->libelle_media) }}">
                          @endif
                        </a>
                      @else
                        <img class="small_partenaire" src="{{ asset(media_url_if_not_null($detail->media, 'Partenaires-MD-FIBD')) }}" alt="{{ media_alt_if_not_null($detail->media->libelle_media) }}" >
                      @endif
                      <?php if($i == 4){
                        echo('</br>');
                      }; $i++;?>
                    @endforeach
                  </div>
                  @endforeach
                @endif
            </div>
        </div>

@endsection
