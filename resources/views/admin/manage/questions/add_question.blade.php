@extends('admin._includes.partials.master')

@section('title')
    Add Question!
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
                                        <div class="card-header">questions</div>
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h3 class="text-center title-2">Add New Question</h3>
                                            </div>
                                            <hr>
                                            <form action="{{ route('store.question') }}" method="post" novalidate="novalidate">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label class="control-label mb-1">Choose Level</label>
                                                    <select name="level" class="form-control" id="level" >
                                                        <option value="1">Test Pre-A1</option>
                                                        <option value="2">Test A1</option>
                                                        <option value="3">Test A2</option>
                                                        <option value="4">Test B1</option>
                                                        <option value="5">Test B2</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-1">Choose Part</label>
                                                    <select name="part" class="form-control" id="part">
                                                        <option value="1">pre</option>
                                                        <option value="2">part 1</option>
                                                        <option value="3">part 2</option>
                                                        <option value="4">part 3</option>
                                                        <option value="5">part 4</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label mb-1">Choose Type</label>
                                                    <select name="multicorrect" class="form-control" id="part">
                                                        <option value="1">multi-correct</option>
                                                        <option value="0">only one correct</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Question</label>
                                                    <textarea class="form-control" name="question"></textarea>
                                                </div>
                                                <div class="form-group">
                                              
                                                  <div class="field_wrapper"  >
                                                      <div>
                                                          <input type="text" name="char[]" id="char" placeholder="char" style="width: 90px; border-radius: 4px; margin-right: 3px; margin-top: 2px; display: inline-block;" class="form-control" required/>

                                                          <input type="text" name="answer[]" id="answer" placeholder="answer" style="width: 300px; border-radius: 4px; margin-right: 3px; margin-top: 2px; display: inline-block;" class="form-control" required/>

                                                          <select name="status[]" class="form-control" style="width: 110px; border-radius: 4px; margin-right: 3px; margin-top: 2px; display: inline-block;">
                                                                <option value="1">correct</option>
                                                                <option value="0">not correct</option>
                                                           </select>
                                                          <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                                      </div>
                                                  </div>
                                                </div> 
                                                <div>
                                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                        <span id="payment-button-amount">add question</span>
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
            <!-- Add Remove fields JQUERY Dynamically -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          var maxField = 10; //Input fields increment limitation
          var addButton = $('.add_button'); //Add button selector
          var wrapper = $('.field_wrapper'); //Input field wrapper
          var fieldHTML = '<div class="field_wrapper"><input type="text" name="char[]" id="char" placeholder="char" style="width: 90px; border-radius: 4px; margin-right: 3px; margin-top: 2px; display: inline-block;" class="form-control"/> <input type="text" name="answer[]" id="answer" placeholder="answer" style="width: 300px; border-radius: 4px; margin-right: 3px; margin-top: 2px; display: inline-block;" class="form-control" required/><select name="status[]" class="form-control" style="width: 110px; border-radius: 4px; margin-right: 3px; margin-top: 2px; display: inline-block;"><option value="1">correct</option><option value="0">not correct</option></select> <a href="javascript:void(0);" class="remove_button">Remove</a></div></div>'; //New input field html 
          var x = 1; //Initial field counter is 1
          
          //Once add button is clicked
          $(addButton).click(function(){
              //Check maximum number of input fields
              if(x < maxField){ 
                  x++; //Increment field counter
                  $(wrapper).append(fieldHTML); //Add field html
              }
          });
          
          //Once remove button is clicked
          $(wrapper).on('click', '.remove_button', function(e){
              e.preventDefault();
              $(this).parent('div').remove(); //Remove field html
              x--; //Decrement field counter
          });
          });
     </script>

      <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        });
    </script>
@endsection