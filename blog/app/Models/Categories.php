<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 29/04/20
 * Time: 20:34
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = [ 'title','description'];

    public function categorias()
    {
        return $this->hasMany(Publication::class, 'category_id', 'id');
    }
}