<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Reservacion
 *
 * @package App
 * @property string $nombre_de_reunion
 * @property string $ubicacion
 * @property string $sala_de_juntas
 * @property integer $hora_duracion
 * @property integer $minuto_duracion
 * @property tinyInteger $repeat
 * @property text $comentario
*/
class Reservacion extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre_de_reunion', 'ubicacion', 'sala_de_juntas', 'hora_duracion', 'minuto_duracion', 'repeat', 'comentario'];
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setHoraDuracionAttribute($input)
    {
        $this->attributes['hora_duracion'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setMinutoDuracionAttribute($input)
    {
        $this->attributes['minuto_duracion'] = $input ? $input : null;
    }
    
}
