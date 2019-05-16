@extends('admin._includes.partials.master')

@section('title')
    Edit Question!
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
                                        <div class="card-header">questions</div>
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h3 class="text-center title-2">Edit question</h3>
                                            </div>
                                            <hr>
                                            <form action="{{ route('update.question',$questionDetails->id) }}" method="post" novalidate="novalidate">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label class="control-label mb-1">Choose Level</label>
                                                    <select name="level" class="form-control" id="level" >
                                                        
                                                        <option value="1" <?php if($questionDetails->level==1){echo 'selected';} ?>>Test Pre-A1</option>
                                                        <option value="2" <?php if($questionDetails->level==2){echo 'selected';} ?>>Test A1</option>
                                                        <option value="3" <?php if($questionDetails->level==3){echo 'selected';} ?>>Test A2</option>
                                                        <option value="4" <?php if($questionDetails->level==4){echo 'selected';} ?>>Test B1</option>
                                                        <option value="5" <?php if($questionDetails->level==5){echo 'selected';} ?>>Test B2</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-1">Choose Part</label>
                                                    <select name="part" class="form-control" id="part" >
                                                        <option value="1" <?php if($questionDetails->part==1){echo 'selected';} ?>>pre</option>
                                                        <option value="2" <?php if($questionDetails->part==2){echo 'selected';} ?>>part 1</option>
                                                        <option value="3" <?php if($questionDetails->part==3){echo 'selected';} ?>>part 2</option>
                                                        <option value="4" <?php if($questionDetails->part==4){echo 'selected';} ?>>part 3</option>
                                                        <option value="5" <?php if($questionDetails->part==5){echo 'selected';} ?>>part 4</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label mb-1">Choose Type</label>
                                                    <select name="multicorrect" class="form-control" id="part" ">
                                                        <option value="1" <?php if($questionDetails->multicorrect==1){echo 'selected';} ?>>multi-correct</option>
                                                        <option value="0" <?php if($questionDetails->multicorrect==0){echo 'selected';} ?>>only one correct</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Question</label>
                                                    <textarea class="form-control" name="question">{{$questionDetails->question}}</textarea>
                                                </div>
                                                <div class="form-group">
                                              
                                                  <div class="field_wrapper"  >
                                                      @foreach($questionDetails['answers'] as $ans)
                                                      <div>
                                                          
                                                          <input value="{{ $ans->id }}" type="hidden" name="idAns[]" id="char" placeholder="char" style="width: 90px; border-radius: 4px; margin-right: 3px; margin-top: 2px; display: inline-block;" class="form-control" required/>
                                                          <input value="{{ $ans->char }}" type="text" name="char[]" id="char" placeholder="char" style="width: 90px; border-radius: 4px; margin-right: 3px; margin-top: 2px; display: inline-block;" class="form-control" required/>

                                                          <input value="{{ $ans->answer }}" type="text" name="answer[]" id="answer" placeholder="answer" style="width: 300px; border-radius: 4px; margin-right: 3px; margin-top: 2px; display: inline-block;" class="form-control" required/>

                                                          <select  name="status[]" class="form-control" style="width: 110px; border-radius: 4px; margin-right: 3px; margin-top: 2px; display: inline-block;">
                                                                <option value="1" <?php if($ans->correct==1){echo 'selected';} ?>>correct</option>
                                                                <option value="0" <?php if($ans->correct==0){echo 'selected';} ?>>not correct</option>
                                                           </select>
                                                          
                                                      </div>
                                                      @endforeach
                                                  </div>
                                                </div> 
                                                <div>
                                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                        <span id="payment-button-amount">Edit question</span>
                                                        <span id="payment-button-sending" style="display:none;">Editing…</span>
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