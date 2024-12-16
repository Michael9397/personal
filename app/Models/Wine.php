<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    /** @use HasFactory<\Database\Factories\WineFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'time_tried' => 'date',
        'liked_it' => 'boolean',
    ];

    protected function timeTriedFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->time_tried ? $this->time_tried->format('F j, Y') : null
        );
    }


}
