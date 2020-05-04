<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 4/05/20
 * Time: 0:29
 */

namespace App\Http\Controllers;


use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class UsersController extends Controller
{
    Protected $resourceName = "users";
    protected $repositoryName = User::class;
    public function usercreate(){



        return view('usuarioscreate');
    }


    public function userstore(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'lastname' => 'required',
            'email' =>'required',
            'password' =>'required',
            'telephone'=>'required',
            'role'=>''

        ]);


        if(!empty($request->get('password'))){
            $request['password']= bcrypt($request->get('password'));

        }
        User::create($request->all());




        $users=User::all();
        $publications = Publication::orderBy('created_at', 'DESC')->paginate(10);
        foreach ($publications as $publication){
            $publication->image = "/images/".$publication->image;
        }
        return view('welcome')->with('publications', $publications);

    }
public function login(){

    if(\Auth::check()){
       $id=Auth::user()->id;
        $publications=Publication::where('user_id','=',$id)->get();

        return view('publicationstable')->with('publications',$publications);
    }
    return view('usuariologin');

}
    public function validation(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);


       $usuario=User::where('email','=',$request->email)->first();

        $credentials = $request->only('email', 'password');

         if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {

             $id=$usuario->id;
                $publications=Publication::where('user_id','=',$id)->get();

             return view('publicationstable')->with('id',$id)->with('publications',$publications);
    }



            return back();



    }



    function publicationstable($id)
    {
dd($id);
        $publications = Publication::where('user_id','=',$id)->orderBy('created_at', 'DESC')->paginate(10);

        return view('publicationstable')
            ->with('publications', $publications);


    }
}