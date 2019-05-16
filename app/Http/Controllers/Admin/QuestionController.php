<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Answer;
use App\Paragraph;
use Validator,Session,File;
class QuestionController extends Controller
{
    public function showAllQuestions($level)
    {
    	$questions = Question::where('level',$level)->with('answers')->get();
    	$soundsAndPargraphs = Paragraph::where('level',$level)->get();
        //$users = json_decode(json_encode($users));
        //echo "<pre>"; print_r($users); die;
        $level_name = '';
        switch ($level) {
           case '1':
               $level_name = 'Test pre A1';
               break;
           
           case '2':
               $level_name = 'Test A1';
               break;
               
           case '3':
               $level_name = 'Test A2';
               break;
               
           case '4':
               $level_name = 'Test B1';
               break;
               
           case '5':
               $level_name = 'Test b2';
               break;
       }
    	return view('admin.manage.questions.show')->with(compact('questions','level_name','soundsAndPargraphs'));
    }

    public function createQuestion()
    {
    	return view('admin.manage.questions.add_question');
    }

    public function createRecord()
    {
        return view('admin.manage.questions.add_record');
    }

    public function storeQuestion(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		
    	]);

    	if($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $data = $request->all();
        $data = json_decode(json_encode($data), true);
        //echo "<pre>"; print_r($data); die;

    	$question = new Question();
        if ($request->question) {
            $question->question = $request->question;
        }
    	$question->part = $request->part;
    	$question->level = $request->level;
        $question->multicorrect = $request->multicorrect;
    	$question->save();

        
        foreach ($data['char'] as $key=>$val) {
            $ans = new Answer;
            $ans->question_id = $question->id;
            $ans->char = $val;
            $ans->answer = $data['answer'][$key];
            $ans->correct = $data['status'][$key];
            $ans->save();
        }
        
    	return redirect()->back()->with('flash_message_success' , 'Question Has Been Added Successfully!');;
    }
    public function storeSoundOrParagraph(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
        ]);

        if($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator->errors());

        $data = $request->all();
        $data = json_decode(json_encode($data));
        //echo "<pre>"; print_r($data); die;

    
        $item = new Paragraph();
        $item->paragraph = $request->paragraph;
        $item->part = $request->part;
        $item->level = $request->level;
        $item->save();
        if ($request->has('file')) {
            $this->do_upload($request->file, $item->id);
        }
        
        
        //Session::flash('item', 'Has Been Added Successfully!');
        return redirect()->back();
    }


    public function editQuestion($question_id)
    {
        $questionDetails = Question::with('answers')->where('id',$question_id)->first();
        return view('admin.manage.questions.edit')->with(compact('questionDetails'));
    }

    public function updateQuestion(Request $request,$question_id)
    {
        $validator = Validator::make($request->all(), [

        ]);

        if($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator->errors());

         $data = $request->all();
        $data = json_decode(json_encode($data), true);
        //echo "<pre>"; print_r($data); die;

    	$question =  Question::find($question_id);
    	//return $question;
        if ($request->question) {
            $question->question = $request->question;
        }
    	$question->part = $request->part;
    	$question->level = $request->level;
        $question->multicorrect = $request->multicorrect;
    	$question->save();
        $ans = Answer::find($question->id);
        if($ans){
            foreach ($data['idAns'] as $key=>$val) {
                //$ans = Answer::find($val->id);
                Answer::where(['id'=>$data['idAns'][$key]])->update(['char'=>$data['char'][$key], 'answer'=>$data['answer'][$key],'correct'=>$data['status'][$key]]);
            }
        }else{
            
        }
        return redirect()->route('edit.question',$question_id);
    }
    
    public function editParagraph($paragraph_id)
    {
        $paragraphDetails = Paragraph::where('id',$paragraph_id)->first();
        return view('admin.manage.questions.edit_paragraph')->with(compact('paragraphDetails'));
    }

    public function updateParagraph(Request $request,$pararaph_id)
    {
        $validator = Validator::make($request->all(), [

        ]);

        if($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator->errors());

         $data = $request->all();
        $data = json_decode(json_encode($data), true);
        //echo "<pre>"; print_r($data); die;

    	$para =  Paragraph::find($pararaph_id);
    	//return $question;
        $para->paragraph = $request->paragraph;
    	$para->part = $request->part;
    	$para->level = $request->level;
    	$para->save();
        return redirect()->route('edit.paragraph',$pararaph_id);
    }

    public function do_upload($file, $item_id)
    {

        $input['file'] = time().'.'.$file->getClientOriginalExtension();
        $dist = public_path('../../public_html/exam/manage/sounds/');
        
        $file->move($dist, $input['file']);
        
        $pu = Paragraph::findOrFail($item_id);
        $pu->sound = $input['file'];
        $pu->save();

    }
    
    public function deleteQuestion($id = null)
    {
        if (!empty($id)) {
            Question::where(['id'=>$id])->delete();
            return redirect()->back();
        }
    }
    
    public function deleteParagraph($id = null)
    {
        if (!empty($id)) {
            Paragraph::where(['id'=>$id])->delete();
            return redirect()->back();
        }
    }
    
    private function delete_process($sound_id)
    {
    	$sound = Paragraph::findOrFail($sound_id);
        $s = public_path('../../public_html/exam/manage/sounds/').$sound->picture;
       
        if(file_exists($s)) 
        {
            
            File::delete($s);
        }
    }

    public function deleteSound($id = null) {
    	$this->delete_process($id);
    	$sound = Paragraph::findOrFail($id);
    	$sound->delete();

    	return redirect()->back();
    }
}
