<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request)
    {
        Reservation::create($request->validated());

        return redirect()->route('shops.detail', ['id' => $request->shop_id])->with('success', '予約が完了しました。');
    }
}
