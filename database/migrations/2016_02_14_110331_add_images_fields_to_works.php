<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagesFieldsToWorks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->string('display_image')->after('image');
            $table->string('tablet_image')->after('display_image');
            $table->string('phone_image')->after('tablet_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->dropColumn('display_image');
            $table->dropColumn('tablet_image');
            $table->dropColumn('phone_image');
        });
    }
}
