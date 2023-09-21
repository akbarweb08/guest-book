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
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('company', 'like', '%' . $search . '%')
                ->orWhere('identity_number', 'like', '%' . $search . '%')
                ->orWhere('purpose', 'like', '%' . $search . '%');
        });
    }
    protected $dateFormat = 'Y-m-d H:i:s P';
    protected $casts = [
        'out_at' => 'datetime:Y-m-d H:i:s',
    ];

}
