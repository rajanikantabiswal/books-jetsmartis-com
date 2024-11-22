<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); 
            $table->string('last_name');
            $table->string('country_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('email_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->integer('exam_id');
            $table->date('conducted_date');
            $table->integer('conducted_by')->nullable();
            $table->integer('client_id')->nullable();
            $table->string('status')->default('pending');
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
