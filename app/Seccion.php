<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Seccion
 *
 * @package App
 * @property integer $id_ubicacion
 * @property string $nombre_seccion
 * @property integer $id_atributos
*/
class Seccion extends Model
{
    use SoftDeletes;

    protected $fillable = ['id_ubicacion', 'nombre_seccion', 'id_atributos'];
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setIdUbicacionAttribute($input)
    {
        $this->attributes['id_ubicacion'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setIdAtributosAttribute($input)
    {
        $this->attributes['id_atributos'] = $input ? $input : null;
    }
    
}
