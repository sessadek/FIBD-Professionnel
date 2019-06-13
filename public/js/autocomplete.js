$('#search').on('keyup', function(value){
  let term = $('#search').val();
  if(term.length > 2){
  $.ajax({
    url:'/fibd_public/FIBDProd/public/autocomplete',
    cache: false,
    method: "POST",
    data:{
      value: term
    }
  })
  .done(function(response){
    results.style.display = response.length ? 'block' : 'none'; // On cache le conteneur si on n'a pas de résultats

  	    if (response.length) { // On ne modifie les résultats que si on en a obtenu

  	        $('#results').empty(); // On vide les résultats

  	        for (var i = 0; i < response.length ; i++) {

              	$('#results').append('<div>'+response[i]+'</div>');
              	$('#results div').on('click', function(e) {
                  chooseResult(e.target);
  	            });

  	        }

  	    }
  });
}
});

	function chooseResult(result) { // Choisi un des résultats d'une requête et gère tout ce qui y est attaché

	    $('#search').val(result.innerHTML); // On change le contenu du champ de recherche et on enregistre en tant que précédente valeur
	    results.style.display = 'none'; // On cache les résultats
      $('#results div').className = ''; // On supprime l'effet de focus
      $('#search').focus(); // Si le résultat a été choisi par le biais d'un clique alors le focus est perdu, donc on le réattribue

	}

  $('#search').on('keyup', function(e){
    console.log('haut');
    console.log(e.keyCode);
    if(e.keyCode == 38){
    }
  })
