<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epizoda extends Model
{
    use HasFactory;

    protected $table = 'epizode';

    protected $fillable = ['broj', 'opis', 'sezona_id', 'ocena'];
}
