<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function demoBalance(): float
    {
        $income = $this->transactions()
            ->where('type', 'income')
            ->where('status', 'success')
            ->sum('amount');

        $expense = $this->transactions()
            ->where('type', 'expense')
            ->where('status', 'success')
            ->sum('amount');

        return 2500000 + $income - $expense;
    }
}