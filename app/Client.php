<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_type','company_name', 'email', 'first_name', 'last_name', 'user_id', 'vat_number',
    ];
}
