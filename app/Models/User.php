<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Store;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function stores(){
        return $this->hasMany(Store::class);
    }

    public function receipts(){
        return $this->hasMany(Receipt::class);
    }

    public function getManager($managerId){

        $manager = User::where('id', $managerId)->first();

        dd($manager->name);

        //return isset($manager->name) ? $manager : "-";

    }

    public function getWorkStore($operator_id){
        $operator = User::where('id',$operator_id)->first();

        $store = Store::where('id',$operator->store_id)->first();

        return isset($store->designation) ? $store->designation : '-';
    }
}
