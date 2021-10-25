<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_messages', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('reportId');
            $table->unsignedBigInteger('messageId');
            $table->unique(['reportId', 'messageId']);
            $table->foreign('reportId')->references('id')->on('report_headers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('messageId')->references('id')->on('messages')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('report_messages');
    }
}
