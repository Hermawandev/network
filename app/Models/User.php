<?php

namespace App\Models;

use App\Traits\Following;
use App\Traits\following_user_id;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, Following;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function gravatar  ($size = 100)
    {
        $default  = 'mm';
        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

    }
    public function statuses  ()
    {
        return $this->hasMany(status::class);
    }

    public function makeStatus  ($string)
    {
        $this->statuses()->create([
            'body'=>$string,
            'identifier'=> Str::slug(Str::random(31).$this->id),
        ]);
    }
   
    public function timeline  ()
    {
        $following = $this->follows->pluck('id');
        return status::whereIn('user_id',$following)
                                    ->orWhere('user_id', $this->id)
                                    ->latest()
                                    ->get();
    }
}
