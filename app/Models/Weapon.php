<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    //
    protected $table = 'weapon';
    protected $primaryKey = 'id';

    const ONLINE = 1;
    const OFFLINE = 0;
}
