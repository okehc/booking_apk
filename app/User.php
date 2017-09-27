<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property integer $ubicacion
 * @property integer $departamento
 * @property string $extension
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'apellido_paterno', 'apellido_materno', 'ubicacion', 'departamento', 'extension', 'email', 'password', 'remember_token', 'role_id'];
    
 

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setUbicacionAttribute($input)
    {
        $this->attributes['ubicacion'] = $input ? $input : null;
    }


    /**
     * Set attribute to money format
     * @param $input
     */
    public function setDepartamentoAttribute($input)
    {
        $this->attributes['departamento'] = $input ? $input : null;
    }



    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }


    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    
    

    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPassword($token));
    }
}
