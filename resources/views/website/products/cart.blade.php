@extends('layouts.app')
@section('content')
<div class="site-section  pb-0">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-7 section-title text-center mb-5">
            <h2 class="d-block">Cart</h2>
          </div>
        </div>
        <div class="row mb-5">
            <div class="site-blocks-table" style="width:95%">
              <table class="table ">
                <thead>
                 <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                  <form class="form" method="POST" action="{{route('cartupdate')}}">
                   
                               @csrf
                               
                @foreach ($products as $p)
                   
                  <tr>
                    <td class="product-thumbnail">
                      <img src="{{url('resources/assets/front/images/'.$p->product->image.'')}}" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 cart-product-title text-black">{{$p->product->name}}</h2>
                    </td>
                    <td>${{$p->product->price}}</td>
                    <td>
                    
                       
                      <div class="input-group" style="max-width: 120px;">
                       <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                       </div>
                        <input type="text" class="form-control text-center border mr-0" name="quantity[{{$p->id}}]" value="{{$p->quantity}}" placeholder=""
                          aria-label="Example text with button addon" aria-describedby="button-addon1">
                         <div class="input-group-append">
                           <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                         </div>
                      </div>
    
                    </td>
                    
                   <td >${{$p->product->price * $p->quantity}}</td>
                    <td><a href="{{route('deleteproduct' , ['id'=>$p->id])}}" class="btn btn-primary height-auto btn-sm">X</a></td>
                  </tr>
                @endforeach

                  <tr>
                  <td colspan="4"><h2 class="h5 cart-product-title text-black">Total Price is :</h2></td>
                  <td >${{$totalprice->Total}}</td>
                  <td ></td>
                  <tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>
        </div>
    
      </div>
</div>
<div class="site-section pt-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6">
                <button type="submit" class="btn btn-outline-primary btn-md btn-block">Update Cart</button>
              </div>
              
              <div class="col-md-6">
                <a href="{{url('/products')}}" class="btn btn-outline-primary btn-md btn-block">Continue Shopping</a>
              </div>
            </div>
            </form>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">${{$totalprice->Total}}</strong>
                  </div>
                </div>
    
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='{{route('checkout',['total'=>$totalprice])}}'">Proceed To
                      Checkout</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection