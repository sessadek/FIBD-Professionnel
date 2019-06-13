<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
/**
 *
 */
class Slider extends Model
{
  protected $table = 'bo_sliders_slides';
  protected $primaryKey = 'id_slide';

  public function media() {
    return $this->hasOne(Media::class, 'id_media', 'id_media');
  }
}
