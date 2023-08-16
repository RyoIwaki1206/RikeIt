<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('thread_requests', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id');
        $table->string('title')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
        $table->enum('status', ['pending', 'approved', 'rejected'])->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
        $table->unsignedBigInteger('admin_id')->nullable();
        $table->timestamps(); // ここでcreated_atとupdated_atを有効にする
    });
}

    


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thread_requests');
    }
}
