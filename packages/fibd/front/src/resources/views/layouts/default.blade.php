<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:og="http://ogp.me/ns#">
@include('front::includes.head', ['metadata' => $metaData ])
<body class="{{ (Route::currentRouteName() == 'home') ? 'home-page' : '' }}">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WRBWCKM"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="s-search">
        <div class="d-table-cell">
            <div class="container">
                <a href="#" class="close-search"></a>
                <form action="{{ url('/page_recherche')}}" id="form-search" method="GET">
                    <div class="form-group">
                        <input type="search" class="form-control " id="search" name="search">
                        <div id="results" style="background-color: white;"></div>
                    </div>
                    <button type="submit">&nbsp;</button>
                </form>
                <div class="links">
                    <span>Expositions 2019</span>
                    <span>Tom Tom & Nana</span>
                    <span>Franquin</span>
                    <span>Programme samedi</span>
                    <span>Grand prix 2019</span>
                </div>
            </div>
        </div>
      </div>
    @include('front::includes.header')

    <main>
      @yield('content')

      @if(!$_SESSION['ok_cookie'])
        @include('front::includes.cookieBar', ['cookie' => $Cookie])
      @endif
    </main>

    @include('front::includes.footer')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/autocomplete.js') }}"></script>
    @yield('js')
    <script type="text/javascript">
      // $('#public').change(function(){
      //   alert( $( '#public option:selected' ).val() );
      // });
      // $('#lieux').change(function(){
      //   alert( $( '#lieux option:selected' ).val() );
      // });
    </script>
    <script>
        //send newsletters
        $('#form-newsletter').submit(function () {
          $('#responsesEmail').remove();
          let email =  $("#email").val();
          let check = $('#check-newsletter-form');
          //return false;
          if(email!='' && check.is(":checked") == true && $('#form-newsletter').valid()){

                  $.ajax({
                    url:"{{ url('/newsletters') }}",
                    cache: false,
                    method: "POST",
                    data:{
                      email: email
                    }
                  })
                  .done(function(result){
                      $('.validation_message').append('<div id="responsesEmail" class="responsesEmail" style="color: green">'+result+'</div>');
                      setTimeout(function(){
                        $('#responsesEmail').fadeOut().remove();
                      },2000);
                  });
          }
          return false;
      });

    </script>
    <script>
    $('#language').on('change', function(){
      let type = $('#language').val();

      $.ajax({
        url:"{{ url('/language') }}",
        cache: false,
        method: "POST",
        data:{
          'lang': type
        }
      })
      .done(function(result){
          console.log(result);
          location.reload();
      });
    })
    </script>
</body>
</html>
