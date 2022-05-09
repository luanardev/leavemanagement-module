<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hrm_leave_approvals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('leave_id')->unsigned();
            $table->bigInteger('approver_id')->unsigned();           
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); 
            
            $table->timestamps();

            $table->foreign('leave_id')->references('id')->on('hrm_leaves')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hrm_leave_approvals');
    }
}
