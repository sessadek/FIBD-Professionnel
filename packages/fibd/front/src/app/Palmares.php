<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
use Fibd\Front\App\Media;

/**
 *
 */
class Palmares extends Model
{
  protected $table = 'bo_selections_prix_palmares';
  protected $primaryKey = 'id_prixPalmares';

  public function metadata(){
    return $this->hasOne(MetaData::class, 'meta_url_canonical_metaData', 'url_categoriePage');
  }
  public function attribution(){
    return $this->hasOne(LignesPalmares::class, 'id_prixPalmares', 'id_prixPalmares');
  }

}
