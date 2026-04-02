<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Expense extends Model
{
    protected $table = "expense";

    use HasFactory,Notifiable;

    protected $fillable = [
        'user_id',
        'expense_date',
        'amount',
        'category',
        'account',
        'note'
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
