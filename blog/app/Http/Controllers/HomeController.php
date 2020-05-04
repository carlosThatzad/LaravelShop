<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
        public function index()
        {
        if(  $id=Auth::user()->id==1){
            $publications = Publication::orderBy('created_at', 'DESC')->paginate(10);
            foreach ($publications as $publication){
                $publication->image = "/images/".$publication->image;
            }
            return view('admin.tablehome')
                ->with('publications', $publications);
        }
        elseif ($id=Auth::user()->id==null){

            $publications = Publication::orderBy('created_at', 'DESC')->paginate(10);
            foreach ($publications as $publication){
                $publication->image = "/images/".$publication->image;
            }
            return view('welcome')
                ->with('publications', $publications);
        }
            $publications = Publication::orderBy('created_at', 'DESC')->paginate(10);
            foreach ($publications as $publication){
                $publication->image = "/images/".$publication->image;
            }
            return view('welcome')
                ->with('publications', $publications);

        }







}
