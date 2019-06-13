<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
use Fibd\Front\App\PagesBlocs;
/**
 *
 */
class PageSite extends Model
{
  protected $table = 'bo_sites_pages';
  protected $primaryKey = 'id_pageSite';

  public function blocPage(){
    return $this->hasMany(PagesBlocs::class, 'id_pageSite', 'id_pageSite');
  }

  public function mediaContent(){
    return $this->hasMany(MediaContent::class, 'id_primaire', 'id_pageSite')->orderBy('ordre_link', 'asc');
  }


}
