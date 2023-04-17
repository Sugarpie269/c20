<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'countries';
    protected $fillable = ['id','name','iso3'];
}
