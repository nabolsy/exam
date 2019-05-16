@extends('admin._includes.partials.master')

@section('title')
    Add Sound Or Paragraph!
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

                @if (Session::has('item'))
                    <div class="alert alert-success">
                        {{ session('item') }}
                    </div>
                @endif

                <!-- MAIN CONTENT-->
                <div class="main-content" style="padding-top:30px;">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-header">Sounds and Paragraphs</div>
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h3 class="text-center title-2">Add New Sound Or Paragraph</h3>
                                            </div>
                                            <hr>
                                            <form action="{{ route('store.sound') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label class="control-label mb-1">Choose Level</label>
                                                    <select name="level" class="form-control" id="level">
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
                                                    Paragraph : <input type="radio" name="choosen" id="paragraph" value="paragraph" onchange="myfun(value)">

                                                    Sound : <input type="radio" name="choosen" id="sound" value="sound" onchange="myfun(value)">
                                                </div>
                                                <div class="form-group"  style="display: none;" id="p">
                                                    <label for="cc-payment" class="control-label mb-1">Paragraph</label>
                                                    <textarea class="form-control" name="paragraph"></textarea>
                                                </div>

                                                <div class="form-group" style="display: none;" id="s">
                                                  <label for="file" class="control-label mb-1">Upload Sound</label>
                                                  <input id="file" name="file" type="file" class="form-control">
                                                </div>
                                                <div>
                                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                        <span id="payment-button-amount">add</span>
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
            <script type="text/javascript">
                function myfun(val) {
                    var s = document.getElementById('s');
                    var p = document.getElementById('p');
                    if (val=="sound") 
                    {
                        s.style.display = "block";
                        p.style.display = "none";
                    }else{
                        p.style.display = "block";
                        s.style.display = "none";
                    }
                 } 
            </script>
@endsection