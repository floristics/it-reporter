<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $image_url
 * @method static \Illuminate\Database\Query\Builder|\App\User whereImageUrl($value)
 */
class User extends Authenticatable
{
    use HasRoles,Notifiable;
    use \KodiComponents\Support\Upload;
    
   /* protected $casts = [
        'image_url' => 'image_url', // or file | upload
    ];
    
    public function getUploadSettings()
    {
        return [
            'imag_url' => [
                'orientate' => [],
                'resize' => [1280, null, function ($constraint) {
                    $constraint->upsize();
                    $constraint->aspectRatio();
            }]
        ],
    ];
}
    protected function getUploadFilename(\Illuminate\Http\UploadedFile $file)
    {
        return md5($this->id).'.'.$file->getClientOriginalExtension();
    }
    
public function setUploadImageAttribute(\Illuminate\Http\UploadedFile $file = null)
{
    if (is_null($file)) {
        return;
    }

    foreach ($this->getUploadFields() as $field) {
        $this->{$field.'_file'} = $file;
    }
}*/
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'created_at', 'image_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->hasRole('SuperAdmin');
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole('Admin');
    }

    /**
     * @return bool
     */
    public function isUser()
    {
        return $this->hasRole('User');
    }

    public function GetOrgId()
    {
        $OrgId = Organisation::where('user_id','=',$this->id)->first();
        if ( $OrgId ) {
            return $OrgId->id;
        }
        return false;
    }


}
