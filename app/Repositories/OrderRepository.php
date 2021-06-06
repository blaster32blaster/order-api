<?php

namespace App\Repositories;

use App\Models\Key;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * OrderRepository
 * @package App\Repositories
 */
class OrderRepository
{
    /**
     * @var Order $order
     */
    protected $order;

    /**
     * OrderRepository constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

     /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all() : Collection
    {
        return $this->order->all();
    }

    /**
     * @param array $data
     * @return Order
     */
    public function store(array $data) : ?Order
    {
        $key = Key::find($data['key_id']);
        $vehicle = $key->vehicle->first();
        $data['vehicle_id'] = $vehicle->id;
        return $this->order->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @return bool
     */
    public function update(array $data, $id) : bool
    {
        $sub = $this->order->find($id);
        return $sub->update($data);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id) : bool
    {
        return $this->order->destroy($id);
    }

    /**
     * @param $id
     * @return Order
     */
    public function show($id) : Order
    {
        return $this->order->findOrFail($id);
    }

    /**
     * get a builder for the model
     *
     * @return Builder
     */
    public function query() : Builder
    {
        return $this->order->query();
    }
}
