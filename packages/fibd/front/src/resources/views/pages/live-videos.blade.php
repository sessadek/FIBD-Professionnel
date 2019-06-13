@extends('front::layouts.default')
@section('content')

	<style>
		.embed-live{display:content !important;}
		.empty-live-review{font-size:0.7em};
		.container-live{display:contents !important;margin-top:25px;margin-bottom:25px;}
		@media (max-width:768px) {
			.empty-live-review{font-size:1em !important;}
			.container-live{min-height:unset !important;}
		}
	</style>
	<div class="header__middle--right d-flex d-md-none">
		<a href="{{ url('infos-pratiques/billetterie')}}" class="btn btn-danger">BILLETTERIE</a>
		<div class="b-search">
			<span class="search-overlay"></span>
			<!-- <a href="#" class="btn-search"></a> -->
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="title-header pt-75">
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
	<?php
	$id_direct_live=0;
	$tabInformationLiveVideos=array();
	?>
	@if(isset($liveVideos))
		@foreach($liveVideos as $video)
			<?php
				if($video->date_debut_video>=date("Y-m-d") && $video->heure_fin_video=='00:00:00' && $id_direct_live==0){
					$id_direct_live=$video->id_video;
					$tabInformationLiveVideos[$id_direct_live]['titre_video']=$video->titre_video;
					$tabInformationLiveVideos[$id_direct_live]['code_video']=$video->code_video;
				}
			?>
		@endforeach
		<div class="container container-live">
			<div class="row">
				<div class="col-sm-8" style="margin:auto;">
					<div class="content-header">
					@if($id_direct_live>0)
							<div class="embed-responsive embed-responsive-21by9 embed-live" >
								<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$tabInformationLiveVideos[$id_direct_live]['code_video']}}"  frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="height:570px;"></iframe>
							</div>
							<h2>{{ $tabInformationLiveVideos[$id_direct_live]['titre_video']}}</h2>
					@else
							<p class="text-center">Aucun live vidéo en cours, merci de revenir plus tard.<br><span class="empty-live-review">En attendant le prochain live, vous pouvez consulter les précédents ci-dessous.</span></p>
					@endif
					</div>
				</div>
			</div>
		</div>
	@endif
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="timeline timeline-actualites">
				@if(isset($liveVideos))
					@foreach($liveVideos as $video)
						@if($id_direct_live!=$video->id_video)
							<div class="b-timeline youtube node-video" >
								<div class="b-timeline__date">{{date('d/m/Y', strtotime($video->date_debut_video))}} {{date('H:i', strtotime($video->heure_debut_video))}}</div>
								<div class="b-timeline__body">
									<div class="embed-responsive embed-responsive-21by9">
										<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$video->code_video}}"  frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									</div>
									<h2>{{ $video->titre_video}}</h2>
								</div>
							</div>
						@endif
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection
