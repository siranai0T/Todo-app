<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title',20)->comment('タイトル');
            $table->string('content',50)->nullable()->comment('内容');
            $table->date('deadline')->nullable()->comment('完了期限');
            $table->date('completion_date')->nullable()->comment('完了日');
            $table->integer('status_id')->default(1)->comment('ステータスID');
            $table->softDeletes()->comment('削除日時 : 削除を行った日時  この値がnullでなかったら、削除を行ったとみなす');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
