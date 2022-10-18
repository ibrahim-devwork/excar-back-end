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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            // Type of client
            $table->boolean('client_type')->default(0); // Particulier Or Professionnel

            // Company informations
            $table->foreignId('company_id')->nullable(); 

            // Personal informations
            $table->string('civility', 5)->default('Homme');
            $table->string('l_name', 40)->nullable(); 
            $table->string('f_name', 30)->nullable(); 
            $table->dateTime('date_of_birth')->nullable(); 
            $table->string('place_of_birth', 30)->nullable();
            $table->string('address', 150)->nullable();
            $table->string('phone1', 15)->nullable(); 
            $table->string('phone2', 15)->nullable(); 
            $table->string('email', 50)->nullable();
            
            // Permis informations
            $table->string('permis_numero', 20)->nullable();
            $table->date('permis_delivered_on')->nullable();  
            $table->date('permis_valid_until')->nullable();  
            $table->string('permis_place_delivred', 30)->nullable();  
             
            // Identity document
            $table->boolean('identity_type')->nullable(0); // CIN Or Passeport
            $table->string('identity_numero', 20)->nullable();
            $table->date('identity_valid_until')->nullable();  
            $table->string('identity_place_delivred', 30)->nullable();  

            // Identity and permis images
            $table->string('permis_front_image', 30)->nullable();
            $table->string('permis_back_image', 30)->nullable();
            $table->string('identity_front_iamge', 30)->nullable();
            $table->string('identity_back_image', 30)->nullable();
            
            // Observation
            $table->string('observation', 250)->nullable();

            // List black
            $table->boolean('is_list_black')->default(0);

            // Foriegn keys
            $table->foreignId('agency_id')->nullable();

            // Dates (created_at, updated_at)
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
