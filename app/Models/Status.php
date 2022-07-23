<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_id'
        , 'status_name'
    ];

    public function todos()
    {
        // ステータスは複数のTodo項目を持つ
        return $this->hasMany('App\Models\Todo');
    }

}
