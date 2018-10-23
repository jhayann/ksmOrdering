<?php

namespace App;
/*
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
class Customer extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable; 
}
 */

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;
protected $primaryKey = 'id';
protected $table = 'customers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}