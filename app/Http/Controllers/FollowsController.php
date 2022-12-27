<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class FollowsController extends Controller
{
    //
    public function followList(){
        $auth = Auth::user();
        $users = DB::table('users')
        ->leftjoin('posts','users.id','posts.user_id')//結合
        ->select('users.id','users.username','posts.posts','users.images','posts.created_at')//カラム指定
        ->where('users.id','!=',Auth::id())//自分以外を抽出
        ->get();
        $follow_count =DB::table('follows')
        ->where('follower',Auth::id())
        ->count();
        $follower_count =DB::table('follows')
        ->where('follow',Auth::id())
        ->count();
        return view('follows.followList',compact('auth','follow_count','follower_count','users'));
    }
    public function followerList(){
        $auth = Auth::user();
        return view('follows.followerList');
    }
    public function otherProfile(){
        $auth = Auth::user();
        $users = DB::table('users')
        ->leftjoin('posts','users.id','posts.user_id')
        ->select('users.id','users.username','posts.posts','users.images','posts.created_at')
        ->where('users.id','!=',Auth::id())
        ->get();
        //フォロワーのプロフィール反映
        return view('follows.otherProfile',compact('auth','follow_count','follower_count','users'));
    }
//なぜfollow
//オートインクリメント　プライマリーキー
    public function addFollow($id){
        DB::table('follows')->insert([
            'follow' => $id,
            'follower' => Auth::id()
        ]);
        //更新したいので
        return redirect('search');
    }

    public function remFollow($id){//$idは送られた情報
        DB::table('follows')
            ->where('follow', $id)
            ->where('follower',Auth::id())//ログイン情報はauth
            ->delete();
        //更新したいので
        return redirect('search');
    }
}
