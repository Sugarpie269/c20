<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class user_form_data extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user_form_data';
    protected $fillable = ['id'];
    use Searchable;
    public function searchableAs()
    {
        return 'unique_light_number';
    }
    public function toSearchableArray()
    {
        return [
            'unique_light_number' => $this->unique_light_number,
            'country' => $this->country,
            'created_date' => $this->created_date,
            'story' => $this->story,
            'id' => $this->id
        ];
    }
    public function country_name(): BelongsTo
    {
        return $this->belongsTo(countries::class,'country');
    }
    public function state_name(): BelongsTo
    {
        return $this->belongsTo(states::class,'state');
    }
    public function nomiee_country_name(): BelongsTo
    {
        return $this->belongsTo(countries::class,'naminee_country');
    }
    public function nomiee_state_name(): BelongsTo
    {
        return $this->belongsTo(states::class,'naminee_state');
    }
    public function likes() {
        return $this->hasMany(user_form_data_likes::class,'story_id');
    }
}
