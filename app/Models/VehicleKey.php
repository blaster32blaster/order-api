<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleKey extends Model
{
    use HasFactory;

    protected $table = 'vehicle_key';

    /**
     * fetch the relation
     *
     * @return BelongsTo
     */
    public function key() : BelongsTo
    {
        return $this->belongsTo(Key::class);
    }

    /**
     * fetch the relation
     *
     * @return BelongsTo
     */
    public function vehicle() : BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}
