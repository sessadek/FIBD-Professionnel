<?php

namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;

class FormatMedia extends Model
{
  protected $table = 'bo_medias_formats';
  protected $primaryKey = 'id_formatMedia';

  public static function getNameFormat() {

      $format = self::where('delete_formatMedia', 0)->get();
      $tabFormat = [];
      foreach($format as $key => $value){
        $tabFormat[$value->short_code_formatMedia] = $value->dossier_formatMedia;
      }

      return $tabFormat;
    }
}
