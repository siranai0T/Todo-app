<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'content','deadline','completion_date','status_id'];
    protected $dates = ['deleted_at'];

    public function status()
    {
        // ステータスが１つ
        return $this->hasMany('App\Models\Status');
    }
}
