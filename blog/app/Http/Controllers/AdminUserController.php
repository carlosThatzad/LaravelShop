<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 3/05/20
 * Time: 5:14
 */

namespace App\Http\Controllers;


use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;
class AdminUserController extends Controller
{


    protected $resourceName = "users";
    protected $repositoryName = User::class;
    public function usercreate(){



        return view('admin.users.userscreate');
    }

    public function useredit($id)
    {
        $user = User::where('id', '=', $id)->first();

        return view('admin.users.useredit')
            ->with('user', $user);
    }
    public function tableusers(){

        $users=User::all();

        return view('admin.users.userstable')
            ->with('users',$users);
    }

    public function userstore(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'lastname' => 'required',
            'email' =>'required',
            'password' =>'required',
            'telephone'=>'required',
            'role_id'=>'required'

        ]);
        if(!empty($request->get('password'))){
            $request['password']= bcrypt($request->get('password'));

        User::create($request->all());

    }


        $users=User::all();

        return view('admin.users.userstable')->with('success','Registro actualizado satisfactoriamente')->with('users',$users);

    }
    public function userdelete( $id )
    {
        $user=User::find($id);
        if(!empty($user)){

            $user->delete();
            $users=User::all();

            return view('admin.users.userstable')->with('success','Registro actualizado satisfactoriamente')->with('users',$users);


        }

        Abort(404,'Publicación no encontrada');

    }
    public function userupdate($id,Request $request )
    {


        $users = User::where('id', '=', $id)->first();

        $this->validate(request(),[
            'name' => 'required',
            'lastname' => 'required',
            'email' =>'required',
            'password' =>'required',
            'telephone'=>'required',
            'role_id'=>'required'

        ]);

        $users->name = $request->get('name');
        $users->lastname= $request->get('lastname');
        $users->email= $request->get('email');

        if(!empty($request->get('password'))){
            $password1= bcrypt($request->get('password'));

            $users->password=$password1;

        }
        $users->telephone=$request->get('telephone');
        $users->role_id=$request->get('role_id');



        $users->save();
        $users=User::all();

        return view('admin.users.userstable')->with('success','Registro actualizado satisfactoriamente')->with('users',$users);

    }
}