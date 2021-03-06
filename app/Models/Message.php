<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'id',
        'from_user',
        'to_user',
        'message',
        'is_read',
        'from_delete',
        'to_delete',
    ];


    public function dialog_user()
    {
        $current_user = \Auth::id();

        if( $current_user == $this->from_user_id ){
            return $this->to_user();
        }
        else{
            return $this->from_user();
        }

    }


    public function from_user()
    {
        return $this->belongsTo( User::class, 'from_user' );
    }

    public function to_user()
    {
        return $this->belongsTo( User::class, 'to_user' );
    }

    public function hasUnreadMessages(){

        if( $user = \Auth::user() ){

            $to_user = $this->from_user == $user->id ? $this->to_user : $this->from_user ;

            return $this->where('from_user', $to_user)
                ->where('to_user', $user->id)
                ->where('is_read', 0)
                ->count();

        }

        return null;
    }
}
