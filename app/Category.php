<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    protected $fillable = ['name'];

    public function news()
    {
        return $this->hadMany('App\News');
    }


    /**
     * updates 'slug' column in db
     * @param $model
     * @return mixed
     */
    public function createSlug($model)
    {
        $model->slug = str_slug($model->name, '-');
        return $model->save();
    }
}
