<?php

namespace App\Http\Controllers;

use App\Service\PaymentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * @var PaymentService
     */
    private $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->middleware('auth');
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        return view('user.payment.index');
    }

    public function payment(Request $request)
    {
        $this->paymentService->payment($request);
        return redirect('/home');
    }
}
