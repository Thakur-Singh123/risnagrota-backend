<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCat extends Model
{
    use HasFactory;
    
    protected $table = 'event_category_relations';

    protected $fillable = ['event_id','cat_id'];

    public function event_details()
    {
        return $this->hasMany(categories::class,'category_id')->with('event_images');
    }


    public function category_lists(){
        return $this->hasmany(Categories::class, 'id','cat_id');
    }

}
