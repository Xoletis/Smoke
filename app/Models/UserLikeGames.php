<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLikeGames extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function userPost(Post $post, User $user){
        $Likes = UserLikeGames::all();
        foreach ($Likes as $like) {
            if ($like->user_id == $user->id and $like->post_id == $post->id) {
                    return true;
            }
        }
        return false;
    }
}
