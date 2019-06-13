<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
use Fibd\Front\App\Media;

/**
 *
 */
class Pub extends Model
{
  protected $table = 'bo_publicites';
  protected $primaryKey = 'id_publicite';

  public function media(){
    return $this->hasOne(Media::class, 'id_media', 'id_media');
  }
}
