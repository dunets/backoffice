<?php

namespace App;

use Automattic\WooCommerce\Client;
use Illuminate\Http\Request;


class WooCommerce
{
	private $woocommerce;
	
	 public function __construct()
	 {
		  $this->woocommerce = new Client(
				'http://divanessestore.ru',
				'ck_06942ca0e3de66af89ff2c3f410d441b4c08e0ea',
				'cs_3a57e565c9363001a084d98af1417e18a05f77d5',
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
	
	public function validateProduct ($obj, $data = [])
	{
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
	public function getProductPriceHTML($id = 0)
	{
		return $this->woocommerce->get('products/' . $id)['price_html'];
	}
	
	public function getProductPrice($id = 0)
	{
		return $this->woocommerce->get('products/' . $id)['price'];
	}
	
	public function getProductTotalPages()
	{
		$key = false;
		$pages = 1;
		while($key == false){
			$data = $this->woocommerce->get(
			'products',
			[
				'status' => 'any',
				'page' => $pages,
				'per_page' => '10'
			]);
			if(!empty($data))
				$pages++;
			else
				$key=true;
		}
		return --$pages;
		
		/*$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, 
			'http://wordpress.dev/wp-json/wc/v1/products'
		);
		$headers = array(
			'Content-Type:application/json',
			'Authorization: Basic '. base64_encode("ck_988bd208ffc51d6a8bb917c4205e41cb7feb5f24:cs_122abc39b34f276c5f2ebf0ca9d5f076ee2af83f"),
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$content = curl_exec($ch);
		return $content;*/
		
	}
	
	public function getProductDiscountTotalPages()
	{
		$key = false;
		$pages = 1;
		while($key == false){
			$data = $this->woocommerce->get(
			'products',
			[
				'status' => 'publish',
				'page' => $pages,
				'category' => 6,
				'per_page' => '10'
			]);
			if(!empty($data))
				$pages++;
			else
				$key=true;
		}
		return --$pages;
		
		/*$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, 
			'http://wordpress.dev/wp-json/wc/v1/products'
		);
		$headers = array(
			'Content-Type:application/json',
			'Authorization: Basic '. base64_encode("ck_988bd208ffc51d6a8bb917c4205e41cb7feb5f24:cs_122abc39b34f276c5f2ebf0ca9d5f076ee2af83f"),
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$content = curl_exec($ch);
		return $content;*/
		
	}
	
	public function getProductList($page = 1)
	{
		$data = $this->woocommerce->get(
			'products',
			[
				'status' => 'any',
				'page' => $page,
				'per_page' => '10'
			]
		);
		return $data;
	}
	
	public function getProductDiscountList($page = 1)
	{
		
		
		$data = $this->woocommerce->get(
			'products',
			[
				'status' => 'publish',
				'page' => $page,
				'category' => 6,
				'per_page' => '10'
			]
		);
		return $data;
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
	
	
	/*ORDERS*/
	public function getOrdersTotalPages()
	{
		$key = false;
		$pages = 1;
		while($key == false){
			$data = $this->woocommerce->get(
			'orders',
			[
				'status' => 'any',
				'page' => $pages,
				'per_page' => '10',
			]);
			if(!empty($data))
				$pages++;
			else
				$key=true;
		}
		return --$pages;
		
		/*$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, 
			'http://wordpress.dev/wp-json/wc/v1/products'
		);
		$headers = array(
			'Content-Type:application/json',
			'Authorization: Basic '. base64_encode("ck_988bd208ffc51d6a8bb917c4205e41cb7feb5f24:cs_122abc39b34f276c5f2ebf0ca9d5f076ee2af83f"),
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$content = curl_exec($ch);
		return $content;*/
		
	}
	
	public function getOrdersList($page = 1)
	{
		$data = $this->woocommerce->get(
			'orders',
			[
				'page' => $page,
				'per_page' => '10',
			]
		);
		return $data;
	}
	
	public function getOrder($id = 0, $params = [])
	{
		return $this->woocommerce->get('orders/' . $id, $params);
	}
	
	public function validateOrder($obj, $data = [])
	{
		$obj->validate($data,
		[
			'status' => 'required',
		]);

		return $data->except(['_method', '_token']);
	}
	
	public function updateOrder($id = 0, $params = [])
	{
		return $this->woocommerce->put('orders/' . $id, $params);
	}
	
	public function deleteOrder($id = 0)
	{
		return $this->woocommerce->delete('orders/' . $id, ['force' => true]);
	}
	/*end ORDERS*/
	
}
