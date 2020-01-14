<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddForeignKeyToTasksTable
 * Миграция, которая добавляет колонку creator_id, после колонки status, в уже
 * существующую таблицу tasks и делает её внешним ключём. Ключём является дан-
 * ные колонки id таблицы users. С условием, как я понял, что при удалении юз-
 * ера, колонка creator_id в дочерней т.tasks примет значение NULL.
 */
class AddForeignKeyToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->bigInteger('creator_id')->after('status')->unsigned()->nullable();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        });
    }
}
