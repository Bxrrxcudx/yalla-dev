<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

use App\Admin;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    }

    /**
     * takes title + content fields of the last inserted id
     * and transforms them to generate remaining fields like
     * slug, meta-desc and description
     * @param $id
     * @param $table
     */
    protected function completeInsert($id, $table)
    {
        // gets source info at specified id
        $srcData = [
            'title' => DB::table("$table")->where('id', $id)->value('title')
            , 'content' => DB::table("$table")->where('id', $id)->value('content')
        ];

        // updates some of this id's fields
        // after using source data
        DB::table("$table")->where('id', $id)->update([
            'slug' => str_slug($srcData['title'], '-')
            , 'description' => str_limit(strip_tags($srcData['content']), $limit = 50, $end = ' ...')
            , 'meta-desc' => str_limit(strip_tags($srcData['content']), $limit = 157, $end = ' ...')
        ]);
    }
}
