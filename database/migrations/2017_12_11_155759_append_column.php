<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppendColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('canvas_posts', function (Blueprint $table) {
            //
            $table->text('description_raw')->after('subtitle');
            $table->text('description_html')->after('description_raw');
            $table->integer('ad1')->default(0)->after('layout');
            $table->integer('ad2')->default(0)->after('ad1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('canvas_posts', function (Blueprint $table) {
            //
            $table->dropColumn('description_raw');
            $table->dropColumn('description_html');
            $table->dropColumn('ad1');
            $table->dropColumn('ad2');
        });
    }
}
