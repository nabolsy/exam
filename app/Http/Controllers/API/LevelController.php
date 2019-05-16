<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exam;
use App\Question;
use App\Answer;
use App\Paragraph;
use Auth ,JWTAuth,DB;
class LevelController extends Controller
{
    public function getlevel($level,$part)
    {
        $passed = 6;
        //get the jwt auth id
        $user = JWTAuth::parseToken()->authenticate();
        $userId = $user->id;
        
    	//check if user has exam or not
    	$max_exam_id = Exam::where('user_id',$userId)->max('id');
        $exam = Exam::where('id',$max_exam_id)->first();
        if ($exam['current_level'] == $passed) {
            DB::table('exams')
            ->where('id', $exam['id'])
            ->update(['passed' => 1])->update(['open' => 0]);
        }
        switch ($level) {
            case "1":
                if ($exam['open'] == 1 && $exam['current_status'] == 1) {
                	$list = [];
                	$questions = Question::with('answers')->where('level',$level)->where('part',$part)->orderBy('created_at', 'asc')->get();
                	//$paragraph = Paragraph::where('level',$level)->where('part',$part)->orderBy('created_at', 'desc')->first()->paragraph;
                	$paragraph = Paragraph::where('level',$level)->where('part',$part)->orderBy('created_at', 'desc')->first();
                	if($paragraph){
                	    $paragraph = $paragraph->paragraph;
                	}
                	//$sound = Paragraph::where('level',$level)->where('part',$part)->orderBy('created_at', 'desc')->first()->sound;
                	$sound = Paragraph::where('level',$level)->where('part',$part)->orderBy('created_at', 'desc')->first();
                	if($sound){
                	    $sound = $sound->sound;
                	}
                	foreach ($questions as $key => $row) {
                		$list[$key]['id'] = $row->id;
                		$list[$key]['question'] = $row->question;
                		$list[$key]['level'] = $row->level;
                		$list[$key]['part'] = $row->part;
                		$list[$key]['multicorrect'] = $row->multicorrect;
                		$list[$key]['correct_asnwers'] = Answer::where('question_id',$row->id)->where('correct',1)->count();
                		$list[$key]['answers'] = Answer::where('question_id',$row->id)->get();
                	}
                	 
            		try {
            		    
                        return response()->json(['paragraph'=>$paragraph,'sound'=>$sound,'data'=> $list], 200);
                        
                    } catch (JWTException $e) {
                        return response()->json(['error'=> 'failed to get data please try again!'], 500);
                    }
            	}else{
            		return response()->json(['error'=> 'this user has no exams yet!'], 500);
            	}
            	
                break;
            case "2":
                if ($exam['open'] == 1 && $exam['current_status'] == 1) {
                    if($exam['pre_A1_pass'] == 1){
                        $list = [];
                    	$questions = Question::with('answers')->where('level',$level)->where('part',$part)->orderBy('created_at', 'asc')->get();
                    	$paragraph = Paragraph::where('level',$level)->where('part',$part)->orderBy('created_at', 'desc')->first();
                    	if($paragraph){
                    	    $paragraph = $paragraph->paragraph;
                    	}
                    	$sound = Paragraph::where('level',$level)->where('part',$part)->orderBy('created_at', 'desc')->first();
                    	if($sound){
                    	    $sound = $sound->sound;
                    	}
                    	foreach ($questions as $key => $row) {
                    		$list[$key]['id'] = $row->id;
                    		$list[$key]['question'] = $row->question;
                    		$list[$key]['level'] = $row->level;
                    		$list[$key]['part'] = $row->part;
                    		$list[$key]['multicorrect'] = $row->multicorrect;
                    		$list[$key]['correct_asnwers'] = Answer::where('question_id',$row->id)->where('correct',1)->count();
                    		$list[$key]['answers'] = Answer::where('question_id',$row->id)->get();
                    	}

                		try {
                            return response()->json(['paragraph'=>$paragraph,'sound'=>$sound,'data'=> $list], 200);
                        } catch (JWTException $e) {
                            return response()->json(['error'=> 'failed to get data please try again!'], 500);
                        }
                    }else{
                        return response()->json(['error'=> 'you have to pass the previous levels!'], 500);
                    }
            	}else{
            		return response()->json(['error'=> 'this user has no exams yet!'], 500);
            	}
                break;
            case "3":
                if ($exam['open'] == 1 && $exam['current_status'] == 1) {
                    if($exam['pre_A1_pass'] == 1 && $exam['A1_pass'] == 1){
                        $list = [];
                    	$questions = Question::with('answers')->where('level',$level)->where('part',$part)->orderBy('created_at', 'asc')->get();
                    	$paragraph = Paragraph::where('level',$level)->where('part',$part)->orderBy('created_at', 'desc')->first();
                    	if($paragraph){
                    	    $paragraph = $paragraph->paragraph;
                    	}
                    	$sound = Paragraph::where('level',$level)->where('part',$part)->orderBy('created_at', 'desc')->first();
                    	if($sound){
                    	    $sound = $sound->sound;
                    	}
                    	foreach ($questions as $key => $row) {
                    		$list[$key]['id'] = $row->id;
                    		$list[$key]['question'] = $row->question;
                    		$list[$key]['level'] = $row->level;
                    		$list[$key]['part'] = $row->part;
                    		$list[$key]['multicorrect'] = $row->multicorrect;
                    		$list[$key]['correct_asnwers'] = Answer::where('question_id',$row->id)->where('correct',1)->count();
                    		$list[$key]['answers'] = Answer::where('question_id',$row->id)->get();
                    	}

                		try {
                            return response()->json(['paragraph'=>$paragraph,'sound'=>$sound,'data'=> $list], 200);
                        } catch (JWTException $e) {
                            return response()->json(['error'=> 'failed to get data please try again!'], 500);
                        }
                    }else{
                        return response()->json(['error'=> 'you have to pass the previous levels!'], 500);
                    }
            	}else{
            		return response()->json(['error'=> 'this user has no exams yet!'], 500);
            	}
                break;
            case "4":
                if ($exam['open'] == 1 && $exam['current_status'] == 1) {
                    if($exam['pre_A1_pass'] == 1 && $exam['A1_pass'] == 1 && $exam['A2_pass'] == 1){
                        $list = [];
                    	$questions = Question::with('answers')->where('level',$level)->where('part',$part)->orderBy('created_at', 'asc')->get();
                    	$paragraph = Paragraph::where('level',$level)->where('part',$part)->orderBy('created_at', 'desc')->first();
                    	if($paragraph){
                    	    $paragraph = $paragraph->paragraph;
                    	}
                    	$sound = Paragraph::where('level',$level)->where('part',$part)->orderBy('created_at', 'desc')->first();
                    	if($sound){
                    	    $sound = $sound->sound;
                    	}
                    	foreach ($questions as $key => $row) {
                    		$list[$key]['id'] = $row->id;
                    		$list[$key]['question'] = $row->question;
                    		$list[$key]['level'] = $row->level;
                    		$list[$key]['part'] = $row->part;
                    		$list[$key]['multicorrect'] = $row->multicorrect;
                    		$list[$key]['correct_asnwers'] = Answer::where('question_id',$row->id)->where('correct',1)->count();
                    		$list[$key]['answers'] = Answer::where('question_id',$row->id)->get();
                    	}

                		try {
                            return response()->json(['paragraph'=>$paragraph,'sound'=>$sound,'data'=> $list], 200);
                        } catch (JWTException $e) {
                            return response()->json(['error'=> 'failed to get data please try again!'], 500);
                        }
                    }else{
                        return response()->json(['error'=> 'you have to pass the previous levels!'], 500);
                    }
            	}else{
            		return response()->json(['error'=> 'this user has no exams yet!'], 500);
            	}
                break;
            case "5":
                if ($exam['open'] == 1 && $exam['current_status'] == 1) {
                    if($exam['pre_A1_pass'] == 1 && $exam['A1_pass'] == 1 && $exam['A2_pass'] == 1 && $exam['B1_pass'] == 1){
                        $list = [];
                    	$questions = Question::with('answers')->where('level',$level)->where('part',$part)->orderBy('created_at', 'asc')->get();
                    	$paragraph = Paragraph::where('level',$level)->where('part',$part)->orderBy('created_at', 'desc')->first();
                    	if($paragraph){
                    	    $paragraph = $paragraph->paragraph;
                    	}
                    	$sound = Paragraph::where('level',$level)->where('part',$part)->orderBy('created_at', 'desc')->first();
                    	if($sound){
                    	    $sound = $sound->sound;
                    	}
                    	foreach ($questions as $key => $row) {
                    		$list[$key]['id'] = $row->id;
                    		$list[$key]['question'] = $row->question;
                    		$list[$key]['level'] = $row->level;
                    		$list[$key]['part'] = $row->part;
                    		$list[$key]['multicorrect'] = $row->multicorrect;
                    		$list[$key]['correct_asnwers'] = Answer::where('question_id',$row->id)->where('correct',1)->count();
                    		$list[$key]['answers'] = Answer::where('question_id',$row->id)->get();
                    	}

                		try {
                            return response()->json(['paragraph'=>$paragraph,'sound'=>$sound,'data'=> $list], 200);
                        } catch (JWTException $e) {
                            return response()->json(['error'=> 'failed to get data please try again!'], 500);
                        }
                    }else{
                        return response()->json(['error'=> 'you have to pass the previous levels!'], 500);
                    }
            	}else{
            		return response()->json(['error'=> 'this user has no exams yet!'], 500);
            	}
                break;
        }
        
    }

