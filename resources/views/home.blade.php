@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Hey {{ Auth::user()->name }}</h1>
                    @php
                        $max_exam_id = \App\Exam::where('user_id',Auth::user()->id)->max('id');
                        $exam = \App\Exam::where('id',$max_exam_id)->first();
                        //echo $exam;
                    @endphp
                    @if($exam['open'] == 1)
                    <a id="payment-button" href="{{ route('get.level') }}" class="btn btn-lg btn-info btn-block" >
                        <span id="payment-button-amount">go to exam</span>
                        <span id="payment-button-sending" style="display:none;">going</span>
                    </a>
                    @endif

                    @if($exam['open'] == 0)
                    <h3>you have no exams right now</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
