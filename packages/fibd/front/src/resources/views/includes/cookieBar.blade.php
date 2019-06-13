<div id="zone-accept-cookie" class="zone-accept-cookie" >
  <div class="zone-container-message-cookie">
    {!! $cookie[0]->description_messagecookie!!}
  </div>
  <div class="zone-container-button-cookie">
    <button name="bt-accept-cookie" id="bt-accept-cookie" class="btn btn--gold accept-cookie" role="button">J'accepte</button>
  </div>
  <script>
  $(document).ready(function(){
    $('.accept-cookie').click(()=>{
      $.ajax({
        url:"{{ url('/cookie/set') }}",
        cache: false,
        method: "POST",
        data:{

        }
      })
      .done(function(html){
        $("#zone-accept-cookie").fadeOut();
      });
    })
  });
</script>
