<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Budget extends Model
{
    use HasFactory,Notifiable;

    protected $table = 'budget';
    protected $primaryKey = 'budget_id';

    protected $fillable = [
        'user_id',
        'monthly_food_budget',
        'monthly_transport_budget',
        'monthly_entertainment_budget',
        'monthly_bills_budget',
        'daily_food_budget',
        'daily_transport_budget',
        'daily_entertainment_budget',
        'daily_bills_budget'
    ];

    // If you intend a one-to-one relation: user->budget
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
