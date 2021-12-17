<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDownloadGames extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(Post $post){
        $users = User::all();
        $Downloads = UserDownloadGames::all();
        foreach ($users as $user){
            foreach ($Downloads as $download) {
                if ($download->user_id == $user->id) {
                    if($download->post_id == $post->id){
                        return true;
                    }
                }
            }
        }
        return false;
    }
}
