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

        $publications =Publication::where('category_id','=',$categoria_id)->paginate(10);
        if(empty($publications)){
            abort(404);
        }

        foreach ($publications as $publication){
            $publication->image = "/images/".$publication->image;
        }
        return view('welcome')->with('publications',$publications);
    }


}