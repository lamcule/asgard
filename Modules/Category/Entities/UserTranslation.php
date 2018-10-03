<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;

class UserTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'category__user_translations';
}
