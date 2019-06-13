<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
/**
 *
 */
class Intervenant extends Model
{
  protected $table = 'bo_programmations_intervenants';
  protected $primaryKey = 'id_intervenant';

  public function programmation(){
    return $this->belongsToMany(Programmation::class, 'ligne_programmations_intervenants', 'id_intervenant', 'id_programmation');
  }

  public function editeur(){
    return $this->hasOne(Editeur::class, 'id_editeurSelection', 'id_editeurSelection');
  }

  public function typeIntervenant(){

    return $this->hasOne(IntervenantType::class, 'id_typeIntervenant', 'id_typeIntervenant');
  }

}
