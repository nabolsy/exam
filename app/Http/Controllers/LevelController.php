<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\Question;
use App\Answer;
use App\Paragraph;
use Auth;
class LevelController extends Controller
{
    public function getFirstlevel()
    {
    	//check if user has exam or not
    	$max_exam_id = Exam::where('user_id',Auth::user()->id)->max('id');
        $exam = Exam::where('id',$max_exam_id)->first();

        if ($exam['open'] == 1) {
        	$part0preA1Questions = Question::with('answers')->where('level',1)->where('part',0)->orderBy('created_at', 'asc')->get();
            $part0preA1Recording = Paragraph::where('level',1)->where('part',0)->orderBy('created_at', 'desc')->first();
        	//$part0preA1Questions = json_decode(json_encode($part0preA1Questions));
        	//echo "<pre>"; print_r($part0preA1Questions);die;
        	$part1preA1Questions = Question::where('level',1)->where('part',1)->orderBy('created_at', 'asc')->get();
        	$part2preA1Questions = Question::where('level',1)->where('part',2)->orderBy('created_at', 'asc')->get();
        	$part3preA1Questions = Question::where('level',1)->where('part',3)->orderBy('created_at', 'asc')->get();
        	$part4preA1Questions = Question::where('level',1)->where('part',4)->orderBy('created_at', 'asc')->get();

    		return view('pre_A1')->with(compact('part0preA1Questions','part1preA1Questions','part2preA1Questions','part3preA1Questions','part4preA1Questions','part0preA1Recording'));
    	}else{
    		return 0;
    	}
    }

    public function getA1()
    {
    	//check if user has passed previous or not
    	$max_exam_id = Exam::where('user_id',Auth::user()->id)->max('id');
        $exam = Exam::where('id',$max_exam_id)->first();

        if ($exam['open'] == 1 && $exam['pre_A1_pass'] == 1) {
    		return view('A1')->with(compact('exam'));
    	}else{
    		return 0;
    	}
    }

    public function getA2()
    {
    	//check if user has passed previous or not
    	$max_exam_id = Exam::where('user_id',Auth::user()->id)->max('id');
        $exam = Exam::where('id',$max_exam_id)->first();

        if ($exam['open'] == 1 && $exam['pre_A1_pass'] == 1 && $exam['A1_pass'] == 1) {
    		return view('A2')->with(compact('exam'));
    	}else{
    		return 0;
    	}
    }

    public function getB1()
    {
    	//check if user has exam or not
    	$max_exam_id = Exam::where('user_id',Auth::user()->id)->max('id');
        $exam = Exam::where('id',$max_exam_id)->first();

        if ($exam['open'] == 1 && $exam['pre_A1_pass'] == 1 && $exam['A1_pass'] == 1 && $exam['A2_pass'] == 1) {
    		return view('B1')->with(compact('exam'));
    	}else{
    		return 0;
    	}
    }

    public function getB2()
    {
    	//check if user has exam or not
    	$max_exam_id = Exam::where('user_id',Auth::user()->id)->max('id');
        $exam = Exam::where('id',$max_exam_id)->first();

        if ($exam['open'] == 1 && $exam['pre_A1_pass'] == 1 && $exam['A1_pass'] == 1 && $exam['A2_pass'] == 1 && $exam['B1_pass'] == 1) {
    		return view('B2')->with(compact('exam'));
    	}else{
    		return 0;
    	}
    }


    public function getAnswerStatus(Request $request)
    {
        $questions  = Question::get();
        $data = $request->all();
        //$dd($data);
        //$data = json_encode($data);
       // return $data;
       echo "<pre>"; print_r($data); die;

        $total = 0;
        foreach ($questions as $value) {
            if ($value->multicorrect == 0) {
                if ($data['answers-'.$value->id]) {
                    $ans =  $data['answers-'.$value->id];
                    $ansData = Answer::find($ans);
                    if ($ansData->correct == 1) {
                        $total += 1;
                    }else{

                    }
                }else{

                }
                
            }

            if ($value->multicorrect == 1) {
                if ($data['answers-'.$value->id]) {
                    $ans =  $data['answers-'.$value->id];
                    foreach ($ans as $key => $value) {
                        $ansData = Answer::find($value);
                        if ($ansData->correct == 1) {
                            $total += 1;
                        }else{

                        }
                    }
                }else{

                }
                
                
                
            }
             
        }
        echo $total;
    }
}
