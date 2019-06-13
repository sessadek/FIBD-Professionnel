<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
/**
 *
 */
class MediaContent extends Model
{
  protected $table = 'ligne_media_content';
  protected $primaryKey = 'id_media';

  public function media(){
    return $this->hasOne(Media::class, 'id_media', 'id_media');
  }

}
