<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
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
            $table->string('company_id')->nullable();
            $table->string('company_name')->default('Advance POS');
            $table->string('company_address')->default('Advance POS Address');
            $table->string('company_phone')->default('+233 543661103');
            $table->string('company_email')->default('info@advancepos.com');
            $table->string('company_fax')->default('+233 30863687589');
            $table->softDeletes();
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
}
