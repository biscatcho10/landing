<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingPageContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_page_contacts', function (Blueprint $table) {
            $table->id();
            $table->string("name", 191);
            $table->string("company_name", 191)->nullable();
            $table->string("email", 191);
            $table->string("phone_number", 191)->nullable();
            $table->longText("industry_id")->nullable();
            $table->longText("from_where_id")->nullable();
//            $table->unsignedBigInteger("industry_id")->nullable();
//            $table->unsignedBigInteger("from_where_id")->nullable();
            $table->text("message")->nullable();
            $table->string("type", 100);
//            $table->foreign("industry_id")->references("id")->on("industries")->onDelete("no action")->onUpdate("no action");
//            $table->foreign("from_where_id")->references("id")->on("from_where_list")->onDelete("no action")->onUpdate("no action");
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
        Schema::dropIfExists('landing_page_contacts');
    }
}
