<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;

class UsersController extends Controller
{
    //
    public function profile(){
        $auth = Auth::user();
        $follow_count =DB::table('follows')
        ->where('follower',Auth::id())
        ->count();
        $follower_count =DB::table('follows')
        ->where('follow',Auth::id())
        ->count();
        $user =DB::table('users')
        ->where('id',Auth::id())
        ->first();
        $followed =DB::table('follows')
        ->where('follower',Auth::id())
        ->get();
        return view('users.profile',compact('auth','follow_count','follower_count','user','followed'));
    }

    public function search(){
        $auth = Auth::user();
        $follow_count =DB::table('follows')
        ->where('follower',Auth::id())
        ->count();
        $follower_count =DB::table('follows')
        ->where('follow',Auth::id())
        ->count();
        $users =DB::table('users')
        ->where('id','!=',Auth::id())
        ->get();
        $followed =DB::table('follows')
        ->where('follower',Auth::id())
        ->get();
        //dd($followed);
        return view('users.search',compact('auth','follow_count','follower_count','users','followed'));
    }

    public function result(Request $request){
        $auth = Auth::user();
        $follow_count =DB::table('follows')
        ->where('follower',Auth::id())
        ->count();
        $follower_count =DB::table('follows')
        ->where('follow',Auth::id())
        ->count();
        $key = $request->input('word');
        $users =DB::table('users')
        ->where('id','!=',Auth::id())
        ->where('username','LIKE',"%".$key."%")
        ->get();
        $followed =DB::table('follows')
        ->where('follower',Auth::id())
        ->get();
        return view('users.search',compact('auth','follow_count','follower_count','users','followed'));//ほぼ同じ画面に出るので同じにしている
    }

    public function upProfile(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $new_pw = $request->input('new_pw');
        $mail = $request->input('mail');
        $bio = $request->input('bio');
        $images = $request->file('images');

        //usename,mail,bio更新
        DB::table('users')
        ->where('id',Auth::id())
        ->update(
            ['username' => $username , 'mail' => $mail , 'bio' => $bio]
        );

        // new-pw
        if(!empty($new_pw)){
            // ハッシュ化させる
            DB::table('users')
            ->where('id',Auth::id())
            ->update(
                ['password' => Hash::make($new_pw)]
            );
        }

        // image
        $image = $request->file('image');

        if(!empty($image)){
            $file_name = $image->getClientOriginalName();

            // 取得したファイル名で保存
            $image->storeAs('public/images',$file_name);
            // ハッシュ化させる
            DB::table('users')
            ->where('id',Auth::id())
            ->update(
                ['images' => $file_name]
            );
        }
        return redirect('profile');
    }
}
