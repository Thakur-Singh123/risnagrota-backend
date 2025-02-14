<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'date',
        'status',
    ];

    public function event_details()
    {
        return $this->hasMany(Event::class,'category_id')->with('event_images');
    }
}

