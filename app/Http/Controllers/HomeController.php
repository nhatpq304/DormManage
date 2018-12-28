<?php

namespace App\Http\Controllers;

use App\Model\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.dashboard');
    }

    public function dangnhap()
    {
        return view('Client.login');
    }

    public function Profile()
    {
        return view('Client.profile');
    }

    public function ListOfNews()
    {
        return view('Client.ListOfNews');
    }

    public function NewsDetail()
    {
        return view('Client.NewsDetail');
    }

    public function BangGia()
    {
        return view('Client.BangGia');
    }

    function List(){
        $news= News::orderBy('created_at','DESC')->take(4)->get();
        return view('Client.index',compact('news'));
    }
    function GetNews(Request $request){
        $slug= $request->slug;
        $news = News::where('slug',$slug)->first();
        return view('Client.newsDetail', compact('news'));
    }
}
