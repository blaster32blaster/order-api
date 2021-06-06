<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * an OrderService instance
     *
     * @var OrderService $orderService
     */
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : Response
    {
        return response($this->orderService->index());
    }

    /**
     * store a new order
     *
     * @param NewOrderRequest $request
     * @return Response
     */
    public function store(NewOrderRequest $request) : Response
    {
        return response($this->orderService->store($request));
    }

    /**
     * Update an order
     *
     * @param UpdateOrderRequest $request
     * @param Order $order
     * @return Response
     */
    public function update(UpdateOrderRequest $request, Order $order) : Response
    {
        return response($this->orderService->update($request, $order));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order) : Response
    {
        return response($this->orderService->destroy($order));
    }
}
