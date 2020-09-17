<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fizzup_customers extends Model
{
    use HasFactory;
    /**
     * @var array
     */
    protected $fillable = [
        'mail', 'pseudo'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function survey()
    {
        return $this->hasMany(Fizzup_surveys::class);
    }
}
