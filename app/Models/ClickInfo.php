<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClickInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'geolocation',
        'browser',
        'is_bot',
        'clicked_at',
    ];

    public final function url() : BelongsTo
    {
        return $this->belongsTo(Url::class);
    }
}
