<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
use Fibd\Front\App\Scopes\SiteInternetScope;
use Fibd\Front\App\Media;
use Fibd\Front\App\PageSite;

/**
 *
 */
class SiteCategorie extends Model
{
  protected $table = 'bo_sites_categories';
  protected $primaryKey = 'id_categoriePage';

  protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SiteInternetScope);
    }

  public function children() {
    return $this->hasMany(SiteCategorie::class, 'id_parent', 'id_categoriePage')->where('delete_categoriePage', 0)->where('is_publish_categoriePage', 1)->orderBy('ordre_categoriePage', 'asc');
  }
  public function media() {
    return $this->hasOne(Media::class, 'id_media', 'id_media');
  }

  public function PageSite() {
    return $this->hasMany(PageSite::class, 'id_categoriePage', 'id_categoriePage')->where('is_publish_pageSite', 1);
  }

  public function partenaire(){
    return $this->belongsToMany(Partenaire::class, 'ligne_partenaires_categories', 'id_categoriePage', 'id_partenaire')->orderBy('ordre_linkPartenaire', 'asc');
  }
  public function metadata(){
    return $this->hasOne(MetaData::class, 'meta_url_canonical_metaData', 'url_categoriePage');
  }
}
