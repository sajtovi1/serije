<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sezona extends Model
{
    use HasFactory;

    protected $table = 'sezone';

    protected $fillable = ['naziv_sezone'];
}
