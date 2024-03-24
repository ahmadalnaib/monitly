<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    protected $fillable = ['scheme', 'domain', 'default'];
    use HasFactory;

    public static function booted()
    {
        static::updating(function (Site $site) {
            if (in_array('default', array_keys($site->getDirty()))) {
                $site->user->sites()->whereKeyNot($site->id)->update(['default' => false]);
            }
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
