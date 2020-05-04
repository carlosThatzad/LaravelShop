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
    public function edit($id)
    {
        $publication = Publication::where('id', '=', $id)->first();

        return view('admin.articulos.post_edit')
            ->with('publication', $publication);
    }



    public function create(){



        return view('articulo.create');
    }
    public function store(Request $request)
    {

        $this->validate($request,[
            'nombre' => 'required',
            'descripcion' => 'required',
            'metros' =>'required',
            'image' =>'required',
            'contacto'=>'required',
            'category_id'=>'required',
            'user_id'=>''

        ]);



        if($request->hasFile('image')){
            $archivoFoto=$request->file('image');
            $nombreFoto=time().$archivoFoto->getClientOriginalName();
            $archivoFoto->move(public_path().'/images/', $nombreFoto);


            $request['image']=$nombreFoto;


            $id=Auth::user()->id;
            $request['user_id']=$id;

            Publication::create($request->all());

        }


        $publications=Publication::where('user_id','=',$id)->get();

        return view('publicationstable')->with('publications',$publications);


    }
    public function login(){

        if(\Auth::check() ){
            $id=Auth::user()->id;

            if($id ==3 || $id==2){
                $publications=Publication::where('user_id','=',$id)->get();

                return view('publicationstable')->with('publications',$publications);
            }
            return view('usuariologin');
        }
        return view('usuariologin');

    }

    public function delete( $id )
    {
        $publication = Publication::find($id);
        if(!empty($publication)){

            $publication->delete();
            $id=Auth::user()->id;
            $publications=Publication::where('user_id','=',$id)->get();

            return view('publicationstable')->with('publications',$publications);

        }

        Abort(404,'Publicación no encontrada');

    }
    public function update(Request $request )
    {

        $id=Auth::user()->id;
        $request['user_id']=$id;
        $idp=$request->id;
        $publication = Publication::where('id', '=', $idp)->first();

        $this->validate(request(),[
            'nombre' => 'required',
            'descripcion' => 'required',
            'metros' =>'required',
            'image' =>'',
            'activo' =>'required',
            'precio' =>'required',
            'contacto'=>'required',
            'category_id'=>'required',


        ]);
        if($request->hasFile('image')){
            $archivoFoto=$request->file('image');
            $nombreFoto=time().$archivoFoto->getClientOriginalName();
            $archivoFoto->move(public_path().'/images/', $nombreFoto);
            $publication->image=$nombreFoto;
        }

        $publication->nombre = $request->get('nombre');
        $publication->descripcion= $request->get('descripcion');
        $publication->metros= $request->get('metros');
        $publication->contacto=$request->get('contacto');
        $publication->activo=$request->get('activo');
        $publication->precio= $request->get('precio');
        $publication->category_id=$request->get('category_id');
        $publication->save();


        $publications=Publication::where('user_id','=',$id)->get();

        return view('publicationstable')->with('publications',$publications);

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
        //$id=Auth::user()->id;
        $user=User::where('id','=',$id)->first();
        if($user->role_id==3 || $user->role_id==2){
            $publications = Publication::where('user_id','=',$id)->orderBy('created_at', 'DESC')->paginate(10);

            return view('publicationstable')
                ->with('publications', $publications);

        }



    }
}