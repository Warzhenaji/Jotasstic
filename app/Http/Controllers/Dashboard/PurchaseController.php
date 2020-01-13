<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PurchaseRequest;
use App\Http\Requests\CreatePurchaseRequest;

class PurchaseController extends Controller
{
    /**
     * Show user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('public.purchase');
    }

    public function store(CreatePurchaseRequest $request)
    {
        $purchaseRequest = new PurchaseRequest;

        $purchaseRequest->art_id = $request->art_id;
        $purchaseRequest->name = $request->name;
        $purchaseRequest->email = $request->email;

        $purchaseRequest->save();

        return response()->json($purchaseRequest);
    }

    public function update(PurchaseRequest $purchaseRequest)
    {
        $purchaseRequest->accepted_at = request()->input('accepted_at');
        $purchaseRequest->update();
        
        return response()->json($purchaseRequest);
    }
}