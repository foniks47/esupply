<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->string('id_user')->nullable();
            $table->string('id_emp')->nullable();
            $table->string('name')->nullable();
            $table->string('status')->nullable();
            $table->enum('purchase_type', ['Direct Pick Up', 'Purchase Request Proposal'])->nullable();
            $table->string('transactionnumber')->nullable();
            $table->string('transno')->nullable();
            $table->string('purpose', 255)->nullable();
            $table->string('reason', 255)->nullable();
            $table->string('tl_note', 255)->nullable();
            $table->string('tl_approval', 50)->nullable();
            $table->string('tl_approver', 50)->nullable();
            $table->string('tl_approver_name', 50)->nullable();
            $table->string('pic_approval', 50)->nullable();
            $table->string('pic_approver', 50)->nullable();
            $table->string('pic_approver_name', 50)->nullable();
            $table->string('tlgam_approval', 50)->nullable();
            $table->string('tlgam_approver', 50)->nullable();
            $table->string('tlgam_approver_name', 50)->nullable();
            $table->string('receipt', 50)->nullable();
            $table->string('period', 50)->nullable();
            $table->string('orgunit');
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
        Schema::dropIfExists('transaction');
    }
};
