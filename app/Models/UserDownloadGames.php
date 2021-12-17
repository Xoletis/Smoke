<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDownloadGames extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function user(Post $post, User $user){
        $Downloads = UserDownloadGames::all();
        foreach ($Downloads as $download) {
            if ($download->user_id == $user->id) {
                if($download->post_id == $post->id){
                    return true;
                }
            }
        }
        return false;
    }
}
