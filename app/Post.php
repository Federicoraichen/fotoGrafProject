<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'category_id', 'user_id'];

    //relaciones
public function category()
{
  return $this->belongsTo('App\Category');
}

public function user()
{
  return $this->belongsTo('App\User');
}

public function images()
{
  return $this->hasOne(App\Image::class, 'id');
}

}
