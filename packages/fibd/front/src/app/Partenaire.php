<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
use Fibd\Front\App\Media;

/**
 *
 */
class Partenaire extends Model
{
  protected $table = 'bo_partenaires';
  protected $primaryKey = 'id_partenaire';

  public function categorie(){
    return $this->belongsToMany(SiteCategorie::class, 'ligne_partenaires_categories', 'id_partenaire', 'id_categoriePage')->orderBy('ordre_linkPartenaire', 'asc');
  }
  public function media() {
    return $this->hasOne(Media::class, 'id_media', 'id_media');
  }
  public function children() {
    return $this->hasMany(Partenaire::class, 'id_parent', 'id_partenaire')->where('delete_typePartenaire', 0)->orderBy('ordre_typePartenaire', 'asc');
  }
}
