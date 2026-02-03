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
       Schema::create('enquiries', function (Blueprint $table) {
        $table->id();
        $table->string('full_name');
        $table->string('email');
        $table->string('phone');
        $table->string('destination');
        $table->date('travel_date')->nullable();
        $table->integer('number_of_travelers');
        $table->string('budget')->nullable();
        $table->text('special_requests')->nullable();
        $table->boolean('terms_agreed');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
