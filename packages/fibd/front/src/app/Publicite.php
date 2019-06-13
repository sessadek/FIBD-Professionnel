<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
use Fibd\Front\App\Media;

/**
 *
 */
class Publicite extends Model
{
  protected $table = 'ligne_publicites_emplacements';
  protected $primaryKey = 'id_primaire';

  public function pub(){
    return $this->hasOne(Pub::class, 'id_publicite', 'id_publicite');
  }

}
