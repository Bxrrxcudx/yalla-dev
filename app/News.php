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

    /**
     * synchronises tags to article in the pivot table
     * @param $article
     * @param $tags
     */
    public function syncTags($article, $tags)
    {
        $tagsToSync = $this->checkTags($tags);

        $article->tags()->sync($tagsToSync);
    }

    /**
     * renders array of all tags to synchronise
     * @param $tags
     * @return array
     */
    public function checkTags($tags){

        // array with only numeric values
        $currentTagIds = array_filter($tags, 'is_numeric');

        // array with values that are not numeric, meaning new tags
        $newTags = array_diff($tags, $currentTagIds);

        foreach ($newTags as $newTag)
        {
            // creates for each new tag an entry in the table "tags"
            if ($tag = Tag::create( ['name' => $newTag, 'slug' => str_slug($newTag, '-')] )) {

                // this new tag id is added to the currentTagIds array
                $currentTagIds[] = $tag->id;

            }
        }

        return $currentTagIds;
    }
}
