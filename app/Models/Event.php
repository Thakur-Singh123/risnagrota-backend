<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'status',
    ];
    public function event_images()
    {
        return $this->hasMany(EventImages::class, 'event_id');
    }
    public function event_category_relations()
    {
        return $this->hasMany(EventCat::class, 'event_id');
    }

    public function get_event_cat_realtion()
    {
        return $this->hasMany(EventCat::class, 'event_id')->with('category_lists');
    }
}
