@extends('layouts.app')
@section('content')
<div class="site-section mt-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="owl-carousel hero-slide owl-style">
              <img src="{{url('resources/assets/front/images/'.$product->image.'')}}" alt="Image" class="img-fluid">
              <img src="{{url('resources/assets/front/images/'.$product->image.'')}}" alt="Image" class="img-fluid">
              <img src="{{url('resources/assets/front/images/'.$product->image.'')}}" alt="Image" class="img-fluid">
            </div>
          </div>
          <div class="col-lg-5 ml-auto">
            <h2 class="text-primary">{{$product->name}}</h2>
            <p>{{$product->details}}</p>
          <form class="form" method="post" action="{{route('cart',['id'=>$product->id])}}">
                               @csrf
            <div class="mb-5">

              <div class="input-group mb-3" style="max-width: 200px;">
               
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
               
                <input type="text" class="form-control text-center border mr-0" placeholder="" value="1"
                  aria-label="Example text with button addon" aria-describedby="button-addon1" name="quantity">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
              </div>
    
            </div>
            <button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</button>
            </form>          
          </div>
          <div class="col-lg-5">
              <div class="col-lg-12">
                  <div class="form-group">
                      <button type="button" onclick="myFunction()" style="background:none;border:none">
                         <a href="{{route('like',['id'=>$product->id])}}"> <i id="like" class="icon-heart"></i><i>{{$product->getLike()}}</i></a>
                      
                      </button>
            @if($userrate == null) 
                  <!-- Button trigger modal -->
                  <button type="button" style="background:none;border:none" data-toggle="modal" data-target="#bootstrap">
                      <i class="icon-comment"></i>
                  </button>

                  <!-- Modal -->
                  <div class="modal fade text-left" id="bootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h3 class="modal-title" id="myModalLabel35"> Review Form</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                     <form class="form" method="post" action="{{route('review',['id'=>$product->id])}}">
                               @csrf
                    <div class="modal-body">
                      <fieldset class="form-group floating-label-form-group">
                          <label for="title1">Your Rate</label>
                        <div class="my-rating" style="display:block;text-align:center;"></div>
                        <input type="text" value="" name="rate" id="rate" hidden>
                      </fieldset>
                    </div>
                      
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="review">Your Review</label>
                          <textarea class="form-control" id="review" rows="3" placeholder="Review" name="review"></textarea>
                        </fieldset>
                      </div>
                      <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                        <input type="submit"  class="btn btn-outline-primary btn-lg" value="confirm" name="save">
                      </div>
                  </form>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
            <div class="col-lg-12">
             
              @foreach ($review as $item)
              <p><i class="icon-user"></i> {{$item->User->name}}</p>
              <p>{{$item->review}}</p>
              @endforeach
                </div>
          </div>
        </div>
      </div>
    </div>
    <script>
    $(function(){
      $(".my-rating").starRating({
        starSize: 35,
        readOnly: false,
        callback: function(currentRating, $el){
          console.log('rated ' + currentRating);
          document.getElementById("rate").value = currentRating;
        }
      }); 
    });

    function myFunction() {
   var element = document.getElementById("like");
   element.classList.add("text-primary");
}


    </script>
    @endsection