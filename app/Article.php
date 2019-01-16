<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'publish'];

    protected $dates = ['deleted_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function getAll() {
        $list = DB::table('articles')
                  ->join('users', 'users.id', '=', 'articles.user_id')
                  ->select('articles.id', 'articles.title', 'articles.description', 'users.name', 'articles.publish')
                  ->whereNull('deleted_at')
                  ->get();
        return $list;
    }
}
