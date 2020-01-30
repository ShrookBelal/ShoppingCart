<?php

namespace App\Http\Controllers;

use App\order;
use App\cart;
use App\cartproduct;
use App\Orderproduct;
use App\User;
use DB;
use Auth;
use App\Promocode;
use App\Usercode;
use Illuminate\Http\Request;
use Paypal;


class OrderController extends Controller
{
    private $_apiContext;



    public function __construct()
    {
        $paypal = new \Netshell\Paypal\Paypal;
        $this->_apiContext = $paypal->ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret')
        );


        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));
    }





    public function getCheckout(Request $request)
    {
        $paypal = new \Netshell\Paypal\Paypal;
        $payer = $paypal->Payer();
        $payer->setPaymentMethod('paypal');

        $amount = $paypal->Amount();
        $amount->setCurrency('USD');
        $amount->setTotal($request->input('total'));

        $transaction = $paypal->Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Buy Premium  Plan on ' . $request->input('total'));

        $redirectUrls = $paypal->RedirectUrls();
        $redirectUrls->setReturnUrl(route('getDone'));
        $redirectUrls->setCancelUrl(route('getCancel'));

        $payment = $paypal->Payment();
        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        $response = $payment->create($this->_apiContext);
        $redirectUrl = $response->links[1]->href;


        return redirect()->to($redirectUrl);
    }
    public function getDone(Request $request)
    {
        $id = $request->get('paymentId');
        $token = $request->get('token');
        $payer_id = $request->get('PayerID');
        $paypal = new \Netshell\Paypal\Paypal;

        $payment = $paypal->getById($id, $this->_apiContext);


        $paymentExecution = $paypal->PaymentExecution();


        $paymentExecution->setPayerId($payer_id);
        $executePayment = $payment->execute($paymentExecution, $this->_apiContext);


        print_r($executePayment);
        return redirect()->route('checkout');
    }


    public function getCancel()
    {
        return redirect()->route('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $cartproducts = cartproduct::where('userid', $userId)->pluck('productid')->toArray();
        $userCart = cart::where('userid', Auth::user()->id)->first();
        $products = cartproduct::where('cartid', $userCart->id)->get();
        $productIds = cartproduct::where('cartid', $userCart->id)->pluck('productid')->toArray();
        $total = cartproduct::whereIN('productid', $productIds)->where('userid', Auth::user()->id)->select(DB::raw('sum(priceproduct*quantity) as Total'))->first();
        $totalprice = $total->Total;
        return view('website.products.checkout', compact('products', 'totalprice', 'user'));
    }

    public function checkcode(Request $request)
    {
        $codeststus = Promocode::where('code', $request->code)->first();

        $userCart = cart::where('userid', Auth::user()->id)->first();
        $productIds = cartproduct::where('cartid', $userCart->id)->pluck('productid')->toArray();
        $totalprice = cartproduct::whereIN('productid', $productIds)->select(DB::raw('sum(priceproduct*quantity) as Total'))->first();

        if ($codeststus != null) {

            if ($codeststus->status == 1) {
                $usercodeuse = Usercode::where('userid', Auth::user()->id)->first();
                if ($usercodeuse) {
                    if ($usercodeuse->times <  $codeststus->usetimes) {
                        $newtotal = $totalprice->Total - $codeststus->value;
                        //for calculate user times used promocode
                        $usercodeuse->times = ($usercodeuse->times) + 1;
                        $usercodeuse->update();
                        $totalprice = $newtotal;
                        $userId = Auth::id();
                        $user = User::find($userId);
                        $products = cartproduct::where('cartid', $userCart->id)->get();
                        alert()->success('your discount donn successfully', 'Done');
                        return view('website.products.checkout', compact('products', 'totalprice', 'user'));
                    } else {
                        alert()->warning('you have use this code by limit', 'Sorry');
                        return redirect()->back();
                    }
                } else {
                    $usertimes = new Usercode();
                    $usertimes->userid = Auth::user()->id;
                    $usertimes->codeid = $codeststus->id;
                    $usertimes->times = 1;
                    $usertimes->save();
                    $newtotal = $totalprice->Total - $codeststus->value;
                    $totalprice = $newtotal;
                    $userId = Auth::id();
                    $user = User::find($userId);
                    $products = cartproduct::where('cartid', $userCart->id)->get();
                    return view('website.products.checkout', compact('products', 'totalprice', 'user'));
                }
            } else {
                alert()->error('code is end', 'Sorry');
            return redirect()->back();
            }
        } else {
            alert()->error('Your Code is Invalde', 'Sorry');
            return redirect()->back();
        }
    }
    public function order($total)
    {
        $userId = Auth::id();
        $orderuser = new order();
        $orderuser->userid = $userId;
        $orderuser->totalPrice = $total;
        $orderuser->save();

        $cartproducts = cartproduct::where('userid', $userId)->get();
        foreach ($cartproducts as $cartproduct) {
            $orderdetails = new Orderproduct();
            $orderdetails->productid = $cartproduct->productid;
            $orderdetails->quantity = $cartproduct->quantity;
            $orderdetails->orderid = $orderuser->id;
            $orderdetails->price = $cartproduct->priceproduct;
            $orderdetails->save();
        }
        cart::where('userid', $userId)->delete();
        return view('website.products.order');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
