<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $connection = 'mysql';
    protected $table = 'employees';
    protected $primaryKey = 'id';

    protected $fillable = [
        'first_name','last_name','id_company','email','phone'
    ];

}
