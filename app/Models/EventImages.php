<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventImages extends Model
{
    use HasFactory;
    protected $table = 'event_image';
    protected $fillable = [
        'event_id',
        'event_images',
    ];
    
}
