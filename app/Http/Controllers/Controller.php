<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * takes title + content fields of the last inserted id
     * and transforms them to generate remaining fields like
     * slug, meta-desc and description
     * @param $id : last insert id
     */
    protected function completeNewsInsert($id)
    {
        $srcData = [
            'title' => DB::table('news')->where('id', $id)->value('title')
            , 'content' => DB::table('news')->where('id', $id)->value('content')
        ];

        DB::table('news')->where('id', $id)->update([
            'slug' => str_slug($srcData['title'], '-')
            , 'description' => str_limit(strip_tags($srcData['content']), $limit = 50, $end = ' ...')
            , 'meta-desc' => str_limit(strip_tags($srcData['content']), $limit = 157, $end = ' ...')
        ]);
    }
}
