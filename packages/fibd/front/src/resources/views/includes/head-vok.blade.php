<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    @if(count($metadata) >0 )
      <meta name="description" content="{{ $metadata[0]->meta_description_metaData }}">
      <link rel="canonical" href="{{ url()->current() }}">
      <title>{{ $metadata[0]->meta_title_metaData }}</title>
      <meta name="robots" content="{{ $metadata[0]->index_follow_metaData }}">
      <?php

          echo'
          	<meta property="og:title" content="'.$metadata[0]->meta_title_metaData.'" />
          	<meta property="og:type" content="article" />
          	<meta property="og:url" content="'.url()->current().'" />
          	<meta property="og:description" content="'.$metadata[0]->meta_description_metaData.'" />
            ';
        		if(isset($metadata[0]->media)){
              echo'
      	         <meta property="og:image" content="https://wwww.bdangouleme.com/'.$metadata[0]->media->url_media.'" />
      			  ';
    		    }
  	    ?>
    @endif
    @yield('head_tags')
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">
    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('medias/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('medias/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('medias/favicon/favicon-16x16.png')}}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="{{asset('medias/favicon/mstile-144x144.png')}}">
    <meta name="theme-color" content="#0093c7">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="{{ asset('assets/scripts/vendor/jquery-3.3.1.min.js') }}"></script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                                                     new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
         j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
         'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
         })(window,document,'script','dataLayer','GTM-WRBWCKM');</script>
<!-- End Google Tag Manager -->
</head>
