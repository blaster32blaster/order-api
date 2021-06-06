<?php

namespace App\Services;

use App\Http\Requests\NewOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Support\Collection;

/**
 * handle order actions
 */
class OrderService
{
    /**
     * an OrderRepository instance
     *
     * @var OrderRepository $orderRepo
     */
    private $orderRepo;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    /**
     * get all orders
     *
     * @return Collection
     */
    public function index() : Collection
    {
        return $this->orderRepo->query()
            ->with([
                'technician',
                'key'
            ])
        ->get();
    }

    /**
     * store a new order
     *
     * @param NewOrderRequest $request
     * @return Order the created order
     */
    public function store(NewOrderRequest $request) : Order
    {
        return $this->orderRepo->store($request->all());
    }

    /**
     * update an order
     *
     * @param UpdateOrderRequest $request
     * @param Order $order
     * @return bool
     */
    public function update(UpdateOrderRequest $request, Order $order) : bool
    {
        return $this->orderRepo->update($request->all(), $order->id);
    }

    /**
     * destroy an order
     *
     * @param Order $order
     * @return bool
     */
    public function destroy(Order $order) : bool
    {
        return $this->orderRepo->destroy($order->id);
    }
}
