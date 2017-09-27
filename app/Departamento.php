<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Departamento
 *
 * @package App
 * @property string $departamento
 * @property string $descripcion
*/
class Departamento extends Model
{
    use SoftDeletes;

    protected $fillable = ['departamento', 'descripcion'];
    
    
}

                