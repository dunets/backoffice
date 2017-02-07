<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingPrincipal extends Model
{
	protected $fillable = [
		'id_destaque',
		'titulo_destaque',
		'desc_destaque',
		'img_destaque',
		'url_destaque',
		'price_destaque',
		'img_destaque_down',
		'features_title_1',
		'features_desc_1',
		'features_title_2',
		'features_desc_2',
		'features_title_3',
		'features_desc_3',
		'features_title_4',
		'features_desc_4',
		'features_title_5',
		'features_desc_5',
		'features_title_6',
		'features_desc_6',
		'img_destaque_line',
		'title_destaque_line',
		'desc_destaque_line',
		'url_destaque_line',
		
		'receive_email',
		'contact_text',
		
		'seo_title',
		'seo_keywords',
		'seo_desc',
		'seo_og_title',
		'seo_og_desc',
		'seo_og_url',
	];
}
