<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Overtrue\LaravelFollow\Traits\Followable;
use Overtrue\LaravelFollow\Traits\Follower;
use Overtrue\LaravelLike\Traits\Liker;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles,InteractsWithMedia, Liker,Follower,Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'github',
        'job_title',
        'birth_date',
        'mobile',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            // Generate a slug for the article based on its title
            $user->slug = $user->createSlug($user->name);

            // Save the article with the updated slug
            $user->save();
        });
    }


    private function createSlug($slug)
    {
        // Check if a record with the same slug already exists
        if (static::whereSlug($slug = Str::slug($slug))->exists()) {

            // Get the highest slug number for records with the same name
            $max = static::whereSlug($slug)->latest('id')->skip(1)->value('slug');

            // If the highest slug number ends with a number, increment it
            if (isset($max[-1]) && is_numeric($max[-1])) {

                // Use preg_replace_callback to increment the number at the end of the slug
                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    // Increment the number and return the new slug
                    return $mathces[1] + 1;
                }, $max);
            }

            // If the highest slug number does not end with a number, append "-2" to the slug
            return "{$slug}-2";
        }

        // If no record with the same slug exists, return the slug as is
        return $slug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
