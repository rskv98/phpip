<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTables7 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // Not supported
      /*Schema::table('classifier', function (Blueprint $table) {
        $table->binary('img', 16777215)->after('value')->nullable();
      });*/
      DB::statement("ALTER TABLE classifier ADD COLUMN img MEDIUMBLOB NULL AFTER value");
      DB::table('classifier_type')->insertOrIgnore(['code' => 'IMG', 'type' => 'Image']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('classifier', function (Blueprint $table) {
        $table->dropColumn('img');
      });
      DB::table('classifier')->where('type_code', 'IMG')->delete();
      DB::table('classifier_type')->where('code', 'IMG')->delete();
    }
}
