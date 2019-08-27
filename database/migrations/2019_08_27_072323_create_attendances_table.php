<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->enum('type', ['IN', 'OUT'])->nullable();
            $table->unsignedBigInteger('duration')->nullable();
            $table->text('remarks')->nullable();
            $table->boolean('is_first_in_of_day')->default(false);
            $table->nullableTimestamps();

            $table->index('created_at');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('set null');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
