<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Item
 *
 * @package App
 * @property string $item_nombre
 * @property text $item_descripcion
*/
class Item extends Model
{
    use SoftDeletes;

    protected $fillable = ['item_nombre', 'item_descripcion'];
    
    
}

                