    public function getAnswerStatus(Request $request)
    {
        //$questions  = Question::get();
        $data = $request->all();
        //$dd($data);
        //$data = json_decode(json_encode($data),true);
        //return $data['level'];
       //echo "<pre>"; print_r($data); die;
       $slimit = 19;
        $user = JWTAuth::parseToken()->authenticate();
        $userId = $user->id;
        
    	//check if user has exam or not
    	$max_exam_id = Exam::where('user_id',$userId)->max('id');
        $exam = Exam::where('id',$max_exam_id)->first();
       $total = 0;
       //calc total
       foreach($data as $key=>$value){
           //return $value;
           if($value['level'] != $exam['current_level']){
                return response()->json(['message'=>'Sorry invaild level'], 500); 
            }
           foreach ($value['answers'] as $val){
               //return $exam['current_level'];
               $ansData = Answer::find($val);
               if ($ansData['correct'] == 1) {
                    $total += 1;
                    
                }else{

                }
           }
       }
       //return $request->level;
       
       //store total
       switch ($exam['current_level']) {
            case '1':
                if($total >= $slimit){
                    DB::table('exams')
                        ->where('id', $exam['id'])
                        ->update(['pre_A1' => $total,'pre_A1_pass'=>1,'current_level' => $exam['current_level'] +1,'current_status' =>1]);
                        $exam = Exam::where('id',$max_exam_id)->first();
                        return response()->json(['message'=>'You Successfully pass this level','score'=>$total,'currentLevel'=>$exam['current_level'],'status'=>'pass'], 200);
                }else{
                    DB::table('exams')
                        ->where('id', $exam['id'])
                        ->update(['pre_A1' => $total,'pre_A1_pass'=>0,'passed'=>0,'open'=>0]);
                        $exam = Exam::where('id',$max_exam_id)->first();
                        return response()->json(['message'=>'Sorryy Failed to pass this level','score'=>$total,'currentLevel'=>$exam['current_level'],'status'=>'fail'], 200);
                }
                break;
                
            case '2':
                if($total >= $slimit){
                    DB::table('exams')
                        ->where('id', $exam['id'])
                        ->update(['A1' => $total,'A1_pass'=>1,'current_level' => $exam['current_level'] +1,'current_status' =>1]);
                        $exam = Exam::where('id',$max_exam_id)->first();
                        return response()->json(['message'=>'You Successfully pass this level','score'=>$total,'currentLevel'=>$exam['current_level'],'status'=>'pass'], 200);
                }else{
                    DB::table('exams')
                        ->where('id', $exam['id'])
                        ->update(['A1' => $total,'A1_pass'=>0,'passed'=>0,'open'=>0]);
                        $exam = Exam::where('id',$max_exam_id)->first();
                        return response()->json(['message'=>'Sorry Failed to pass this level','score'=>$total,'currentLevel'=>$exam['current_level'],'status'=>'fail'], 200);
                }
                break;
                
            case '3':
                
                if($total >= $slimit){
                    DB::table('exams')
                        ->where('id', $exam['id'])
                        ->update(['A2' => $total,'A2_pass'=>1,'current_level' => $exam['current_level'] +1,'current_status' =>1]);
                        $exam = Exam::where('id',$max_exam_id)->first();
                        return response()->json(['message'=>'You Successfully pass this level','score'=>$total,'currentLevel'=>$exam['current_level'],'status'=>'pass'], 200);
                }else{
                    DB::table('exams')
                        ->where('id', $exam['id'])
                        ->update(['A2' => $total,'A2_pass'=>0,'passed'=>0,'open'=>0]);
                        $exam = Exam::where('id',$max_exam_id)->first();
                        return response()->json(['message'=>'Sorry Failed to pass this level','score'=>$total,'currentLevel'=>$exam['current_level'],'status'=>'fail'], 200);
                }
                break;
                
            case '4':
                
                if($total >= $slimit){
                    DB::table('exams')
                        ->where('id', $exam['id'])
                        ->update(['B1' => $total,'B1_pass'=>1,'current_level' => $exam['current_level'] +1,'current_status' =>1]);
                        $exam = Exam::where('id',$max_exam_id)->first();
                        return response()->json(['message'=>'You Successfully pass this level','score'=>$total,'currentLevel'=>$exam['current_level'],'status'=>'pass'], 200);
                }else{
                    DB::table('exams')
                        ->where('id', $exam['id'])
                        ->update(['B1' => $total,'B1_pass'=>0,'passed'=>0,'open'=>0]);
                        $exam = Exam::where('id',$max_exam_id)->first();
                        return response()->json(['message'=>'Sorry Failed to pass this level','score'=>$total,'currentLevel'=>$exam['current_level'],'status'=>'fail'], 200);
                }
                break;
        
            case '5':
                $exam = Exam::where('id',$max_exam_id)->first();
                if($total >= $slimit){
                    DB::table('exams')
                        ->where('id', $exam['id'])
                        ->update(['B2' => $total,'B2_pass'=>1,'current_level' => $exam['current_level'] +1,'open' => 0,'passed'=>1,'current_status' =>1]);
                        $exam = Exam::where('id',$max_exam_id)->first();
                        return response()->json(['message'=>'You Successfully pass this level','score'=>$total,'currentLevel'=>$exam['current_level'],'status'=>'pass'], 200);
                }else{
                    DB::table('exams')
                        ->where('id', $exam['id'])
                        ->update(['B2' => $total,'B2_pass'=>0,'passed'=>0,'open' => 0,'passed'=>0,'open'=>0]);
                        $exam = Exam::where('id',$max_exam_id)->first();
                        return response()->json(['message'=>'Sorry Failed to pass this level','score'=>$total,'currentLevel'=>$exam['current_level'],'status'=>'fail'], 200);
                }
                break;
            case '6':
                
                if($exam['passed'] == 1){
                    $exam = Exam::where('id',$max_exam_id)->first();
                        return response()->json(['message'=>'You Successfully pass this level','currentLevel'=>$exam['current_level'],'status'=>'pass'], 200);
                }else{
                    $exam = Exam::where('id',$max_exam_id)->first();
                        return response()->json(['message'=>'Sorry Failed to pass this level','score'=>$total,'currentLevel'=>$exam['current_level'],'status'=>'fail'], 200);
                }
                break;
            
        }
       
       
        
        //$exam['current_level'] = $exam['current_level'] +1;
            
        
        
       
       
       
       
       
       
       
       /*foreach($data as $value){
           foreach ($value as $val){
               $ansData = Answer::find($val);
               if ($ansData->correct == 1) {
                    $total += 1;
                }else{

                }
           }
       }
        $user = JWTAuth::parseToken()->authenticate();
        $userId = $user->id;
        
    	//check if user has exam or not
    	$max_exam_id = Exam::where('user_id',$userId)->max('id');
        $exam = Exam::where('id',$max_exam_id)->first();
        if($total == 19){
            $exam['current_level'] = $exam['current_level'] +1;
            return response()->json(['message'=>'You Successfully pass this level','score'=>$total,'currentLevel'=>$exam['current_level']], 200);
        }else{
            return response()->json(['message'=>'Sorry Failed to pass this level','score'=>$total,'currentLevel'=>$exam['current_level']], 500);
        }*/
        
        //return $total;    
    }
    
