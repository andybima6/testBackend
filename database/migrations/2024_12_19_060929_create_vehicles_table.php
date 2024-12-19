<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->enum('vehicle_type', ['passenger', 'cargo']);
            $table->string('license_plate');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->enum('status', ['available', 'in_use', 'under_service']);
            $table->decimal('fuel_consumption', 5, 2)->default(0);
            $table->date('last_service_date')->nullable();
            $table->date('next_service_date')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
