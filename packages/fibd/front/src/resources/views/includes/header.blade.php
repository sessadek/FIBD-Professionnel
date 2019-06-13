@php
$path = request()->path();
if(isset($path) && $path != "/") {
  $path = explode('/', $path);
}
@endphp
<header>
  <div class="header__top">
    <div class="container">
      <div class="row">
        <div class="header__top--left d-none d-md-block">
          <nav class="nav-header__top">
            <ul>
              @foreach($headLink as $link)
              <li><a href="{{ $link->url_headerLink }}" target="_blank" class="{{ (url($link->url_headerLink) == url(''))? 'active': ''}}">{{ $link->libelle_headerLink }}</a></li>
              @endforeach
            </ul>
          </nav>
        </div>
        <div class="header__top--right">
          <button class="navbar-toggler d-block d-md-none" type="button" data-toggle="collapse" data-target="#navbarPrincipalMenu" aria-controls="navbarPrincipalMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="logo d-block d-md-none">
            <a href="{{ url('/')}}">
              <img src="{{asset('medias/images/logoFIBD_46e_noir.svg')}}" style="width: 234px; height: 80px;" alt="le festival international de la bande dessinee d'Angoulême">
            </a>
          </div>
          <div>
            <select name="country" id="language" class="select-country">
              <option value="fr">fr</option>
              <option value="en">en</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header__middle">
    <div class="container">
      <div class="row">
        <div class="logo d-none d-md-block">
          <a href="{{ url('/')}}">
            <img src="{{asset('medias/images/Image3.svg')}}" style="width: 234px; max-height: 60px;" alt="{{ media_alt_if_not_null('Image3.svg')}}">
          </a>
        </div>
        <div class="logo d-block d-md-block d-md-none logo-header-partenaire" style= "margin: auto; text-align: center;">
            <div style="width: 250px; height: 80px;">
            <img src="{{asset('logo-fibd-raja.svg')}}" style="height: 80px;" alt="Raja partenaire principal présente le festival international de la bande dessinee d'Angoulême">
          </div>
        </div>
        <div class="header__middle--right d-none d-md-flex " style="margin:0px;">
          <a href="{{ url('infos-pratiques/billetterie')}}" class="btn btn-danger" style="visibility: hidden;">BILLETTERIE</a>
          <div class="b-search">
            <span class="search-overlay"></span>
            <a href="#" class="btn-search"></a>
          </div>
        </div>
        <nav class="navbar navbar-expand-md mx-1200 w-100">
          <div class="collapse navbar-collapse" id="navbarPrincipalMenu">
            <nav class="nav-header__top d-block d-md-none" style="overflow: hidden;">
              <ul style="width: 100vw; overflow-x: scroll;">
                @foreach($headLink as $link)
                <li><a href="{{ $link->url_headerLink }}" target="_blank">{{ $link->libelle_headerLink }}</a></li>
                @endforeach
              </ul>
            </nav>
            <ul class="navbar-nav" id="menu">
              @foreach($menuHeader as $menu)
              @if($menu->link_categoriePage == '')
              <li class="nav-item"><a class="nav-link view-block-pub" data-id_parent="{{ $menu->id_categoriePage }}" data-categorie="{{ $menu->id_categoriePage }} " href="{{ url($menu->url_categoriePage) }}">{{ $menu->titre_categoriePage }}</a>
                @else
              <li class="nav-item"><a class="nav-link view-block-pub" data-id_parent="{{ $menu->id_categoriePage }}" data-categorie="{{ $menu->id_categoriePage }} " href="{{ url($menu->link_categoriePage) }}" target="_blank">{{ $menu->titre_categoriePage }}</a>
                @endif
                @if(count($menu->children) >  0)
                <div class="nav-item__wrapper">
                  <ul class="nav-item__container">
                    <li class="nav-item__container--left">
                      <ul>
                        @foreach($menu->children as $sousMenu)
                        <li class="nav-item__dropDown">
                          @if($sousMenu->link_categoriePage == '')
                          <a class="view-block-pub"  data-id_parent="{{ $menu->id_categoriePage }}" data-categorie="{{ $sousMenu->id_categoriePage }}" href="{{ url($sousMenu->url_categoriePage)}}">{{ $sousMenu->titre_categoriePage }}</a>
                          @else
                          <a class="view-block-pub"  data-id_parent="{{ $menu->id_categoriePage }}" data-categorie="{{ $sousMenu->id_categoriePage }}" href="{{ $sousMenu->link_categoriePage }}" target=_blank>{{ $sousMenu->titre_categoriePage }}</a>
                          @endif
                          <ul>
                            @if(count($sousMenu->children) == 0)
                              @if($sousMenu->small_description_categoriePage !== '')
                                <li class="p">{!! $sousMenu->small_description_categoriePage !!}</li>
                              @endif
                            @else
                            @foreach($sousMenu->children as $categorie)
                            @if($categorie->is_use_navigation_categoriePage == 1)
                            <li><a class="view-block-pub"  data-id_parent="{{ $menu->id_categoriePage }}" data-categorie="{{ $sousMenu->id_categoriePage }}" href="{{ url($categorie->url_categoriePage)}} ">{{ $categorie->titre_categoriePage }}</a></li>
                            @endif
                            @endforeach
                            @endif
                          </ul>
                        </li>
                        @endforeach
                      </ul>
                    </li>
                    <li id="publish-{{ $menu->id_categoriePage }}" class="nav-item__container--right d-none d-md-block">
                    </li>
                  </ul>
                </div>
                @endif
              </li>
              @endforeach
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>
<script>
$(document).ready(function (){
  $(".view-block-pub").mouseover(function(){
    var zone = $(this);
    if (zone.attr("data-id_parent") && $("#publish-"+zone.attr("data-id_parent"))){
      $.ajax({
        url:"{{ url('/banniere') }}",
        cache: false,
        method: "POST",
        data:{
          id_categoriePage: $(this).attr("data-categorie")
        }
      })
      .done(function(html){
        $("#publish-"+zone.attr("data-id_parent")).html("").append(html);

      });
    }

  });
})
</script>
