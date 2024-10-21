<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('libraries', function (Blueprint $table) {
            $table->string('status')->default(\App\Enums\LibraryStatus::BELUM_DIBAYAR);
        });
    }

    public function down()
    {
        Schema::table('libraries', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
