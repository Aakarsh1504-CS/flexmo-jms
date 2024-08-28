<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $casts = [
        'tenth' => 'array',
        'twelth' => 'array',
        'grad' => 'array',
        'post_grad' => 'array',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
