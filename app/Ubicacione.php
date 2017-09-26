<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ubicacione
 *
 * @package App
 * @property string $nombre
 * @property string $ciudad
 * @property string $estado
*/
class Ubicacione extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'ciudad', 'estado'];
    
    
}
