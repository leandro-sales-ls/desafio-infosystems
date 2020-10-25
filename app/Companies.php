<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $connection = 'mysql';
    protected $table = 'companies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name','email','website'
    ];

}
