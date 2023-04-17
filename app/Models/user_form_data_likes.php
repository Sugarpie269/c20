<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_form_data_likes extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user_form_data_likes';
    protected $fillable = ['id','story_id'];
    
    public function story(){
        return $this->belongsTo(user_form_data::class,'story_id');
    }
}
