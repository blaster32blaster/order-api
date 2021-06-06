<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Key extends Model
{
    use HasFactory;

    /**
     * the fillable model atts
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price'
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
    public function vehicle() : BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class, 'vehicle_key', 'key_id', 'vehicle_id');
    }
}
