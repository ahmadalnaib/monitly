<?php

namespace App\Models;

use App\Models\Site;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Endpoint extends Model
{
    use HasFactory;
    protected $fillable = ['location', 'frequency', 'next_check'];

    public $dates=['next_check'];


    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
