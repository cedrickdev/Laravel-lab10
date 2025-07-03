<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @mixin IdeHelperPostModel
 */
class PostModel extends Model
{
    protected $table = 'posts';
    protected $guarded = []; // List of prohibited fields

    public function showActivePosts()
    {

        $builder = DB::table('posts')
            ->where('status', 'active')
            ->get();
        return $builder;
    }
}

