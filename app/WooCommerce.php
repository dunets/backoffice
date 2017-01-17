<?php

namespace App;

use Automattic\WooCommerce\Client;


class WooCommerce
{
	private $woocommerce;
	
	 public function __construct(){
		 $this->woocommerce = new Client(
				'http://wordpress.dev',
				'ck_988bd208ffc51d6a8bb917c4205e41cb7feb5f24',
				'cs_122abc39b34f276c5f2ebf0ca9d5f076ee2af83f',
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
