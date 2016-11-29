<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Automattic\WooCommerce\Client;


class WooCommerce /* extends Model*/
{
	private $woocommerce;
	
	 public function __construct(){
		 $this->woocommerce = new Client(
				'http://wordpress.dev',
				'ck_8dacf540b2a6841aede83ec0c7b4a09728c1dd61',
				'cs_bf7868c1b8cb254408c9a972f4fee02e9ba0cbd6',
				[
					'version' => 'v3',
				]
			);
	 }
	
	public function getList () {
		return $this->woocommerce->get('products');
	}
	
}
