<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
/**
 *
 */
class Programmation extends Model
{
  protected $table = 'bo_programmations';
  protected $primaryKey = 'id_programmation';

  public function intervenant(){
    return $this->belongsToMany(Intervenant::class, 'ligne_programmations_intervenants', 'id_programmation', 'id_intervenant');
  }

  public function media() {
    return $this->hasOne(Media::class, 'id_media', 'id_media');
  }

  public function type() {
    return $this->hasOne(TypeProgrammation::class, 'id_typeProgrammation', 'id_typeProgrammation');
  }

  public function lieu() {
    return $this->hasOne(Lieux::class, 'id_lieu', 'id_lieu');
  }
  public function metadata(){
    return $this->hasOne(MetaData::class, 'meta_url_canonical_metaData', 'url_categoriePage');
  }
  public function public(){
    return $this->hasOne(Peggy::class, 'id_public', 'id_public');
  }
  public function partenaire(){
    return $this->belongsToMany(Partenaire::class, 'ligne_partenaires_programmations', 'id_programmation', 'id_partenaire');
  }
}
