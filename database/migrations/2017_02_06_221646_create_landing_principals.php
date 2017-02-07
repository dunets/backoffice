<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingPrincipals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_principals', function (Blueprint $table) {
            $table->increments('id');
			
			$table->integer('id_destaque');
			$table->string('titulo_destaque');
			$table->string('desc_destaque');
			$table->string('img_destaque');
			$table->string('url_destaque');
			$table->string('price_destaque');
			
			$table->string('img_destaque_down');

			$table->string('features_title_1');
			$table->string('features_desc_1');
			$table->string('features_title_2');
			$table->string('features_desc_2');
			$table->string('features_title_3');
			$table->string('features_desc_3');
			$table->string('features_title_4');
			$table->string('features_desc_4');
			$table->string('features_title_5');
			$table->string('features_desc_5');
			$table->string('features_title_6');
			$table->string('features_desc_6');
			
			
			$table->string('img_destaque_line');
			$table->string('title_destaque_line');
			$table->string('desc_destaque_line');
			$table->string('url_destaque_line');
			
			$table->string('receive_email');
			$table->string('contact_text');
			
			$table->string('seo_title');
			$table->string('seo_keywords');
			$table->string('seo_desc');
			$table->string('seo_og_title');
			$table->string('seo_og_desc');
			$table->string('seo_og_url');
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
        Schema::dropIfExists('landing_principals');
    }
}
