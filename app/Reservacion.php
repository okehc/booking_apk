<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Reservacion
 *
 * @package App
 * @property string $nombre_de_reunion
 * @property string $ubicacion
 * @property string $sala_de_juntas
 * @property string $fecha_de_inicio
 * @property string $fecha_de_finalizacion
 * @property tinyInteger $repeat
 * @property text $invitado
 * @property text $comentario
*/
class Reservacion extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre_de_reunion', 'ubicacion', 'sala_de_juntas', 'fecha_de_inicio', 'fecha_de_finalizacion', 'repeat', 'invitado', 'comentario'];
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setFechaDeInicioAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['fecha_de_inicio'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['fecha_de_inicio'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getFechaDeInicioAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setFechaDeFinalizacionAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['fecha_de_finalizacion'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['fecha_de_finalizacion'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getFechaDeFinalizacionAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }
    
}
