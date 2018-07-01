@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md col-xm-12">
            <div class="table-responsive">
                <div class="card-header">Dashboard</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>                    
                    @else                        
                        <table class="table table-striped">
                            <thead>
                                  <tr>                                    
                                    <th class="text-center">Before</th>
                                    <th class="text-center">After</th>
                                    <th  class="text-center">Reason</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach($apps as $key=>$value)                       
                                      <tr data-id="{{$value->id}}">
                                            <td class="text-center">                
                                                <img src="data:image/jpeg;base64,{{ base64_encode($value->pathBefore) }}" class="img-fluid img-thumbnail rounded" width="100" height="100" 
                                               />                
                                            </td>
                                            <td class="text-center">                                         
                                                <img src="data:image/jpeg;base64,{{ base64_encode($value->pathAfter) }}" class="img-fluid img-thumbnail rounded" width="100" height="100" 
                                               />                
                                            </td>
                                            <td>{{$value->reason}}</td>
                                            <td>
                                                <button type="button" class="approveRequest btn btn-primary btn-xs">Approve</button>
                                            </td>
                                      </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif          
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdSendRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Thank you to send us your application, this will be pending to approval.
      </div>
      <div class="modal-footer">           
        <button type="button" class="btn btn-primary" id="btAccept">Accept</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>    
@stop