<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content','deadline','completion_date','status_id'];

    public function status()
    {
        // ステータスが１つ
        return $this->hasMany('App\Models\Status');
    }
}
