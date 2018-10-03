<?php

namespace Modules\Category\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities;

class User extends Model
{
    use Translatable;

    protected $table = 'users';
    public $translatedAttributes = [];
    protected $fillable = ['email','password','permissions','last_login','first_name','last_name','created_at','updated_at'];

    public function categories(){
    	return $this->belongsToMany(Category::class,'category__users','user_id','category__categories_id');
    }
}
