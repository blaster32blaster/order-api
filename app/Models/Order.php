<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    /**
     * the fillable model atts
     *
     * @var array
     */
    protected $fillable = [
        'key_id',
        'vehicle_id',
        'technician_id'
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
     * get the relationship
     *
     * @return BelongsTo
     */
    public function key() : BelongsTo
    {
        return $this->belongsTo(Key::class);
    }

    /**
     * get the relationship
     *
     * @return BelongsTo
     */
    public function technician() : BelongsTo
    {
        return $this->belongsTo(Technician::class);
    }

    /**
     * get the relationship
     *
     * @return BelongsTo
     */
    public function vehicle() : BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}
