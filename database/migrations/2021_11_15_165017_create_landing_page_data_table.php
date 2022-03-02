<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingPageDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_page_data', function (Blueprint $table) {
            $table->id();
            $table->string("title", 191)->nullable();
            $table->text("description")->nullable();
            $table->unsignedBigInteger("upload_id")->nullable();
            $table->text("facebook_pixel")->nullable();
            $table->text("google_analytics")->nullable();
            $table->text("google_tag_manager_head")->nullable();
            $table->text("google_tag_manager_body")->nullable();
            $table->text("seo_title")->nullable();
            $table->text("seo_description")->nullable();
            $table->text("seo_keywords")->nullable();
            $table->text("thanks_title")->nullable();
            $table->text("thanks_paragraph")->nullable();
            $table->longText("email_subject")->nullable();
            $table->longText("email_template")->nullable();
            $table->unsignedBigInteger("replay_email_id")->nullable();
            $table->string("type", 100);
//            $table->foreign("replay_email_id")->references("id")->on("emails")->onUpdate("set null")->onDelete("set null");
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
        Schema::dropIfExists('landing_page_data');
    }
}
