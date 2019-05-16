@extends('admin._includes.partials.master')

@section('title')
    Add User!
@endsection
@section('content')
    <!-- PAGE CONTAINER-->
            <div class="page-container">
                @if($errors->any())
                  <div class="error-msg">
                    @foreach($errors->all() as $error)
                      <p style="color: red">{{ $error }}</p>
                    @endforeach
                  </div>
                @endif

                @if(Session::has('flash_message_success'))
                  <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                    <span class="badge badge-pill badge-primary">Success</span>
                    {!! session('flash_message_success') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                @if(Session::has('flash_message_error'))
                  <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                    <span class="badge badge-pill badge-danger">Error</span>
                    {!! session('flash_message_error') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                <!-- MAIN CONTENT-->
                <div class="main-content" style="padding-top:30px;">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-header">users</div>
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h3 class="text-center title-2">Add New User</h3>
                                            </div>
                                            <hr>
                                            <form action="{{ route('store.user') }}" method="post" novalidate="novalidate">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">User Name</label>
                                                    <input id="cc-pament" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                                </div>
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Phone</label>
                                                    <input id="cc-pament" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false">
                                                </div>
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Password</label>
                                                    <input id="cc-pament" name="password" type="password" class="form-control" aria-required="true" aria-invalid="false">
                                                </div>
                                                <div>
                                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                        <span id="payment-button-amount">add user</span>
                                                        <span id="payment-button-sending" style="display:none;">adding…</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="copyright">
                                        <p>Copyright © 2018 MidRule <a href="#">MidRule</a>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT-->
                <!-- END PAGE CONTAINER-->
            </div>
@endsection