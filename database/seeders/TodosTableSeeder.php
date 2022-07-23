<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('todos')->insert(
        [
            'title' => 'テスト１',
            'content' => 'テスト１の内容です',
            'deadline' => '2022/06/06',
            'completion_date' => NULL,
            'status_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
         DB::table('todos')->insert(
        [
            'title' => 'テスト２',
            'content' => 'テスト２の内容ですよ',
            'deadline' => '2022/08/06',
            'completion_date' => NULL,
            'status_id' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
         DB::table('todos')->insert(
        [
            'title' => 'テスト３',
            'content' => 'テスト３の内容だよ',
            'deadline' => '2022/07/07',
            'completion_date' => '2022/07/07',
            'status_id' => '3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],
    );
    }
}
