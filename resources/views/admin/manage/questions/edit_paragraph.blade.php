@extends('admin._includes.partials.master')

@section('title')
    Edit Paragraph!
@endsection
@section('content')
    <!-- PAGE CONTAINER-->
            <div class="page-container">

                <!-- MAIN CONTENT-->
                <div class="main-content" style="padding-top:30px;">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">paragraphs</div>
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h3 class="text-center title-2">Edit paragraph</h3>
                                            </div>
                                            <hr>
                                            <form action="{{ route('update.paragraph',$paragraphDetails->id) }}" method="post" novalidate="novalidate">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label class="control-label mb-1">Choose Level</label>
                                                    <select name="level" class="form-control" id="level" >
                                                        
                                                        <option value="1" <?php if($paragraphDetails->level==1){echo 'selected';} ?>>Test Pre-A1</option>
                                                        <option value="2" <?php if($paragraphDetails->level==2){echo 'selected';} ?>>Test A1</option>
                                                        <option value="3" <?php if($paragraphDetails->level==3){echo 'selected';} ?>>Test A2</option>
                                                        <option value="4" <?php if($paragraphDetails->level==4){echo 'selected';} ?>>Test B1</option>
                                                        <option value="5" <?php if($paragraphDetails->level==5){echo 'selected';} ?>>Test B2</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-1">Choose Part</label>
                                                    <select name="part" class="form-control" id="part" >
                                                        <option value="1" <?php if($paragraphDetails->part==1){echo 'selected';} ?>>pre</option>
                                                        <option value="2" <?php if($paragraphDetails->part==2){echo 'selected';} ?>>part 1</option>
                                                        <option value="3" <?php if($paragraphDetails->part==3){echo 'selected';} ?>>part 2</option>
                                                        <option value="4" <?php if($paragraphDetails->part==4){echo 'selected';} ?>>part 3</option>
                                                        <option value="5" <?php if($paragraphDetails->part==5){echo 'selected';} ?>>part 4</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Paragraph</label>
                                                    <textarea class="form-control" name="paragraph">{{$paragraphDetails->paragraph}}</textarea>
                                                </div>
                                                <div>
                                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                        <span id="payment-button-amount">Edit Paragraph</span>
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