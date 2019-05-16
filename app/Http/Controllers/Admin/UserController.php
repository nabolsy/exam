<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Exam;
use Validator,DB,Hash;
class UserController extends Controller
{
    public function index()
    {
        return view('live_search');
    }
    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('users')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      
      if($total_row > 0)
      {
       foreach($data as $row)
       {
           $max_exam_id = Exam::where('user_id',$row->id)->max('id');
           $exam = Exam::where('id',$max_exam_id)->first();
           if($exam['open']){
               $output .= '
                <tr class="tr-shadow">
                 <td>'.$row->name.'</td>
                 <td>'.$row->email.'</td>
                 <td>
                    <div class="btn btn-success btn-lg" class="item" data-toggle="tooltip" data-placement="top" title="'.$row->name.' already has exam">Has Exam</div>
                </td>
                <td>
                    <div class="table-data-feature">
                        <a href="http://exam.aqarcentral.com/manage/users/exams/'.$row->id.'" class="item" data-toggle="tooltip" data-placement="top" title="show">
                            <i class="zmdi zmdi-info"></i>
                        </a>
                    
                        
                    </div>
                </td>
                </tr>
                <tr class="spacer"></tr>
                ';
           }else{
               $output .= '
                <tr class="tr-shadow">
                 <td>'.$row->name.'</td>
                 <td>'.$row->email.'</td>
                 <td><a href="http://exam.aqarcentral.com/manage/users/assign-exam/'.$row->id.'" class="btn btn-primary btn-lg" class="item" data-toggle="tooltip" data-placement="top" title="give exam to '.$row->name.'">Give Exam</a></td>
                 <td>
                    <div class="table-data-feature">
                        <a href="http://exam.aqarcentral.com/manage/users/exams/'.$row->id.'" class="item" data-toggle="tooltip" data-placement="top" title="show">
                            <i class="zmdi zmdi-info"></i>
                        </a>
                    
                        
                    </div>
                </td>
                </tr>
                <tr class="spacer"></tr>
                ';
           }
        
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
    
    public function showAllUsers()
    {
    	$users = User::orderBy('created_at','desc')->get();
        //$users = json_decode(json_encode($users));
        //echo "<pre>"; print_r($users); die;
    	return view('admin.manage.users.show')->with(compact('users'));
    }

    public function createUser()
    {
    	return view('admin.manage.users.add');
    }

    public function storeUser(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'name' => 'required|max:255|unique:users',
    		'email' => 'required|max:255|unique:users',
            'password'=> 'required'
    	]);

    	if($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator->errors());

    	$user = new User();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = Hash::make($request->password);
    	$user->save();
    	//Session::flash('item', 'User Has Been Added Successfully!');
    	return redirect()->route('show.users');
    }

    public function editUser($user_id)
    {
        $userDetails = User::where('id',$user_id)->first();
        return view('admin.manage.users.edit')->with(compact('userDetails'));
    }

    public function updateUser($user_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password'=> 'required'
        ]);

        if($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator->errors());

        $user = User::findOrFail($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        Session::flash('item', 'User Has Been Updated Successfully!');
        return redirect()->route('edit.user',$user_id);
    }

    public function assignExamToUser($user_id)
    {
        $exam = new Exam();
        $exam->user_id = $user_id;
        $exam->open = 1;
        $exam->current_level = 1;
        $exam->current_status = 1;
        $exam->save();
        return redirect()->back();
    }

    public function showUserExams($user_id)
    {
        $userDetails = User::with('exams')->where('id',$user_id)->first();
        $countExams = Exam::where('user_id',$user_id)->count();
        //$userDetails = json_decode(json_encode($userDetails));
        //echo "<pre>"; print_r($userDetails); die;
        return view('admin.manage.users.exams')->with(compact('userDetails','countExams'));
    }
}
