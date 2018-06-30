@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="alert alert-primary" role="alert">
      What kind of user are you?
    </div>  
    <div class="row align-items-center" >    

		@foreach($groups as $key=>$value)    					
            <div data-id="{{$value->id}}" class="grouptype col-sm-6 col-sm-offset-3 text-center">
                <span class="row justify-content-center">{{$value->name}}</span>                
                <label class="btn btn-primary">
                    <img src="{{asset('images/'.$value->imagePath)}}" alt="{{asset('images/'.$value->name)}}" 
                    class="img-thumbnail img-check" 
                    data-toggle="modal" data-target="#myModal"
                    style="height: 200px; width: 200px"
                     />
                </label>
            </div>
		@endforeach    
    </div>    
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>    
@stop