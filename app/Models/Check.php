<?php

namespace App\Models;

use App\Models\Endpoint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Check extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'response_code',
        'response_body',
    ];

    public function endpoint()
    {
        return $this->belongsTo(Endpoint::class);
    }
}
