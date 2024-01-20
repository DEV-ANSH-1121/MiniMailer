<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'recipient',
        'subject',
        'body',
        'attachment',
        'user_id',
    ];

    /**
     * Get the user that owns the email.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
