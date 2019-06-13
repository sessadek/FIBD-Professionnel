<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
/**
 *
 */
class MetaData extends Model
{
  protected $table = 'bo_sites_metadatas';
  protected $primaryKey = 'id_metaData';

  public function media(){
    return $this->hasOne(Media::class, 'id_media', 'id_media');
  }

}
