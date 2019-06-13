@if(count($banniere) > 0)
<h2 style="background-image: url({{asset($banniere[0]->media->path_media.'/530x330/'.$banniere[0]->media->file_name_media)}}); background-repeat: no-repeat; background-size: cover; background-position: center; height:16vw;">
  <img style="opacity: 0;" src="{{asset($banniere[0]->media->path_media.'/530x330/'.$banniere[0]->media->file_name_media)}}" alt="{{ media_alt_if_not_null($banniere[0]->media->file_name_media) }}">
</h2>
<div class="h3" style="text-transform: uppercase;">{{ $banniere[0]->libelle_categoriePage }}</div>
<div class="p">{!! $banniere[0]->description_categoriePage !!}</div>
@else
<h2 style="background-image: url({{asset($pub->media->path_media.'/530x330/'.$pub->media->file_name_media)}}); background-repeat: no-repeat; background-size: cover; background-position: center; height:16vw;">
  <img style="opacity: 0;" src="{{asset($pub->media->path_media.'/530x330/'.$pub->media->file_name_media)}}" alt="{{ media_alt_if_not_null($pub->media->file_name_media) }}">
</h2>
@if($pub->titre_publicite != '')
<div class="h3" style="text-transform: uppercase;">{{ $pub->titre_publicite }}</div>
@endif
<div class="p">{!! $pub->small_description_publicite !!}</div>
@endif
