<?php

namespace Modules\Category\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\Sentinel\User;


class Category extends Model
{
    use Translatable;

    protected $table = 'category__categories';
    public $translatedAttributes = [];
    protected $fillable = ['name','parent_id','type','created_at','updated_at'];

    public function users(){
    	return $this->belongsToMany(User::class,'category__users','user_id','category__categories_id');
    }

    public function parent(){
    	return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function children(){
    	return $this->hasMany(Category::class,'parent_id','id');
    }

}
