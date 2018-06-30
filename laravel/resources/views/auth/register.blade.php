@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12" style="border: 1px solid">
            <div class="panel panel-default">
                <div class="panel-heading mb-3 mt-3">
                    <span>Load the photos, before and after to be a mutant</span>
                </div>

                <div class="panel-body ">
                    <form class="form-horizontal" method="POST" action="{{ route('sendRequest') }}" enctype="multipart/form-data" id="applicationForm" accept-charset="UTF-8">

                        {{ csrf_field() }}
                       <div class="d-none" id="applicationDetails">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md control-label">E-Mail Address</label>

                                <div class="col-md">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required />

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                             <div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
                                <label for="reason" id="reason" class="col-md-4 control-label">Description</label>

                                <div class="col-md">
                                    <textarea id="reason" type="text" class="form-control" name="reason" value="{{ old('reason') }}" required autofocus
                                    placeholder="Short description of your powers"
                                    ></textarea>

                                    @if ($errors->has('reason'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('reason') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> 

                            <div class="form-group float-left">
                                <div class="col-md col-md-offset-4 ">
                                    <button type="button" class="btn btn-primary" id="appBack">
                                        Back
                                    </button>
                                </div>
                            </div>

                            <div class="form-group float-right">

                                <div class="col-md col-md-offset-4 ">
                                    <button type="submit" class="btn btn-primary d-none" id=
                                    "SendForm">
                                        Register
                                    </button>

                                    <button type="button" class="btn btn-primary" id="sendWarning" data-toggle="modal" data-target="#mdSendRequest">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>                                            

                        <div id=applicationPictures>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Before</span>
                              </div>
                              <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="pathBefore" name="pathBefore" accept="image/*" />
                                    <label class="custom-file-label" for="pathBefore">Choose file</label>
                              </div>
                            </div>
                        
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">After</span>
                                </div>
                                <div class="input-group-prepend custom-file">
                                    <input type="file" class="custom-file-input" id="pathAfter" accept="image/*" name="pathAfter"/>
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group float-left">
                                <div class="col-md pr-0 pl-0 ">
                                    <a href="/" class="btn btn-primary btn-xs">
                                    Go home
                                </a>
                                </div>
                            </div>
                            <div class="form-group float-right">
                                <div class="col-md pr-0 ">
                                    <button type="button" class="btn btn-primary" id="nextPhoto">
                                        Next
                                    </button>
                                </div>
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