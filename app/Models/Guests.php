<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{

    protected $table = 'guests';
    protected $primaryKey = 'idTamu';

    public $incrementing = false;
    public $timestamps = true;

    use HasFactory;
}
