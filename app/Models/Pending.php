<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pending extends Model
{
    protected $fillable = [
        'title',
        'description',
        'completed',
    ];

    protected function casts(): array
    {
        return [
            'completed' => 'boolean',
        ];
    }
}
