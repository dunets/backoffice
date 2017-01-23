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
	
	public function validateProduct ($obj, $data = []) {
		$obj->validate($data,
		[
			'name' => 'required',
			'description' => 'required',
			'short_description' => 'required',
			
			
			'regular_price' => 'required',
			'sale_price' => 'present',
			
			'date_on_sale_from' => 'present',
			'date_on_sale_to' => 'present',
			
			'tax_status' => 'required',
			'tax_class' => 'required',
			
			
			'sku' => 'present',
			'manage_stock' => 'required',
			
			'stock_quantity' => 'present',
			'backorders' => 'required',
			
			'in_stock' => 'required',
			'sold_individually' => 'required',
			
			
			'weight' => 'present',
			'length' => 'present',
			'width' => 'present',
			'height' => 'present',
			
			
			'status' => 'required',
			
		]);
		
		$data['dimensions'] = array(
			'length' => $data['length'],
			'width' => $data['width'],
			'height' => $data['height'],
		);

		return $data->except(['_method', '_token']);
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
	
	public function updateProduct($id = 0, $params = [])
	{
		return $this->woocommerce->put('products/' . $id, $params);
	}
	
	public function deleteProduct($id = 0)
	{
		return $this->woocommerce->delete('products/' . $id, ['force' => true]);
	}
	/*end PRODUCTS*/
	
	
	/*CATEGORIES*/
	public function getCategoryList()
	{
		return $this->woocommerce->get('products/categories');
	}
	/*end CATEGORIES*/
	
}