    public function getCurrentLevel($userId)
    {
        $max_exam_id = Exam::where('user_id',$userId)->max('id');
        $exam = Exam::where('id',$max_exam_id)->where('open',1)->first();
        
        try {
                return response()->json(['message'=>'success','currentLevel'=>$exam['current_level']], 200);
        } catch (JWTException $e) {
                return response()->json(['error'=> 'failed to get data please try again!'], 500);
        }
        
    }
    
    public function status($id)
    {
        $max_exam_id = Exam::where('user_id',$id)->max('id');
        $exam = Exam::where('id',$max_exam_id)->where('open',1)->first();
  
        
        try {
                return response()->json(['message'=>'sucess','details'=>$exam], 200);
        } catch (JWTException $e) {
                return response()->json(['error'=> 'failed to get data please try again!'], 500);
        }
        
    }
    
    public function closeExam($userId)
    {
        $max_exam_id = Exam::where('user_id',$userId)->max('id');
        $exam = Exam::where('id',$max_exam_id)->where('open',1)->first();
         DB::table('exams')
            ->where('id', $exam['id'])
            ->update(['current_status' => 0]);
        
        try {
                return response()->json(['message'=>'successfully','currentLevel'=>$exam['current_level']], 200);
        } catch (JWTException $e) {
                return response()->json(['error'=> 'failed to get data please try again!'], 500);
        }
        
    }
}
