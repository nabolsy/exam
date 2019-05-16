<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exam;
class ExamController extends Controller
{
    public function updateStatus(Request $request,$exam_id)
    {	
    	$exam = Exam::findOrFail($exam_id);
    	$data = $request->all();
    	//$data = json_decode(json_encode($data));
    	$keys = array_keys($data);
    	//get key
		$key = $keys[1];
		//get value
		$value = $data[$keys[1]];
		//return $key ."=>" .$data[$keys[1]];
		
		//echo $data[$keys[1]];

    		if ($key == "passed" &&  $value== 1) {
				$exam->passed = 0;
			}
			if($key == "passed" &&  $value== 0){
				$exam->passed = 1;
			}
			
			if ($key == "cs" &&  $value== 1) {
				$exam->current_status = 0;

			}
			if($key == "cs" &&  $value== 0){
				$exam->current_status = 1;
			}
    	

    		if ($key == "open" &&  $value== 1) {
				$exam->open = 0;

			}
			if($key == "open" &&  $value== 0){
				$exam->open = 1;

			}

			if ($key == "pre_A1_pass" &&  $value== 1) {
				$exam->pre_A1_pass = 0;
				$exam->pre_A1 = 0;
				$exam->current_level=1;
			}
			if($key == "pre_A1_pass" &&  $value== 0){
				$exam->pre_A1_pass = 1;
				$exam->current_level=$exam->current_level +1;
			}

			if ($key == "A1_pass" &&  $value== 1) {
				$exam->A1_pass = 0;
				$exam->A1 = 0;
				$exam->current_level=2;
			}
			if($key == "A1_pass" &&  $value== 0){
				$exam->A1_pass = 1;
				$exam->current_level=3;
			}

			if ($key == "A2_pass" &&  $value== 1) {
				$exam->A2_pass = 0;
				$exam->A2 = 0;
				$exam->current_level=3;
			}
			if($key == "A2_pass" &&  $value== 0){
				$exam->A2_pass = 1;
				$exam->current_level=4;
			}

			if ($key == "B1_pass" &&  $value== 1) {
				$exam->B1_pass = 0;
				$exam->B1 = 0;
				$exam->current_level=4;
			}
			if($key == "B1_pass" &&  $value== 0){
				$exam->B1_pass = 1;
				$exam->current_level=5;
			}
			
			if ($key == "B2_pass" &&  $value== 1) {
				$exam->B2_pass = 0;
				$exam->B1 = 0;
				$exam->current_level=5;
			}
			if($key == "B2_pass" &&  $value== 0){
				$exam->B2_pass = 1;
				$exam->current_level=6;
			}
    	

		$exam->save();

    	//$exam = json_decode(json_encode($exam));
    	//echo "<pre>"; print_r($exam); die;

    		
    		
    	

    	
    	/*$data = $request->all();
    	$data = json_decode(json_encode($data));
    	echo "<pre>"; print_r($data); die;*/
        return redirect()->back();
    }
}
