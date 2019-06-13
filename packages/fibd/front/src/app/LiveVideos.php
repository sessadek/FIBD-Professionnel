<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
/**
 *
 */
class LiveVideos extends Model{
	protected $table = 'bo_videos';
	protected $primaryKey = 'id_video';

	public function video() {
		return  self::where('is_live_video', 1)->orderBy('date_debut_video','desc')->orderBy('heure_debut_video','desc')->get();
	}
}
