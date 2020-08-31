<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    //
    public function __construct() {
        $this->middleware(function ($request,$next)
        {
            session(['module_active' => 'user']);

            return $next($request);

        });
    }
    public function list(Request $request){

        $status =$request->input('status');
        $list_act = [
            'delete' => 'Xóa tạm thời',
        ];
        if ($status =='trash') {
            $list_act = [
                'restore' => 'Khôi phục',
                'permanentlyDeleted' =>'Xóa vĩnh viễn',
            ];
            $keywords = "";
            if($request->input('keywords')){
                $keywords = $request->input('keywords');
            }
            $admins = Admin::where('name','LIKE',"%{$keywords}%")->onlyTrashed()->Paginate(6);
        }
        else{
            $keywords = "";
            if($request->input('keywords')){
                $keywords = $request->input('keywords');
            }
            $admins = Admin::where('name','LIKE',"%{$keywords}%")->Paginate(6);
        };
        $count_user_active = Admin::count();
        $count_user_trash = Admin::onlyTrashed()->count();

        $count=[$count_user_active,$count_user_trash];
        // return $user;
        return view('admin.user.list',compact('admins','count','list_act'));
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
                    Admin::destroy($list_check);
                    return redirect('admin/user/list')->with('status','Đã xóa thành công');
                }
                if ($act=='restore') {
                    Admin::withTrashed()
                    ->whereIn('id',$list_check)
                    ->restore();
                    return redirect('admin/user/list')->with('status','Đã khôi phục thành công');
                }
                if ($act=='permanentlyDeleted') {
                    Admin::withTrashed()
                    ->whereIn('id',$list_check)
                    ->forceDelete();
                    return redirect('admin/user/list')->with('status','Đã xóa vĩnh viễn thành công');
                }
            }
            return redirect('admin/user/list')->with('status','Bạn không thể thao tác trên tài khoản cua bạn');
        }
        return redirect('admin/user/list')->with('status','Cần chọn phần tử để thao tác');
    }

    public function add(){
        return view('admin.user.add');
    }
    public function store(Request $request){

        $request->validate(
            [
                'name' => 'required', 'string', 'max:255',
                'email' => 'required', 'string', 'email', 'max:255', 'unique:admins',
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
            Admin::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'level'=> 0,
            ]);
        return redirect('admin/user/list')->with('status','Đã thêm thành viên thành công');
    }

    public function edit($id){
        $admin = Admin::find($id);
        return view('admin.user.edit',compact('admin'));

    }

    public function update(Request $request,$id){

        $request->validate(
            [
                'name' => 'bail|required | string| max:255',
                'password_old' =>'bail|required|string|min:8',
                'password_new' =>'bail|required|string|min:8',
                'password_confirmation' => 'bail|required|same:password_new',
            ],
            [
                'required' =>':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhất :min kí tự',
                'max' =>':attribute có độ dài tối đa :max kí tự',
                'same' => 'Xác nhận mật khẩu không thành công',
            ],
            [
                'name' => 'Tên người dùng',
                'password_old'=>'Mật khẩu cũ',
                'password_new'=>'Mật khẩu mới',
                'password_confirmation'=>'Mật khẩu nhập lại',
            ]);
        $password = Admin::find($id)->password;
        $password_old = Hash::make($request->input('password_old'));
        if($password = $password_old){
            Admin::where('id',$id)->update([
                'name' => $request->input('name'),
                'password' => Hash::make($request->input('password_new')),
            ]);
            return redirect('admin/user/list')->with('status','Đã cập nhật thành viên thành công');
        }
        else{
            return redirect('admin/user/list')->with('status','Mật khẩu cũ không đúng');
        }
    }

    public function delete(Request $request,$id){
        $status = $request->input('status');
        if ($status =='trash') {
            Admin::withTrashed()
            ->whereIn('id',$id)
            ->forceDelete();
            return redirect('admin/user/list')->with('status','Đã xóa thành công');
        }
        else{
            Admin::destroy($id);
            return redirect('admin/user/list')->with('status','Đã xóa thành công');
        }
    }
}
