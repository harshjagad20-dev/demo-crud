<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Requests\UserRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements HasMedia
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function hobbies()
    {
        return $this->belongsToMany(Hobby::class);
    }

    public function getProfilePicAttribute()
    {
        $avatar = $this->getMedia('profile_pic')->first();

        if (!$avatar) {
            return null;
        }

        return asset($avatar->getUrl());
    }

    public static function createFromRequest(UserRequest $request)
    {
        $user = User::create($request->getUserPayload());

        $user->hobbies()->sync($request->hobbies);

        $user->addMediaFromRequest("profile_pic")
            ->toMediaCollection('profile_pic');

        return $user;
    }

    public function updateFromRequest(UserRequest $request)
    {
        $this->update($request->getUserPayload());

        $this->hobbies()->sync($request->hobbies);

        return true;
    }
}
