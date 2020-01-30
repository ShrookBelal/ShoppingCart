@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Laravel 5.8 Autocomplete Search using Bootstrap Typeahead JS - ItSolutionStuff.com</h1>   
    <input class="typeahead form-control" type="text">
</div>
   

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