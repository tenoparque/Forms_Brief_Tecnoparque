<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyAcceptance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'policy_id',
        'accepted_at',
    ];

    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function politica()
    {
        return $this->belongsTo(Politica::class, 'policy_id');
    }
}
