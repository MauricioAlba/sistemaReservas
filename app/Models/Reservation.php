<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'environment_id',
        'startDateTime',
        'endDateTime',
        'confirmation'
    ];

    public function environment(): BelongsTo
    {
        return $this->belongsTo(Environment::class);
    }
    
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
