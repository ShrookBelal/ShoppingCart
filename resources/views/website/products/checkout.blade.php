@extends('layouts.app')
@section('content')

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black font-heading-serif">Billing Details</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group row">
                 <table class="table site-block-order-table mb-5">
                <tr>
                <th>Personal Data</th>
                <th></th>
                </tr>
                    <tbody>
                      <tr>
                        <td class="text-black font-weight-bold"> <strong>Name :-</strong></td>
                        <td>{{$user->name}}</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Adress :-</strong></td>
                        <td >{{$user->address}}</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Phone :-</strong></td>
                        <td >{{$user->phone}}</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Email :-</strong></td>
                        <td >{{$user->email}}</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black font-heading-serif">Coupon Code</h2>
                <form class="form" method="post" action="{{route('promocode')}}">
                               @csrf
                <div class="p-3 p-lg-5 border">
                  <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                  <div class="input-group w-75">
                    <input type="text" class="form-control" name="code" id="c_code"  value="{{ old('code') }}" placeholder="Coupon Code" aria-label="Coupon Code"
                      aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary btn-sm rounded px-4" type="submit" id="button-addon2">Apply</button>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black font-heading-serif">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                    @foreach ($products as $p)
                      <tr>
                        <td>{{$p->product->name}} <strong class="mx-2">x</strong> {{$p->quantity}}</td>
                        <td>${{$p->product->price * $p->quantity}}</td>
                      </tr>
                      @endforeach
                     
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        
                        <td class="text-black font-weight-bold"><strong>${{$totalprice}}</strong></td>
                      </tr>
                    </tbody>
                  </table>
    
                  <div class="border mb-3 p-3 rounded">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button"
                        aria-expanded="false" aria-controls="collapsebank">Cash</a></h3>
    
                    <div class="collapse" id="collapsebank">
                      <div class="py-2 pl-0">
                        <p class="mb-0">Make your payment directly while recive your order. Please use your Order ID as the
                          payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                    </div>
                  </div>
    
                  <div class="border mb-5 p-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button"
                        aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>
    
                    
                    <div class="collapse" id="collapsepaypal">
                      <div class="py-2 pl-0">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                          payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                       <form method="post" action="{{route('getCheckout')}}">
                        @csrf
                         <input type="hidden" name="total" value="{{$totalprice}}" >
                         <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-lg btn-block">Pay</button>
                         </div>
                       </form>
                      </div>
                    </div>
                  </div>
                   
                  <div class="form-group">
                    <a href="{{route('order',['Total'=>$totalprice])}}" class="btn btn-primary btn-lg btn-block">Place
                      Order</a>
                  </div>
    
                </div>
              </div>
            </div>
    
          </div>
        </div> 
      </div>
    </div>
 @endsection