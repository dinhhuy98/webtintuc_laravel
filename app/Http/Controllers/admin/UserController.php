<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        $data['user'] = User::orderBy('id','DESC')->paginate(10);
        $data['breadcrumb'] = array('Thành viên','Danh sách thể loại');
        return view('admin.users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data=[];
        $data['breadcrumb'] = array('Thành viên','Thêm mới');
        return view('admin.users.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        //
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect('admin/user/create')->with('mess','Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data=[];
        $data['breadcrumb'] = array('Thành viên','Thông tin chi tiết');
        $data['user'] = User::find($id);
        $data['comment'] = User::find($id)->comment;
        return view('admin.users.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $request->validate([
            'role'=>['bail','required','numeric','min:0','max:2'],
        ],[
            'role.required'=>"Có lỗi xảy ra!",
            'role.numeric'=>"Có lỗi xảy ra!",
            'role.min'=>"Có lỗi xảy ra!",
            'role.max'=>"Có lỗi xảy ra!",
        ]);
       
        $user = User::find($id);
        $user->role = $request->role;
        $user->save();
        return redirect('admin/user/'.$id.'/edit')->with('mess','Chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comments = User::find($id)->comment;
        foreach ($comments as $comment) {
            $comment->delete();
        }
        User::find($id)->delete();
        return redirect('admin/user');
    }
}
