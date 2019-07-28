<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * @var string $huinya
     */
    private static $tableName = 'posts';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::$tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable(false);
            $table->text('content')->nullable(false);
            $table->bigInteger('category_id')->unsigned();
            $table->timestamps();
        });

        Schema::table(self::$tableName, function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(self::$tableName, function (Blueprint $table) {
            $table->dropForeign('posts_category_id_foreign');
            $table->dropIfExists();
        });
    }
}
