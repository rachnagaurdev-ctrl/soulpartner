<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'profile_id',
        'name',
        'email',
        'email_verification_token',
        'password',
        'is_admin',
        'phone',
        'dob',
        'gender',
        'city',
        'pincode',
        'country',
        'iwantto',
        'category',
        'category_prices',
        'price_per_hour',
        'profile_image',
        'bio',
        'height',
        'religion',
        'languages',
        'preferred_location',
        'available_from',
        'available_time',
        'interests',
        'looking_for',
        'availability',
        'profile_photos',
        'is_verified',
        'referral_code',
        'referred_by',
        'wallet_balance',
        'is_active',
        'last_seen_at',
    ];

    /**
     * Get the user's age based on dob.
     */
    public function getAgeAttribute()
    {
        return $this->dob ? \Carbon\Carbon::parse($this->dob)->age : null;
    }

    /**
     * Check if user is currently online (seen in last 5 mins).
     */
    public function isOnline(): bool
    {
        return $this->last_seen_at && $this->last_seen_at->diffInMinutes(now()) < 5;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_seen_at' => 'datetime',
            'password' => 'hashed',
            'languages' => 'array',
            'interests' => 'array',
            'looking_for' => 'array',
            'profile_photos' => 'array',
            'availability' => 'array',
            'category_prices' => 'array',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return (bool) $this->is_admin;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->referral_code)) {
                $user->referral_code = strtoupper(\Illuminate\Support\Str::random(8));
            }
            if (empty($user->profile_id)) {
                $user->profile_id = (string) mt_rand(100000, 999999);
                // Ensure uniqueness
                while (\App\Models\User::where('profile_id', $user->profile_id)->exists()) {
                    $user->profile_id = (string) mt_rand(100000, 999999);
                }
            }
        });
    }

    public function referrals()
    {
        return $this->hasMany(User::class, 'referred_by');
    }

    public function withdrawals()
    {
        return $this->hasMany(WithdrawalRequest::class);
    }
}
