
@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
<div class="slider__home">
  @foreach($sliders as $slide)
    <div class="b-bandeau">
      <div style="background: url({{ asset(media_url_if_not_null($slide->media)) }}) no-repeat center; background-size: cover;">
        <img class="image_slider" src="{{ asset(media_url_if_not_null($slide->media)) }}" style="opacity:0;" alt="{{ media_alt_if_not_null($slide->media['libelle_media'])}}">
        `</div>
        <div class="pos-a-container height_slide" >
            <div class="b-bandeau__card slide_container">
                <div class="h2">{{ $slide->title_slide }}</div>
                <div class="p">{!! str_limit($slide->subtitle_slide , $limit= 150) !!}</div>
                <a href="{{ url($slide->link_slide) }}" class="btn btn-primary btn-more">{{ $slide->title_link_slide}}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="container">
    <div class="row b-actualites">
      @foreach($menuFile as $menu)
        <div class="col-xl-4 col-md-6">
          @if($menu['link_categoriePage'] == '')
            <a href="{{ url($menu['url_categoriePage'])}}"><div class="b-actu">
          @else
          <a href="{{ url($menu['link_categoriePage'])}}" target="$menu['target_categoriePage']"><div class="b-actu">
          @endif
                <div class="h2">{{ $menu['libelle_categoriePage'] }}</div>
                <div class="b-actu__thumb">
                  <h2 style="background-image: url({{asset(media_url_if_not_null( $menu->media, 'Articles-ADMT-BD-FIBD', 'crops'))}}); background-repeat: no-repeat; background-size: cover; background-position: center;  min-height: 200px; height:16vw;">
                    <img style="opacity: 0;" src="{{asset(media_url_if_not_null( $menu->media, '0'))}}" alt="{{ media_alt_if_not_null($menu->media['libelle_media'])}}">
                  </h2>
                    <span class="btn btn-primary btn-more">{{ trans('front::home.savoir_plus')}}</span>
                </div>
                @if($menu['small_description_categoriePage'])
                <div class="p">{!! str_limit($menu['small_description_categoriePage'], $limit= 135, $end = '...') !!}</div>
                @else
                <div class="p">{!! str_limit($menu['description_categoriePage'], $limit= 135, $end = '...') !!}</div>
                @endif
            </div></a>
        </div>
        @endforeach
    </div>
</div>
@if(count($partenaire) > 0 )
<div class="s-partenaire">
    <div class="container">
        <div class="h2">NOS PARTENAIRES</div>
        <div class="slider-partenaire">
          @foreach($partenaire as $part)
            <div class="slider-partenaire__item"><img src="{{ asset(media_url_if_not_null($part->media, 'Partenaires-BD-FIBD')) }}" alt="{{ media_alt_if_not_null($part->media['real_file_name_media'])}}"></div>
          @endforeach
        </div>
    </div>
    <div class="container">
        <a href="{{ url('/partenaires')}}" class="btn btn-primary">VOIR TOUS NOS PARTENAIRES</a>
    </div>
</div>
@endif
@endsection
