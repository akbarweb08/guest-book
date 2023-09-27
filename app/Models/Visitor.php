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
        'signature',
        'detained_items',
        'office',
        'status',
        'is_given_card',
        'phone_number',
    ];
    public function scopeFilter($query, array $filters)
    {

        if(empty($filters['from_date']) ?? false){
            return $query->whereRaw('date(created_at) = DATE(NOW())');
        }
        if ($filters['from_date'] ?? false) {
            $from = $filters['from_date'];
            $to = $filters['to_date'];
            // dd("date(created_at) >= to_date('$from','YYYY-MM-DD') AND date(created_at) <= to_date('$to','YYYY-MM-DD') ");
            return $query->whereRaw("date(created_at) >= to_date('$from','YYYY-MM-DD') AND date(created_at) <= to_date('$to','YYYY-MM-DD') ");
            // return $query->whereBetween('logs.created_at', [$filters['from'] . " 00:00:00", $filters['to'] . " 23:59:00"]);
        }
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
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
