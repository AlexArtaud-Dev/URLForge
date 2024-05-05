<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Url extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'originalUrl',
        'slug',
        'title',
        'click_count',
        'max_click',
        'password',
        'expiration_date',
    ];

    protected function casts(): array
    {
        return [
            'expiration_date' => 'date',
        ];
    }

    public final function clickInfos() : HasMany
    {
        return $this->hasMany(ClickInfo::class);
    }
}
