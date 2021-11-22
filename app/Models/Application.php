<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    const OPEN_STATUS = 1;
    const NEEDS_OFFER_STATUS = 2;
    const OFFERED_STATUS = 3;
    const APPROVED_STATUS = 4;
    const IN_PROGRESS_STATUS = 5;
    const READY_STATUS = 6;
    const VERIFIED_STATUS = 7;
    const CLOSED_STATUS = 8;

    const STATUSES = [
        self::OPEN_STATUS => 'Open',
        self::NEEDS_OFFER_STATUS => 'Needs offer',
        self::OFFERED_STATUS => 'Offered',
        self::APPROVED_STATUS => 'Approved',
        self::IN_PROGRESS_STATUS => 'In progress',
        self::READY_STATUS => 'Ready',
        self::CLOSED_STATUS => 'Closed',
    ];

    protected $fillable = [
        'name', 'photo', 'description', 'status'
    ];

    public $timestamps = [
        'finished_at', 'created_at', 'updated_at'
    ];
}
