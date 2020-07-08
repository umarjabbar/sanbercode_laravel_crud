<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne('App\Profile');
    }

    public static function create_user($data){

        $profile = User::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }

    public static function detail($id){
        $user = User::find($id);
        $use = $user->profile;
        if(isset($use)){
            $data =  [
                'id' => $user->id,
                'name' => $user->profile->full_name,
                'email' => $user->email,
                'image' => $user->profile->image,
                'description' => $user->profile->description,
                'action' => 'update'
            ];
        }else{
            $data = [
                'id' => $user->id,
                'name' => 'Nama belum dilengkapi',
                'email' => $user->email,
                'image' => 'Tambahkan gambar',
                'description' => 'Deskripsi belum ditambahkan',
                'action' => 'Lengkapi'
            ];
        };

        return $data;
    }

    public static function create_profile($request, $id){
        $user = User::find($id);

        $profile = new Profile([
            'full_name' => $request['full_name'],
            'description' => $request['description'],
            'image' => $request['image'],
            'user_id' => $id
        ]);

        $user->profile()->save($profile);

        return $user;
    } 
}
