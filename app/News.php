<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'title'
        , 'authors'
        , 'content'
        , 'categories'
        , 'thumbnail'
        , 'category_id'
        , 'tags_list'
    ];

    protected $hidden = [
        'meta-desc'
        , 'meta-robot'
        , 'slug'
        , 'description'
        , 'created_at'
        , 'updated_at'
        , 'deleted_at'
    ];

    protected $dates = [
        'created_at'
        , 'updated_at'
        , 'deleted_at'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function getTagsListAttribute()
    {
        if($this->id)
        {
            return $this->tags->pluck('id');
        }
    }

    public function setTagsListAttribute($value)
    {

        return $this->tags()->sync($value);
    }

    public function syncTags($article, $tags)
    {
        $tagsToSync = $this->checkTags($tags);

        $article->tags()->sync($tagsToSync);
    }

    public function checkTags($tags){

        $currentTagIds = array_filter($tags, 'is_numeric');

        $newTags = array_diff($tags, $currentTagIds);

        foreach ($newTags as $newTag)
        {
            if ($tag = Tag::create( ['name' => $newTag, 'slug' => str_slug($newTag, '-')] )) {

                $currentTagIds[] = $tag->id;

            }
        }

        return $currentTagIds;
    }
}
