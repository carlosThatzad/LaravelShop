<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 2/05/20
 * Time: 20:32
 */

namespace App\Http\Controllers;
use App\Models\Publication;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    function home(){
        $publications = Publication::orderBy('created_at', 'DESC')->paginate(10);
foreach ($publications as $publication){
    $publication->image = "/images/".$publication->image;
}
        return view('welcome')
            ->with('publications', $publications);

    }

    function show($id){

        $articulo = Publication::where('id', '=', $id)->first();

        if(empty($articulo)){
            abort(404);
        }

        $articulo->image = "/images/".$articulo->image;


        return view('articulo')
            ->with('articulo', $articulo);

    }


    public function contactUS()
{
    return view('contactUS');
}



}