@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xd-12 col-md-12" style="border: 1px solid">
            <div class="panel panel-default">
                <div class="panel-heading mb-3 mt-3">Register</div>

                <div class="panel-body ">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md control-label">E-Mail Address</label>

                            <div class="col-md">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@admin.com_12345" 
                                >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md control-label">Password</label>

                            <div class="col-md">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                    

                        <div class="form-group">
                            <div class="col-md col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
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