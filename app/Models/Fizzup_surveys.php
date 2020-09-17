<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fizzup_surveys extends Model
{
    use HasFactory;
    /**
     * @var array
     */
    protected $fillable = [
        'comment', 'note'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function picture()
    {
        return $this->hasMany(Fizzup_pictures::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Fizzup_customers::class);
    }
}
