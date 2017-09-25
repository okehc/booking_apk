<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Reservacion
 *
 * @package App
 * @property string $nombre
 * @property string $comentario
*/
class Reservacion extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'comentario'];
    
    
}
