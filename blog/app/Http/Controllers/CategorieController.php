<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 3/05/20
 * Time: 23:17
 */

namespace App\Http\Controllers;

use App\Models\Publication;

class CategorieController extends Controller
{


    function categ($categoria_id){

        $articulos =Publication::where('category_id','=',$categoria_id)->paginate(10);
        if(empty($articulos)){
            abort(404);
        }
        return view('categoria')->with('articulos',$articulos);
    }


}