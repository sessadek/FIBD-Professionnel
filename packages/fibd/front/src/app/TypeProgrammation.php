<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
/**
 *
 */
class TypeProgrammation extends Model
{
  protected $table = 'bo_programmations_types';
  protected $primaryKey = 'id_typeProgrammation';

  public function programmation(){
    return $this->hasMany(Programmation::class, 'id_typeProgrammation', 'id_typeProgrammation');
  }
}
