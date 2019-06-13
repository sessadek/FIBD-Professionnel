<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
use Fibd\Front\App\SelectionsAlbum;
/**
 *
 */
class Selection extends Model
{
  protected $table = 'bo_selections';
  protected $primaryKey = 'id_selection';

  public function selectionAlb(){
    return $this->hasMany(SelectionsAlbum::class, 'id_selection', 'id_selection');
  }

}
