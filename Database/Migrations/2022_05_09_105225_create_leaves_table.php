<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hrm_leave_applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned();
            $table->string('financial_year')->default('2022/23');
            $table->bigInteger('leave_category_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->bigInteger('days');
            $table->bigInteger('level_id')->unsigned();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('summary')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('hrm_employees')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('hrm_leave_level')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hrm_leaves');
    }
}
