<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Environment extends Model
{
    use HasFactory;

    protected $fillable = [
        'environmentName',
        'quantity',
        'description'
    ];

    //Relaciones

    public function statusenvironment(): HasMany
    {
        return $this->hasMany(StatusEnvironment::class);
    }
    
    
    public function reservation(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
