<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mark() {
        return $this->belongsTo(Mark::class, 'mark_id');
    }
}
