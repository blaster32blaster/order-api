<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * the fillable model atts
     *
     * @var array
     */
    protected $fillable = [
        'year',
        'make',
        'model',
        'vin'
    ];

    /**
     * the guarded model atts
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * return the relation
     *
     * @return BelongsToMany
     */
    public function key() : BelongsToMany
    {
        return $this->belongsToMany(Key::class, 'vehicle_key', 'vehicle_id', 'key_id');
    }
}
