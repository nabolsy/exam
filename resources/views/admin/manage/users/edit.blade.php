@extends('admin._includes.partials.master')

@section('title')
    Edit User!
@endsection
@section('content')
    <!-- PAGE CONTAINER-->
            <div class="page-container">

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
                                                <h3 class="text-center title-2">Edit User</h3>
                                            </div>
                                            <hr>
                                            <form action="" method="post" novalidate="novalidate">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">User Name</label>
                                                    <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                                </div>
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Email</label>
                                                    <input id="cc-pament" name="cc-payment" type="email" class="form-control" aria-required="true" aria-invalid="false">
                                                </div>
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Password</label>
                                                    <input id="cc-pament" name="cc-payment" type="passsword" class="form-control" aria-required="true" aria-invalid="false">
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