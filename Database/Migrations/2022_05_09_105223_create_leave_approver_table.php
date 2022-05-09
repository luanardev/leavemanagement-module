<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveApproverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hrm_leave_approver', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('level_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();           
            $table->bigInteger('campus_id');           
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('hrm_employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hrm_leave_approver');
    }
}
