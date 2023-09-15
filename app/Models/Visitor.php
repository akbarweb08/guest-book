<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory, Uuids;
    protected $fillable = [
        'name',
        'company',
        'identity_number',
        'purpose',
        'out_at',
        'signature'
    ];
    protected $dateFormat = 'Y-m-d H:i:sO';
}
