@extends('layouts.app')
@section('content')
<div class="site-wrap">
        <div class="site-section mt-5">
          <div class="container">
           <div class="row">
        @foreach ($search as $p)
         <div class="col-lg-4 mb-5 col-md-6">
          <div class="wine_v_1 text-center pb-4" >
            <a href="{{route('product',['id'=>$p->id])}}" class="thumbnail d-block mb-4"><img src="{{url('resources/assets/front/images/'.$p->image.'')}}" alt="Image" class="img-fluid" width="400px" height="300px"></a>
            <div>
              <h3 class="heading mb-1"><a href="#">{{$p->name}}</a></h3>
              <span class="price">${{$p->price}}</span>
            </div>
            

            <div class="wine-actions">
                
              <h3 class="heading-2"><a href="#">{{$p->name}}</a></h3>
              <span class="price d-block">${{$p->price}}</span>
              
              <div class="rating">
                 <div class="my-rating" data-rating="{{$p->getRate()}}"></div>
              </div>
               <script>
          $(function(){
              $(".my-rating").starRating({
               starSize: 35,
               readOnly: true
              }); 
           });
        </script>
              
              <a href="{{route('cartproducts',['id'=>$p->id])}}" class="btn add"><span class="icon-shopping-bag mr-3"></span> Add to Cart</a>
            </div>
          </div>
         </div>
        @endforeach
      </div>
          </div>
        </div>
</div>
@endsection