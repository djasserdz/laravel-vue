<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Google extends Model
{
    use HasFactory;

    protected $fillable = [
        'google_id',
        'google_token',
    ];

    protected $table = 'google_logins';


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
