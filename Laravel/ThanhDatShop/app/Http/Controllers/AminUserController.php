<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AminUserController extends Controller
{
    //

    public function __construct() {
        $this->middleware(function ($request,$next)
        {
            session(['module_active' => 'user']);

            return $next($request);

        });
    }
    public function list(Request $request)
    {
        // $users = User::simplePaginate(3);
        $status =$request->input('status');

        $list_act = [
            'delete' => 'Xóa tạm thời',
        ];
        if ($status =='trash') {
            $list_act = [
                'restore' => 'Khôi phục',
                'permanentlyDeleted' =>'Xóa vĩnh viễn',
            ];
            $users = User::onlyTrashed()->Paginate(3);
        }else{
            $keywords = "";
            if($request->input('keywords')){
                $keywords = $request->input('keywords');
            }
            $users = User::where('name','LIKE',"%{$keywords}%")->Paginate(3);
        }
        $count_user_active = User::count();
        $count_user_trash = User::onlyTrashed()->count();
        $count=[$count_user_active,$count_user_trash];
        // return $user;
        return view('admin.user.list',compact('users','count','list_act'));

    }
    public function add()
    {

        $permission = Role::all();
        return view('admin.user.add',compact('permission'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required', 'string', 'max:255',
                'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
                'password' =>'required', 'string', 'min:8', 'confirmed',
            ],
            [
                'required' =>':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhất :min kí tự',
                'max' =>':attribute có độ dài tối đa :max kí tự',
                'confirmed' => 'Xác nhận mật khẩu không thành công',
            ],
            [
                'name' => 'Tên người dùng',
                'email' => 'Email',
                'password' => 'Mật khẩu',
            ]);
        //  return $request->all();
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id'=> $request->input('permission'),
        ]);

        return redirect('admin/user/list')->with('status','Đã thêm thành viên thành công');
    }
    public function delete($id)
    {
        if(Auth::id()!=$id){
            $user = User::find($id)->delete();
            return redirect('admin/user/list')->with('status','Đã xóa thành công');
        }else{
            return redirect('admin/user/list')->with('status','Xóa không thành công');
        }
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/user/edit',compact('user'));
    }
    public function update(Request $request,$id)
    {
        $request->validate(
            [
                'name' => 'required', 'string', 'max:255',
                'password' =>'required', 'string', 'min:8', 'confirmed',
            ],
            [
                'required' =>':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhất :min kí tự',
                'max' =>':attribute có độ dài tối đa :max kí tự',
                'confirmed' => 'Xác nhận mật khẩu không thành công',
            ],
            [
                'name' => 'Tên người dùng',
                'password' => 'Mật khẩu',
            ]);

        User::where('id',$id)->update([
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect('admin/user/list')->with('status','Đã cập nhật thành công');
    }
    public function action(Request $request)
    {
        $list_check =$request->input('list_check');
        if($list_check){
            foreach ($list_check as $k => $v) {
                if(Auth::id() == $v){
                    unset($list_check[$k]);
                }
            }
            if(!empty($list_check)){
                $act = $request->input('act');
                if ($act =='delete') {
                    User::destroy($list_check);
                    return redirect('admin/user/list')->with('status','Đã xóa thành công');
                }
                if ($act=='restore') {
                    User::withTrashed()
                    ->whereIn('id',$list_check)
                    ->restore();
                    return redirect('admin/user/list')->with('status','Đã khôi phục thành công');
                }
                if ($act=='permanentlyDeleted') {
                    User::withTrashed()
                    ->whereIn('id',$list_check)
                    ->forceDelete();
                    return redirect('admin/user/list')->with('status','Đã xóa vĩnh viễn thành công');
                }
            }
            return redirect('admin/user/list')->with('status','Bạn không thể thao tác trên tài khoản cua bạn');
        }
        return redirect('admin/user/list')->with('status','Cần chọn phần tử để thao tác');
    }
}
