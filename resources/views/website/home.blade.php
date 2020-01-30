@extends('layouts.app')
@section('content')
<section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb" style="margin-top:50px">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12 pr-1 aside-stretch">
                <form action="{{route('search')}}" method="post" class="booking-form">
	        		<div class="row">
							@csrf
							
						<input style="margin-top:20px" class="typeahead form-control" autocomplete="off" name="name" type="text">
	        			<div class="col-md d-flex py-md-4">
	        				<div class="form-group align-self-stretch d-flex align-items-end">
								
								<div class="wrap bg-white align-self-stretch py-3 px-4">
			      					<label for="#">Category</label>
			      					<div class="form-field">
			        					<div class="select-wrap">
			                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
			                    <select name="category" id="" class="form-control">
                                    <option value="">select category</option>
                                    @foreach ($categ as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                   @endforeach
			                    </select>
			                  </div>
				              </div>
				            </div>
		              </div>
	        			</div>
	        			<div class="col-md d-flex py-md-4">
	        				<div class="form-group align-self-stretch d-flex align-items-end">
	        					<div class="wrap bg-white align-self-stretch py-3 px-4">
			      					<label for="#">Price</label>
			      					<div class="form-field">
			        					<div class="select-wrap">
			                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
			                    <select name="price" id="" class="form-control">
                                    <option value="">Select Price</option>
                                    <option value="100">100$</option>
                                    <option value="200">200$</option>
                                    <option value="300">300$</option>
                                    <option value="400">400$</option>
			                    </select>
			                  </div>
				              </div>
							</div>
					  </div>
						</div>
	        			<div class="col-md d-flex">
	        				<div class="form-group d-flex align-self-stretch">
			              <button type="submit" class="btn btn-black align-self-stretch d-block" style="height:50px"><span>Search</span></a>
			            </div>
	        			</div>
	        		</div>
	        	</form>
	    		</div>
    		</div>
    	</div>
	</section> 
	
@endsection
@section('script')
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
@endsection