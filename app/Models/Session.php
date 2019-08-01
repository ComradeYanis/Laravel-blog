<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Session
 * @package App\Models
 */
class Session extends Model
{
    /**
     * @var array $fillable
     */
    protected $fillable = [
        'user_id',
        'ip_address',
        'last_activity',
        'user_agent'
    ];
}
