<?php

namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
use Fibd\Front\App\FormatMedia;

class Media extends Model
{
  protected $table = 'bo_medias';
  protected $primaryKey = 'id_media';


  /**
  * Get the format image.
  *
  * @return string
  */
  public function getFormatImageAttribute() {

    return "{$this->path_media}/{$this->file_name_media}";
  }

  /**
   * Set the format image.
   *
   * @param  string  $key
   * @return void
   */
  public function setFormatImageAttribute($key) {

    $test = false;
    $path = explode('/', $this->path_media);
    $folder = FormatMedia::getNameFormat();
    $value = $key[0];
    $value1 = $key[1];
    $media = self::where('id_media', $this->attributes['id_media'])->get();
    $crop = self::where('actif_media', 1)->where('is_crop_media', 1)->get();

    foreach($folder as $keyFolder => $valueFolder){
      if($path[count($path)-1] == $valueFolder){
        $test = true;
      }
    }

    if($key[0] !== '0'){
      if($value1 !== 'nocrops'){
        foreach ($crop as $medias) {
          if($media[0]->id_media == $medias->id_parent){
            $this->path_media = $medias->path_media;
          }
        }
        $this->attributes['path_media'] = "{$this->path_media}/$folder[$value]";
      } else {
      
        if($path[count($path)-1] !== $folder[$value] && $test == ''){
          $this->attributes['path_media'] = "{$this->path_media}/$folder[$value]";
        } elseif ($path[count($path)-1] !== $folder[$value] && $test == 1) {
          $newpath='';
           for($i = 0; $i< count($path)-1; $i++){
             $newpath = $newpath.'/'.$path[$i];
           }
           $this->attributes['path_media'] = "{$newpath}/$folder[$value]";
         }
      }
    }
  }
}
