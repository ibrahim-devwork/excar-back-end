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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 50)->nullable(); 
            $table->string('company_ice', 30)->nullable(); 
            $table->string('company_address', 150)->nullable();
            $table->string('company_phone', 15)->nullable(); 
            $table->string('company_email', 50)->nullable();
            $table->foreignId('agency_id')->nullable(); 
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
        Schema::dropIfExists('companies');
    }
};
