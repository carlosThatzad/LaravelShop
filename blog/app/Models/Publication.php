<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 29/04/20
 * Time: 20:26
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{

    protected $table = 'publications';
    protected $fillable= [ 'nombre','descripcion','metros','activo','precio','image','contacto','category_id' ,'user_id'];



     public function categories()
     {
         return $this->belongsTo(Categories::class, 'category_id');
     }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
   /* public function coments()
     {
         return $this->hasMany(Coment::class, 'post_id');
     }*/



}