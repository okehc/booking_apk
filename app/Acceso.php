<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Acceso
 *
 * @package App
 * @property string $nombre_acceso
 * @property integer $id_ubicacion
*/
class Acceso extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre_acceso', 'id_ubicacion'];
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setIdUbicacionAttribute($input)
    {
        $this->attributes['id_ubicacion'] = $input ? $input : null;
    }
    
}
