@extends('front::layouts.default')
@section('content')
        <div class="header__middle--right d-flex d-md-none">
            <a href="{{ url('infos-pratiques/billetterie')}}" class="btn btn-danger">BILLETTERIE</a>
            <div class="b-search">
                <span class="search-overlay"></span>
                <!--<a style="display: none" href="#" class="btn-search"></a>-->
            </div>
        </div>

        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb" class="w-100 d-none d-md-flex">
                    <ol class="breadcrumb col-sm-12 ">
                    </ol>
                </nav>
                <div class="col-sm-12">
                    <div class="title-header with-share">
                        <!-- <a href="{{ url()->previous() }}" class="btn btn-retour d-none d-md-flex">RETOUR ACCESSIBILITÉ</a> -->
                        <div class="buttons-header">
                              @include('front::includes.shareLink')
                        </div>
                        <h1>Galeries Photos</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container b-actualites container-galeries-photos mb-10">
				<?php
					//connexion sur archives
      		$url_source='https://archives.bdangouleme.com/medias/';
      		$base_archives = 'mysql:dbname=plfr_prod;host=83.166.149.209';
      		$archives_user = 'plfr_itidealcoms';
      		$archives_password = '16t!d16lc16_ms#';
					//serveur local
					// $base_archives = 'mysql:dbname=plfr_pro;host=localhost';
					// $archives_user = 'root';
					// $archives_password = 'root';
					try {
						$base = new PDO($base_archives, $archives_user, $archives_password);
						//recuperation de la liste des editions
						$id_default_galerie=(isset($galerie) && $galerie>0)?$galerie:0;
// echo'<pre>galerie : '.$galerie.' --> '.$id_default_galerie.'</pre>';
						$annee_edition_min=2013;
						$numero_edition_max=46;
						$annee_edition_max=2019;
						$current_edition=(isset($num_edition) && $num_edition>0)?$num_edition:2019;
// echo'<pre>num_edition : '.$num_edition.'</pre>';
						//creation du menu deroulant
						$return_choice_edition='
						<select name="num_edition" id="num_edition" size="1" class="form-control form-filter select2-hidden-accessible">
						';
						for($ii=$annee_edition_max;$ii>=$annee_edition_min;$ii--){
							$selected=($current_edition==$ii)?'selected ':'';
							$return_choice_edition.='<option value="'.$ii.'" '.$selected.'>'.$numero_edition_max--.'e ('.$ii.')</option>';
						}
						$return_choice_edition.='</select>';
						//recuperation de al iste des themes
						$return_choice_theme='';
						$tabListeTheme=array();
						$requete_theme="SELECT * FROM `themes` WHERE 1=1 ORDER BY ordre asc";
						/*
						//mise en commentaire pour 2019
						if($tabRecordset=$base->query($requete_theme)){
							while($q=$tabRecordset->fetch(PDO::FETCH_ASSOC)) :
								$tabListeTheme[$q['id']]=$q;
							endwhile;
							if(count($tabListeTheme)>0){
								$return_choice_theme.='
								<select name="choice_theme" id="choice_theme" class="form-control form-filter select2-hidden-accessible" size=1 tabindex="-1" aria-hidden="true">
								<option value="">Thématiques</option>';
								foreach($tabListeTheme as $key=>$value){
									$selected=(isset($choice_theme) && $choice_theme>0 && $choice_theme==$key)?'selected ':'';
									$return_choice_theme.='<option value="'.$key.'" '.$selected.'>'.$value['title'].'</option>';
								}
								$return_choice_theme.='</select>';
							}
						}*/
// echo'<pre>$tabListeTheme<br>';
// print_r($tabListeTheme);
// echo'</pre>';
						$return_filter='<div class="row" style="padding-top:30px;">&nbsp;</div>';
						/*$return_filter='
							<div class="row" style="padding-top:30px;">
								<div class="col-sm-12">
									<div class="tags__heure--filter">
										<div class="form-group">
											'.$return_choice_edition.'
										</div>
										<div class="form-group">
											'.$return_choice_theme.'
										</div>
									</div>
								</div>
							</div>
						';*/
						//recuperation de la liste des photo_cat pour l'edition choisie / en cours par defaut
						$tabListePhotosCategories=array();
						$requete_galerie="SELECT * FROM `photos_cats` WHERE id_edition=".$current_edition." ORDER BY position asc ";
// echo'<pre>requete photo : '.$requete_galerie.'</pre>';
						if($tabRecordset=$base->query($requete_galerie)){
							while($q=$tabRecordset->fetch(PDO::FETCH_ASSOC)) :
								$tabListePhotosCategories[$q['id']]=$q;
							endwhile;
						}
// echo'<pre>$tabListePhotosCategories<br>';
// print_r($tabListePhotosCategories);
// echo'</pre>';
						//recuperation de la liste des galeries pour l'edition choisie
						$tabListeGalerie=array();
						$tabListeFolder=array();
						$return_liste_galerie='';
						$requete_galerie="SELECT * FROM `galeries` WHERE id_edition=".$current_edition." ORDER BY last desc, ordre asc ";
// echo'<pre>requete photo : '.$requete_galerie.'</pre>';
						if($tabRecordset=$base->query($requete_galerie)){
							while($q=$tabRecordset->fetch(PDO::FETCH_ASSOC)) :
								$tabListeGalerie[$q['id']]=$q;
								$tabListeFolder[$q['folder_id']]=$q['folder_id'];
							endwhile;
							if(count($tabListeGalerie)>0){
								foreach($tabListeGalerie as $key=>$value){
									switch($value['last']){
										default ://
											//recuperation de la premiere image via le folder_id de la galerie
											$requete_photos="SELECT a.*,b.copyright FROM `photos`a, `users` b WHERE a.id_edition=".$current_edition." AND a.cat_id=".$value['folder_id']." AND a.updated_by=b.id ORDER BY a.ordre asc";
// echo'<pre>requete photo : '.$requete_photos.'</pre>';
											$i_photo=0;
											if($tabRecordset=$base->query($requete_photos)){
												while($q=$tabRecordset->fetch(PDO::FETCH_ASSOC)) :
													//ajout d ela premiere image en fond de cartouche
													if($i_photo==0){
														$tabListeGalerie[$key]['default_photo']=$q;
														if($id_default_galerie==0){
															$id_default_galerie=$key;
														}
													}
													$tabListeGalerie[$key]['liste_photos'][$q['id']]=$q;
												$i_photo++;
												endwhile;
											}
										break;
									}
								}
							}
						}
// echo'<pre>$tabListeGalerie<br>';
// print_r($tabListeGalerie);
// echo'</pre>';
						//recomposition de la galerie
						//parcours des galeries
						$return_view_galerie='';
						if(count($tabListeGalerie)>0){
							//partie pour choisir une galerie
							foreach($tabListeGalerie as $key_galerie=>$value_galerie){
								//pour l'image par defaut
								$path_image_final='fibd-46.jpg';
								if(isset($tabListeGalerie[$key_galerie]['default_photo'])){
									$default_path_image=$tabListeGalerie[$key_galerie]['default_photo']['filename'];
									$path_image_final=$url_source.$current_edition.'/photographies/principal/'.$default_path_image;
									$return_view_galerie.='
									<div class="col-xl-4 col-md-6">
										<div class="b-actu">
											<div class="h2">'.$value_galerie['title'].'</div>
												<div class="b-actu__thumb">
													<h2 style="background-image: url('.$path_image_final.'); background-repeat: no-repeat; background-size: cover; background-position: center; min-height: 200px !important; height: 16vw;">
													  <img style="opacity: 0;" src="'.$path_image_final.'" alt="Galerie '.$current_edition.' : '.$value_galerie['title'].'">
													</h2>
													<a href="/galeries-photos/'.$current_edition.'/'.$key_galerie.'" class="btn btn-primary btn-more" >Voir la galerie</a>
												</div>
											</div>
										</div>
									';
								}
							}
						}
						//preparation pour le slider
						$id_slider=0;
						if($id_default_galerie>0 && isset($tabListeGalerie[$id_default_galerie]['liste_photos']) && count($tabListeGalerie[$id_default_galerie]['liste_photos'])>0){
							$return_slider='<div class="container">';
							$return_slider.='<div class="row" id="zone-view-slider">';
							$return_slider_view='<div class="slider slider-for">';
							$return_slider_nav='<div class="slider slider-nav">';
										//creation de la liste des images
										$i_media=0;
										foreach($tabListeGalerie[$id_default_galerie]['liste_photos'] as $key=>$value){
											$alt_img=$value['legend'];
											$src_single_picture=$url_source.'/'.$current_edition.'/photographies/'.$value['filename'];
											$src_thumb_picture=$url_source.'/'.$current_edition.'/photographies/vignette/'.$value['filename'];
											$return_slider_view.='
											<div class="galerie-slide">
												<div class="inner-galerie-slide">
													<img src="'.$src_single_picture.'" alt="'.$alt_img.'" class="main-img-slider" data-path_image="'.str_replace('/photographies','/photographies/original',$src_single_picture).'" />
												</div>
												<div class="inner-galerie-legend">
													<div class="slide-legend">'.$value['legend'].' '.$value['copyright'].'</div>
												</div>
											</div>
											';
											$return_slider_nav.='
												<div class="galerie-slide-nav">
													<img src="'.$src_thumb_picture.'" alt="'.$alt_img.'" />
												</div>
											';
											$i_media++;
										}
							$return_slider_view.='</div>';
							$return_slider_nav.='</div>';
							$return_slider.=$return_slider_view;
							$return_slider.=$return_slider_nav;
							$return_slider.='</div>';
							$return_slider.='</div>';
							$return_slider.='
							<style>
								.zoom-slider{display:none;width:100%;height:100%;z-index:1035;position:absolute;background:rgba(0,0,0,0.75);top:0px;left:0px;margin:auto;position:fixed;}
								.inner-slider-zoom{width:fit-content;height:fit-content;padding:15px;margin:auto;text-align:center;display:flex;}
									.inner-slider-zoom img{max-height: fit-content;width: auto;max-width: 100% !important;height: 100%;}
								.tags__heure--filter .form-group{width:250px !important;}
								#num_edition,#choice_theme{width:250px !important;}
								.slider-for{margin-top:50px;background:#000;max-height:700px;}
								.slider-for .galerie-slide{height:780px;margin:auto;width:90%;}
								.slider-for .galerie-slide .inner-galerie-slide{max-height:670px !important;width:100%;margin:auto;}
								.slider-for .galerie-slide .inner-galerie-slide img{max-height:670px !important;margin:auto;cursor:pointer;}
								.slider-for .galerie-slide .inner-galerie-legend {max-height:100px !important;margin:auto;text-align:center;}
								.slider-for .galerie-slide .inner-galerie-legend .slide-legend{width:100%;color:#FFF;display:block;position:relative;padding-top:10px;padding-bottom:15px;min-height:38px !important;}

								.slider-nav{margin-top:25px;margin:auto;background:#000;}
								.slider-nav galerie-slide-nav{}
								.slider-nav .slick-slide{max-width:180px !important;margin-right:10px;}
								.slider-nav .galerie-slide-nav img{text-align:center;height:100% !important;}
								@media(max-width:990px){
									.slider-for .galerie-slide{height:600px;margin:auto;width:90%;}
									.inner-slider-zoom{display:flex;max-width:100%;height:auto;max-height:100%;}
									.inner-slider-zoom img{}
								}
								@media(max-width:768px){
									.inner-slider-zoom{width:100% !important;height:auto :important;padding:15px;margin:auto;text-align:center;display:flex;}
									.inner-slider-zoom img{max-height:555px !important;padding:0px;margin:auto;text-align:center;display:flex;height:auto;}
									#zone-view-slider{padding-right:10px;padding-left:10px;}
									.slider-for{margin-top:unset;background:#000;max-height:350px;}
									.slider-for .galerie-slide{height:unset;margin:unset;}
									.slider-for .galerie-slide .inner-galerie-slide{max-height:unset !important;width:unset;margin:auto;}
									.slider-nav{margin-top:25px;display:none;}
									.slider-nav .galerie-slide-nav{max-width:150px;text-align:center;display:flex;}
									.slider-for .slide-legend{float:left;color:#FFF;display:block;position:relative;padding-top:10px;padding-bottom:5px;min-height:20px !important;font-size:0.75em;}
									.slider-for .galerie-slide .inner-galerie-legend {max-height:20px !important;margin:auto;text-align:center;}
									.slider-for .galerie-slide .inner-galerie-legend .slide-legend{min-height:38px !important;float:left;width:100%;color:#FFF;display:block;position:relative;padding-top:0px;bottom:0;height:20px !important;background:rgba(0,0,0,0.75);}
								}
							</style>
							<script>
								$(document).ready(function(){
									$(".slider-for").slick({
										slidesToShow: 1,
										slidesToScroll: 1,
										arrows: true,
										fade: true,
										dots: false,
										asNavFor: ".slider-nav"
									});
									$(".slider-nav").slick({
										slidesToShow: 10,
										slidesToScroll: 1,
										asNavFor: ".slider-for",
										dots: false,
										centerMode: true,
										focusOnSelect: true,
										infinite:true
									});
									$(".main-img-slider").click(function(){
										var zone=$(this);
										if(zone.attr("data-path_image")){
											$("#inner-zoom-slider").html("").append(\'<img src="\'+zone.attr("data-path_image")+\'" style="">\');
											$("#zoom-slider").css("display","flex");
										}
									});
								});
							</script>
							';
						}
						$return_slider.='
							<style>
								#zone-view-slider{display:none;margin-top:25px;}
								.tags__heure--filter .form-group{width:250px !important;}
								#num_edition,#choice_theme{width:250px !important;}
								.slider-for{margin-top:50px;background:#000;max-height:700px;}
								.slider-for .galerie-slide{height:780px;margin:auto;width:90%;}
								.slider-for .galerie-slide .inner-galerie-slide{max-height:670px !important;width:100%;margin:auto;}
								.slider-for .galerie-slide .inner-galerie-slide img{max-height:670px !important;margin:auto;}
								.slider-for .galerie-slide .inner-galerie-legend {max-height:100px !important;margin:auto;text-align:center;}
								.slider-for .galerie-slide .inner-galerie-legend .slide-legend{width:100%;color:#FFF;display:block;position:relative;padding-top:10px;padding-bottom:15px;min-height:38px !important;}

								.slider-nav{margin-top:25px;}
								.slider-nav .galerie-slide-nav .slick-slide{max-width:150px !important;margin-right:10px;}
								.slider-nav .galerie-slide-nav img{text-align:center;height:100% !important;margin:auto;width:auto !important;}
								.btn{font-size:0.900em !important;}
								@media(max-width:768px){
									.slider-for{margin-top:unset;background:#000;max-height:285px;height:285px;}
									.slider-for .galerie-slide{height:450px !important;margin:unset;}
									.slider-for .galerie-slide .inner-galerie-slide{max-height:100% !important;width:max-width:100% !important;margin:auto;}
									.slider-for .galerie-slide .inner-galerie-slide img{max-height:100% !important;margin:auto;}
									.slider-nav{margin-top:25px;display:none;}
									.slider-nav .galerie-slide-nav{max-width:150px;text-align:center;display:flex;}
									.slider-for .galerie-slide .inner-galerie-slide img{max-height: 100% !important;margin: auto;max-height: 90% !important;height: 248px !important;width: auto !important;max-width: unset;}
									.slider-for .slide-legend{float:left;color:#FFF;display:block;position:relative;padding-top:10px;padding-bottom:5px;min-height:20px !important;font-size:0.75em;}
								}
								@media(max-width:1200px){
									.slider-for .slick-list{max-height:unset;}
								}
							</style>
							<script>
								$(document).ready(function(){
									$("#num_edition").change(function(){
										var zone=$(this);
										if(zone.val()>0){
											window.location.href="/galeries-photos/"+zone.val();
										}
									});
									$("#zone-view-slider").fadeIn("slow");
									$("#zoom-slider").click(function(){
										$(this).fadeOut();
									});
								});
							</script>
						';
						echo $return_slider;
						echo $return_filter;
						echo'<div class="row">';
							echo $return_view_galerie;
						echo'</div>';
						//ajout de al zoom pour le zoom
						echo'<div id="zoom-slider" class="zoom-slider"><div class="inner-slider-zoom" id="inner-zoom-slider"></div></div>';
					} catch (PDOException $e) {
						echo 'Connexion échouée : ' . $e->getMessage();
					}
				?>
            </div>
        </div>

    @endsection
