@extends('admin._includes.partials.master')
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
@section('title')
    Show Users!
@endsection
@section('content')
    <!-- PAGE CONTAINER-->
            <div class="page-container">
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
                                <div class="col-md-12">
                                    <!-- DATA TABLE -->
                                    <!--<a id="payment-button" href="{{ route('create.user') }}" class="btn btn-lg btn-info">
                                        <span id="payment-button-amount">add new user</span>
                                        <span id="payment-button-sending" style="display:none;">adding…</span>
                                    </a>-->
                                    <h3 class="title-5 m-b-35">All Users : <span id="total_records"></span></h3>
                                    <form class="form-header" action="#" method="GET">
                                        <input id="search" class="au-input au-input--xl" type="text" name="search" placeholder="Search for users..." style="width:100%;"/>
                                    </form>
                                    
                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2">
                                            <thead>
                                                <tr>
                                                    <th>name</th>
                                                    <th>email</th>
                                                    <th>has exam</th>
                                                    <th>Show Exams</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END DATA TABLE -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="copyright">
                                        <p>Copyright © 2018 MidRule.<a href="#">MidRule</a>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT-->
                <!-- END PAGE CONTAINER-->
            </div>
<script>
    $(document).ready(function(){
    
     fetch_customer_data();
    
     function fetch_customer_data(query = '')
     {
        $.ajax({
         url:"{{ route('live_search.action') }}",
         method:'GET',
         data:{query:query},
         dataType:'json',
         success:function(data)
         {
          $('tbody').html(data.table_data);
          $('#total_records').text(data.total_data);
         }
        })
     }
    
     $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      fetch_customer_data(query);
     });
    });
</script>
@endsection