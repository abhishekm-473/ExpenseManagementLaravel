<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Income extends Model
{
    protected $table= "income";

    use HasFactory,Notifiable;
    protected $fillable = [
       'user_id',
       'income_date',
       'amount',
       'type',
       'note',
       'description'
    ];




    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
