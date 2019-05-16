@extends('admin._includes.partials.master')

@section('title')
    {{ $userDetails['name'] }} Exams!
@endsection
@section('content')
    <!-- PAGE CONTAINER-->
            <div class="page-container">

                <!-- MAIN CONTENT-->
                <div class="main-content" style="padding-top:30px;">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <h3 class="title-5 m-b-35">{{ $userDetails['name'] }} Exams : {{ $countExams }}</h3>
                            <div class="row">
                                @foreach($userDetails['exams'] as $exam)
                                <div class="col-md-6">
                                    <!-- DATA TABLE -->
                                    
                                    
                                    <!-- TOP CAMPAIGN-->
                                    <div class="top-campaign">
                                        <h3 class="title-3 m-b-30">{{ $exam->created_at }}</h3>
                                        <div class="table-responsive">
                                            <form action="{{ route('update.status',$exam->id) }}" method="post" novalidate="novalidate">
                                                {{ csrf_field() }}
                                                <table class="table table-top-campaign">
                                                <tbody>
                                                    <tr>
                                                        <td>passed</td>
                                                        <td>
                                                            @if($exam->passed == 1)
                                                            <button  class="btn btn-success btn-sm" name="passed" type="submit" class="item" value="1">passed</button>
                                                            @endif
                                                            @if($exam->passed == 0)
                                                            <button class="btn btn-danger btn-sm" name="passed" type="submit" value="0">failed</button>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Current Status</td>
                                                        <td>
                                                            @if($exam->current_status == 1)
                                                            <button name="cs" type="submit" class="btn btn-primary btn-sm" class="item" value="1">open</button>
                                                            @endif
                                                            @if($exam->current_status == 0)
                                                            <button name="cs" type="submit" class="btn btn-danger btn-sm" class="item" value="0"> closed</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>open</td>
                                                        <td>
                                                            @if($exam->open == 1)
                                                            <button name="open" type="submit" class="btn btn-primary btn-sm" class="item" value="1">open</button>
                                                            @endif
                                                            @if($exam->open == 0)
                                                            <button name="open" type="submit" class="btn btn-danger btn-sm" class="item" value="0"> closed</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pre A1</td>
                                                        <td>{{ $exam->pre_A1 }}</td>
                                                        <td>
                                                            @if($exam->pre_A1_pass == 1)
                                                            <button name="pre_A1_pass" type="submit" class="btn btn-success btn-sm" class="item" value="1">passed</button>
                                                            @endif
                                                            @if($exam->pre_A1_pass == 0)
                                                            <button name="pre_A1_pass" type="submit" class="btn btn-danger btn-sm" class="item" value="0"> failed</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>A1</td>
                                                        <td>{{ $exam->A1 }}</td>
                                                        <td>
                                                            @if($exam->A1_pass == 1)
                                                            <button name="A1_pass" type="submit" class="btn btn-success btn-sm" class="item" value="1">passed</button>
                                                            @endif
                                                            @if($exam->A1_pass == 0)
                                                            <button name="A1_pass" type="submit" class="btn btn-danger btn-sm" class="item" value="0"> failed</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>A2</td>
                                                        <td>{{ $exam->A2 }}</td>
                                                        <td>
                                                            @if($exam->A2_pass == 1)
                                                            <button name="A2_pass" type="submit" class="btn btn-success btn-sm" class="item" value="1">passed</button>
                                                            @endif
                                                            @if($exam->A2_pass == 0)
                                                            <button name="A2_pass" type="submit" class="btn btn-danger btn-sm" class="item" value="0"> failed</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>B1</td>
                                                        <td>{{ $exam->B1 }}</td>
                                                        <td>
                                                            @if($exam->B1_pass == 1)
                                                            <button name="B1_pass" type="submit" class="btn btn-success btn-sm" class="item" value="1">passed</button>
                                                            @endif
                                                            @if($exam->B1_pass == 0)
                                                            <button name="B1_pass" type="submit" class="btn btn-danger btn-sm" class="item" value="0"> failed</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>B2</td>
                                                        <td>{{ $exam->B2 }}</td>
                                                        <td>
                                                            @if($exam->B2_pass == 1)
                                                            <button name="B2_pass" type="submit" class="btn btn-success btn-sm" class="item" value="1">passed</button>
                                                            @endif
                                                            @if($exam->B2_pass == 0)
                                                            <button name="B2_pass" type="submit" class="btn btn-danger btn-sm" class="item" value="0"> failed</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </form>
                                            
                                        </div>
                                    </div>
                                    <!--  END TOP CAMPAIGN-->
                                </div>
                                @endforeach
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
@endsection