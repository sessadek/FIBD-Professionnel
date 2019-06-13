<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
use Fibd\Front\App\Media;

/**
 *
 */
class AccreditationLieu extends Model
{
  protected $table = 'bo_accreditations_lieux_expositions';
  protected $primaryKey = 'id_lieuExposition';

}
