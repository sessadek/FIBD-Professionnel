<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
use Fibd\Front\App\Media;

/**
 *
 */
class AccrediteAuteur extends Model
{
  protected $table = 'bo_accreditations_societes';
  protected $primaryKey = 'id_societe';

  public function media() {
    return $this->hasOne(Media::class, 'id_media', 'id_media');
  }
  public function lieuExposition(){
    return $this->hasOne(AccreditationLieu::class, 'id_lieuExposition', 'id_lieuExposition');
  }
}
