<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_komentar';
    protected $primaryKey = 'id';
}
