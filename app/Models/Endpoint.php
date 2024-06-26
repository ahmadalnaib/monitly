<?php

namespace App\Models;

use App\Models\Site;
use App\Models\Check;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Endpoint extends Model
{
    use HasFactory;
    protected $fillable = ['location', 'frequency', 'next_check'];

    public $dates = ['next_check'];

    public function url()
    {
        return $this->site->url()  . $this->location;
    }


    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function checks()
    {
        return $this->hasMany(Check::class);
    }

    public function check()
    {
        return $this->hasOne(Check::class)->latestOfMany();
    }
}
