<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
use Fibd\Front\App\Media;

/**
 *
 */
class PartenaireType extends Model
{
  protected $table = 'bo_partenaires_types';
  protected $primaryKey = 'id_typePartenaire';

  public function children() {
    return $this->hasMany(PartenaireType::class, 'id_parent', 'id_typePartenaire')->where('delete_typePartenaire', 0)->orderBy('ordre_typePartenaire', 'asc');
  }
  public function partenaire(){
    return $this->hasMany(Partenaire::class, 'id_typePartenaire', 'id_typePartenaire')->where('delete_partenaire', 0)->orderBy('ordre_partenaire', 'asc');
  }
}
