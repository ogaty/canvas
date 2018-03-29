<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContent2 extends Migration
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
            $table->text('content2_row')->after('content_html');
            $table->text('content2_html')->after('content2_row');
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
            $table->dropColumn('content2_row');
            $table->dropColumn('content2_html');
        });
    }
}
