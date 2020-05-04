<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 2/05/20
 * Time: 21:05
 */

namespace App\Http\Controllers;



use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $resourceName = "publications";
    protected $repositoryName = Publication::class;

    function index()
    {


        return view('admin.home');

    }


    function show()
    {


        return view('admin');

    }

    function showtable()
    {

        $publications = Publication::orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.tablehome')
            ->with('publications', $publications);


    }
    public function delete( $id )
    {
        $publication = Publication::find($id);
        if(!empty($publication)){

            $publication->delete();
            return redirect()->route('admin.index')->with('success','Registro eliminado satisfactoriamente');

        }

        Abort(404,'Publicación no encontrada');

    }

    public function create(){



        return view('admin.articulos.create');
    }

    public function edit($id)
    {
        $publication = Publication::where('id', '=', $id)->first();

        return view('admin.articulos.post_edit')
            ->with('publication', $publication);
    }
    public function tableusers(){

        $users=User::all();

        return view('admin.users.userstable')
            ->with('users',$users);
    }

    public function store(Request $request)
    {

       $this->validate($request,[
            'nombre' => 'required',
            'descripcion' => 'required',
            'metros' =>'required',
            'image' =>'required',
            'contacto'=>'required',
            'category_id'=>'required'

        ]);



        if($request->hasFile('image')){
            $archivoFoto=$request->file('image');
            $nombreFoto=time().$archivoFoto->getClientOriginalName();
            $archivoFoto->move(public_path().'/images/', $nombreFoto);

            // esta es la línea que faltaba. Llamo a la foto del modelo y le asigno la foto recogida por el formulario de actualizar.
            $request->image=$nombreFoto;

        }





        Publication::create($request->all());
        return redirect()->route('admin.index')->with('success','Registro creado satisfactoriamente');

    }
    public function update(Request $request )
    {
$id=$request->id;

        $publication = Publication::where('id', '=', $id)->first();

        $this->validate(request(),[
            'nombre' => 'required',
            'descripcion' => 'required',
            'metros' =>'required',
            'image' =>'',
            'activo' =>'required',
            'precio' =>'required',
            'contacto'=>'required',
            'category_id'=>'required'

        ]);

        if($request->hasFile('image')){
            $archivoFoto=$request->file('image');
            $nombreFoto=time().$archivoFoto->getClientOriginalName();
            $archivoFoto->move(public_path().'/images/', $nombreFoto);

            // esta es la línea que faltaba. Llamo a la foto del modelo y le asigno la foto recogida por el formulario de actualizar.
            $publication->image=$nombreFoto;

        }


        /* if(!is_object($articulo))
        {
            $articulo = new $articulo;
        }*/

        $publication->nombre = $request->get('nombre');
        $publication->descripcion= $request->get('descripcion');
        $publication->metros= $request->get('metros');
        $publication->contacto=$request->get('contacto');
        //$publication->image=$request->get('image');
        $publication->activo=$request->get('activo');
        $publication->precio= $request->get('precio');

        $publication->category_id=$request->get('category_id');


        $publication->save();

//dd($articulo);

        /* return Articulo::update([
                'titulo' => $articulo['titulo'],
                'descripcion' => $articulo['descripcion'],
                'contenido' => $articulo['contenido'],
                'imagen' => $articulo['imagen'],
                'categoria_id' => $articulo['categoria_id'],
                ]);*/

        return redirect()->route('admin.index')->with('success','Registro actualizado satisfactoriamente');
        // return redirect()->route('admin.index');
        // return redirect ('admin.articulos.post_edit');
        //return redirect('admin.articulos.post_edit');
    }

}