<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catgroty extends Model
{

      protected  $table="catgroties";
      protected  $fillable= ['id', 'title', 'cover', 'activation', 'description', 'priority'];
      protected  $hidden =['created_at', 'updated_at'];

}
