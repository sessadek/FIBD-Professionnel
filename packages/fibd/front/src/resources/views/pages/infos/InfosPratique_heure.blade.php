@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb" class="w-100 d-none d-md-flex">
                    <ol class="breadcrumb col-sm-12 ">
                        <li class="breadcrumb-item"><a href="{{ url()->previous()}}">INFOS PRATIQUES</a></li>
                        <li class="breadcrumb-item active" aria-current="page">HEURE PAR HEURE</li>
                    </ol>
                </nav>
                <div class="col-sm-12">

                    <div class="title-header with-share underline-none">
                        <div class="buttons-header" style="right:0px !important;top:15px !important;">
							<a href="https://www.bdangouleme.com/media/documents/FIBD-2019-HEURE-PAR-HEURE.pdf" class="b-sidebar__pdf" target="_blank" title="Heure/Heure" style="width: 180px;text-align: left;"><br>Télécharger le Heure par Heure</a>
							<a href="https://www.bdangouleme.com/media/documents/FIBD-2019-PROGRAMME-WEB.pdf" class="b-sidebar__pdf" target="_blank" title="Programme" style="width: 180px;text-align: left;"><br>Télécharger le programme</a>
                            <a href="#" class="icon-print" style="display:none;"></a>
                        </div>
                        <h1>HEURE PAR HEURE</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="tags__heure">
                      @foreach($dateFest as $fest)
                        <a class="b-tag__heure filter-day" data-date_dateEdition="{{ $fest->date_dateEdition }}" href="#" ><span class="day">{{ $fest->libelle_dateEdition }}</span></a>
                      @endforeach
                        <a class="b-tag__heure all-days day-selected" href="#">TOUS LES JOURS</a>
                    </div>

                    <div class="tags__heure--filter">

                        <!-- <div class="form-group">
                            <select name="date" id="date" class="form-control form-filter filter-date" >
                                @foreach($dateFest as $fest)
                                <option value="{{ $fest->date_dateEdition }}">{{ $fest->libelle_dateEdition }}</option>
                                @endforeach
                            </select>
                        </div> -->

                        <div class="form-group">
                            <select name="heure" id="heure_start" class="form-control form-filter">
                                <option class="reset" selected="" disabled="" hidden="true" value="0">heure</option>
                                <?php
                                  $minute = 0;
                                  $screenCalcul = $startHeure;
                                 ?>
                                @while($startHeure  <= $endHeure)
                                <?php
                                  $screenHeure = ($startHeure < 10)? '0'.$startHeure:$startHeure;
                                  $screenHeure.= ':';
                                  $screenHeure.= ($minute < 30)? '0'.$minute:$minute;
                                  if($minute < 30){
                                    $minute += 30;

                                  } else {
                                    $minute = 0;
                                    $startHeure++;
                                  }
                                 ?>
                                <option value="{{ $screenCalcul }}">{{ $screenHeure }}</option>
                                <?php
                                  $screenCalcul += 0.5;
                                 ?>
                                 @endwhile
                            </select>
                        </div>

                        <div class="form-group">
                            <select name="evenement" id="id_type" class="form-control form-filter">
                                <option selected="" disabled="" hidden="true" value="0">ÉVÉNEMENT</option>
                                @foreach($evenement->sortBy('libelle_typeProgrammation') as $fest)
                                  <option value="{{ $fest['id_typeProgrammation'] }}">{{ $fest['libelle_typeProgrammation'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select name="lieux" id="id_lieu" class="form-control form-filter">
                              <option selected="" disabled="" hidden="true" value="0">lieux</option>
                                @foreach($lieu as $fest)
                                  <option value="{{ $fest['id_lieu'] }}">{{ $fest['libelle_lieu'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select name="public" id="id_public" class="form-control form-filter">
                              <option selected="" disabled="" hidden="true" value="0">public</option>
                                @foreach($publicFest as $fest)
                                  <option value="{{ $fest->id_public }}">{{ $fest->libelle_public }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- <div class="form-group">
                            <select name="intervenant" id="intervenant" class="form-control form-filter">
                                <option selected="" disabled="" hidden="">intervenant</option>
                                <option value="intervenant">intervenant</option>
                            </select>
                        </div> -->
                    </div>
                    <a href="#" class="btn-reset">X Réinitialiser les filtres</a>
                </div>
            </div>
        </div>
		<?php
			//recuperation de al iste des visuels par default
			$tabListeVisuelsTypes=scandir('./assets/visuels_types_prog/');
			$tabListeFinalVisuel=array();
			foreach($tabListeVisuelsTypes as $key=>$value){
				$tabListeNode=explode("_",$value);
				$tabListeFinalVisuel[$tabListeNode[0]]=$value;
			}
		?>
		@foreach($arrayline as $progDay)

        <div class="container block-timeline" id="timeline-{{ $progDay[0]->date_dateEdition }}"
		<?php
		if($progDay[0]->date_dateEdition<date("Y-m-d")){
			echo' style="display:none;" ';
		}
		?>
		>
          <div class="date-publication">
              {{ $progDay[0]->libelle_dateEdition }}
          </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="timeline">
						<?php
							$ok_img_next=false;
							$correction_data_attr='';
							$correction_height='';
							$value_min_height=0;
						?>
                      @for($i=1; $i < count($progDay);  $i++)
                      <?php
                        $parts = explode(':', $progDay[$i]->hour_start_programmation);
                        $heureStart = $parts[0] + floor(($parts[1]/60)*100) / 100;
                       ?>
                       @if($progDay[$i]->titre_programmation)
							<?php
								$tabIntervenant=$progDay[$i]->intervenant;
								$pathImage = media_url_if_not_null($progDay[$i]->media, 'Articles-ADMT-FIBD', 'nocrops', false);

								if($pathImage == '' || $pathImage == 'blank.png'){
									//utilisation d'un visuel par defaut pour le type de programmation
									if($progDay[$i]->id_typeProgrammation>0 && isset($tabListeFinalVisuel[$progDay[$i]->id_typeProgrammation])){
										$pathImage='./assets/visuels_types_prog/'.$tabListeFinalVisuel[$progDay[$i]->id_typeProgrammation];
									}
								}
								if($correction_height!='' && count($tabIntervenant)>0){
									$correction_height='';
								}
								if($pathImage !== '' && $pathImage !== 'blank.png'){
									$correction_height='';
								}
								if(strlen($progDay[$i]->titre_programmation)<40 && count($tabIntervenant)==0){
									$correction_height='';
								}
						   ?>
                        <div class="b-timeline block-detail <?php echo $correction_height;?>" id="node-prog-{{$i}}" data-heureStart="{{ $heureStart }}" data-id_lieu="{{ $progDay[$i]->id_lieu}}" data-id_public="{{ $progDay[$i]->id_public}}" data-id_type="{{ $progDay[$i]->id_typeProgrammation}}">
                            <div class="b-timeline__date">{{date('H:i', strtotime($progDay[$i]->hour_start_programmation))}}</div>
                            <div class="b-timeline__body">
                              <?php
									$value_min_height=0;
									$correction_height='';
                                  //$pathImage = media_url_if_not_null($progDay[$i]->media, 'Articles-ADMT-FIBD', 'nocrops', false);
                               ?>
                              @if($pathImage !== '')
                                <img src="{{asset($pathImage)}}">
								<?php $ok_img_next=true; ?>
                              @endif
                                <h2>{!! strip_tags($progDay[$i]->titre_programmation) !!}</h2>
                                <div class="b-timeline__text">
                                  <?php
                                      $dureeProg = '';
                                      if($progDay[$i]->duree){
                                        $dureeProg .= 'durée : '.$progDay[$i]->duree;
                                      }
                                   ?>
                                  @if($progDay[$i]->lieu['libelle_lieu'] !== '')
                                    <div class="p" style="color: #aaaaaa;">{!! $progDay[$i]->type['libelle_typeProgrammation'] !!} - {!! $progDay[$i]->lieu['libelle_lieu'] !!}<br>
									@if($progDay[$i]->public['libelle_public']!='')
										{!! $progDay[$i]->public['libelle_public'] !!} - {{ $dureeProg }}
									@else
										{{ ucfirst($dureeProg) }}
									@endif
									</div>
                                  @endif
                                  @if($progDay[$i]->small_description_programmation !== '')
                                    <div class="p">{!! $progDay[$i]->small_description_programmation !!}</div>
                                  @else
                                    <div class="p">{!! $progDay[$i]->description_programmation !!}</div>
                                  @endif
                                  @if($tabIntervenant!='')
                                  <?php
                                        $id_type_current = 0;
                                        $label_current = '';
                                        $ii = 0;
                                        $tabListeIntervenant=[];
                                        foreach($tabIntervenant as $valueInter){

                                          if($id_type_current != $valueInter->typeIntervenant->id_typeIntervenant){
											$label_current = $valueInter->typeIntervenant->libelle_typeIntervenant;
                                            $id_type_current = $valueInter->typeIntervenant->id_typeIntervenant;
                                            $tabListeIntervenant[$id_type_current]['label']=$valueInter->typeIntervenant->label_front_typeIntervenant;
											if(!isset($tabListeIntervenant[$id_type_current]['liste_intervenant'])){
												$tabListeIntervenant[$id_type_current]['liste_intervenant']='';
											}
                                          $ii++;
                                          }
                                          if(isset($tabListeIntervenant[$id_type_current])){
                                            $tabListeIntervenant[$id_type_current]['liste_intervenant'].=$valueInter->prenom_intervenant.' '.$valueInter->nom_intervenant.', ';
                                          }
                                        }
                                   ?>
									  <div style="display: flex;">
									   <div class="p">
										  @foreach($tabListeIntervenant as $interv)
												{!! ucfirst ($interv['label']) !!} {!! substr($interv['liste_intervenant'],0,-2)!!} <br>
										  @endforeach
										</div>
									  </div>
                                  @endif
                                </div>
                                  @if($pathImage != '' && strlen(strip_tags($progDay[$i]->small_description_programmation))>0)
									<a href="{{ url('/heure-par-heure'.$progDay[$i]->url_programmation)}}" class="btn btn-primary btn-more">EN SAVOIR PLUS</a>
                                @endif
                            </div>
                        </div>
							<?php
								//correction intervenant
								if($pathImage != '' && $pathImage != 'blank.png'){
									$correction_height='min-height-node-prog-image';
								}
								else{
									if(strlen($progDay[$i]->titre_programmation)>70){
										$correction_height='min-height-node-prog';
									}
								}
							?>
                        @endif
                      @endfor
                    </div>
                </div>
            </div>
        </div>
@endforeach
<style>
.b-sidebar__pdf:before{height:30px !important;width:24px;background-size:24px 30px !important;top:59% !important;}
.tags__heure--filter .form-group{width:230px !important;}
.day-selected {	color: #000; background-color: #F9AE15;}
.block-detail{min-height:360px !important;}
.block-detail{min-height:360px !important;}

.b-timeline{margin-bottom:40px !important;}
@media(max-width:768px;){
	.block-detail{min-height:5px !important;}
}
</style>
<script>
function resetDay(){
  $(".block-timeline").fadeIn();
  $(".filter-day").removeClass("day-selected");
  $(".all-days").addClass("day-selected");
}

  $(document).ready(function(){
    $(".all-days").click(function(){resetDay();});
    $(".filter-day").click(function(){
      var zone = $(this);
      if(zone.attr("data-date_dateEdition")){
        $(".filter-day").removeClass("day-selected");
        $(".all-days").removeClass("day-selected");
        zone.addClass("day-selected");
        $(".block-timeline").each(function(){
          if($("#timeline-"+zone.attr("data-date_dateEdition")) && $(this).attr("id") == "timeline-"+zone.attr("data-date_dateEdition")){
            $(this).fadeIn();
          } else {
            $(this).fadeOut();
          }

        });

      }
    });
    $("#id_public").change(function(){
      var zone = $(this);
      $(".block-detail").each(function(){
        if($(this).attr('data-id_public') == zone.val()){
          $(this).fadeIn();
        } else {
          $(this).fadeOut();
        }

      });
    });
    $("#id_type").change(function(){
      var zone = $(this);
      $(".block-detail").each(function(){
        if($(this).attr('data-id_type') == zone.val()){
          $(this).fadeIn();
        } else {
          $(this).fadeOut();
        }

      });
    });
    $("#id_lieu").change(function(){
      var zone = $(this);
      $(".block-detail").each(function(){
        if($(this).attr('data-id_lieu') == zone.val()){
          $(this).fadeIn();
        } else {
          $(this).fadeOut();
        }

      });
    });
    $("#heure_start").change(function(){
      var zone = $(this);
      $(".block-detail").each(function(){
        if(parseFloat($(this).attr('data-heureStart')) >= parseFloat(zone.val())){
          $(this).fadeIn();
        } else {
          $(this).fadeOut();
        }

      });
    });
  });
$('.btn-reset').click(function(){
  resetDay();
  $("#heure_start").val('0').trigger('change');
  $("#id_lieu").val('0').trigger('change');
  $("#id_type").val('0').trigger('change');
  $("#id_public").val('0').trigger('change');
  $(".block-detail").fadeIn();
});

</script>

    @endsection
