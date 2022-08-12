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

 /**
     * 状態定義
     */
    const STATUS = [
        1 => ['label' => '未着手', 'html_class' => 'btn-warning'],
        2 => ['label' => '着手中', 'html_class' => 'btn-primary'],
        3 => ['label' => '完了', 'html_class' => 'btn-success'],
        4 => ['label' => '期限切れ', 'html_class' => 'btn-danger'],
    ];

    /**
     * 状態のラベル
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    /**
     * 状態を表すHTMLクラス
     * @return string
     */
    public function getStatusClassAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (empty(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['html_class'];
    }

}
