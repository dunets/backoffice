<?php

namespace App;

use Automattic\WooCommerce\Client;


class WooCommerce
{
	private $woocommerce;
	
	 public function __construct(){
		 $this->woocommerce = new Client(
				'http://wordpress.dev',
				'ck_09af03ef64898851e4743a6457a3e1f555572a17',
				'cs_cda3fd56aff65f80dcd0b8c50664d917dc4d60f0',
				[
					'wp_api' => true,
					'version' => 'wc/v1',
				]
			);
	 }
	
	public function getStoreInfo ()
	{
		return $this->woocommerce->get('');
	}
	
	/*PRODUCTS*/
	public function getProductList ($params = [])
	{
		return $this->woocommerce->get('products', $params);
	}
	
	public function getProduct($id = 0, $params = [])
	{
		return $this->woocommerce->get('products/' . $id, $params);
	}
	/*end PRODUCTS*/
	
	
	/*CATEGORIES*/
	public function getCategoryList()
	{
		return $this->woocommerce->get('products/categories');
	}
	/*end CATEGORIES*/
	
}
