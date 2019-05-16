@extends('admin._includes.partials.master')

@section('title')
    {{ $level_name }}!
@endsection
@section('content')
    <!-- PAGE CONTAINER-->
            <div class="page-container">

                <!-- MAIN CONTENT-->
                <div class="main-content" style="padding-top:30px;">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- DATA TABLE -->
                                    <h3 class="title-5 m-b-35">{{ $level_name }}</h3>
                                    <a id="payment-button" href="{{ route('create.question') }}" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">add new question</span>
                                        <span id="payment-button-sending" style="display:none;">adding…</span>
                                    </a>
                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2">
                                            <thead>
                                                <tr>
                                                    <th>part</th>
                                                    <th>Question</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($questions as $question)
                                                    <tr class="tr-shadow">
                                                        <td>{{ $question->part - 1 }}</td>
                                                        <td>
                                                            <span class="block-email">{{ $question->question }}</span>
                                                        </td>

                                                        @php
                                                                /*$correctanswers = \App\Question::where('question_id',$question->id)->where('correct',1)->orderBy('char','asc')->get();

                                                                $otheranswers = \App\Question::where('question_id',$question->id)->where('correct',0)->orderBy('char','asc')->get();*/
                                                        @endphp
                                                        <td>
                                                            <div class="table-data-feature">
                                                                <a href="{{ route('edit.question',$question->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <i class="zmdi zmdi-edit"></i>
                                                                </a>
                                                                <a href="{{ route('delete.question',$question->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                    <i class="zmdi zmdi-delete"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr-shadow">
                                                
                                                    </tr>
                                                    <tr class="spacer"></tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        
                                        <table class="table table-data2">
                                            <thead>
                                                <tr>
                                                    <th>part</th>
                                                    <th>Paragraph Or Sound</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($soundsAndPargraphs as $item)
                                                    <tr class="tr-shadow">
                                                        <td>{{ $item->part }}</td>
                                                        @if($item->paragraph !='')
                                                        <td>
                                                            <span class="block-email">{{ $item->paragraph }}</span>
                                                        </td>
                                                        @endif
                                                        @if($item->sound !='')
                                                        <td>
                                                            <span class="block-email">here are your sound you add in part {{ $item->part }}</span>
                                                        </td>
                                                        @endif
                                                        <td>
                                                            <div class="table-data-feature">
                                                                @if($item->paragraph !='')
                                                                <a href="{{ route('edit.paragraph',$item->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <i class="zmdi zmdi-edit"></i>
                                                                </a>
                                                                <a href="{{ route('delete.paragraph',$item->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                    <i class="zmdi zmdi-delete"></i>
                                                                </a>
                                                                @endif
                                                                @if($item->sound !='')
                                                                <a href="{{ route('delete.sound',$item->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                    <i class="zmdi zmdi-delete"></i>
                                                                </a>
                                                                @endif
                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr-shadow">
                                                
                                                    </tr>
                                                    <tr class="spacer"></tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END DATA TABLE -->
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