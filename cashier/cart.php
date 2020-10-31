<?php
session_start(); //start session
//session_destroy();
include_once("config.inc.php"); //include config file
//include"../includes/header-scripts.php";
setlocale(LC_MONETARY,"en_US"); // US national format (see : http://php.net/money_format)
############# add products to session #########################
if(isset($_POST["productCode"]))
{
	foreach($_POST as $key => $value){
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array 
	}
	
	//we need to get product name and price from database.
	$statement = $mysqli_conn->prepare("SELECT description, sellingPrice FROM tbl_products WHERE productCode=? LIMIT 1");
	$statement->bind_param('s', $new_product['productCode']);
	$statement->execute();
	$statement->bind_result($product_name, $product_price);
	

	while($statement->fetch()){ 
		$new_product["description"] = $product_name; //fetch product name from database
		$new_product["sellingPrice"] = $product_price;  //fetch product price from database
		
		if(isset($_SESSION["pos"])){  //if session var already exist
			if(isset($_SESSION["pos"][$new_product['productCode']])) //check item exist in products array
			{
				unset($_SESSION["pos"][$new_product['productCode']]); //unset old item
			}			
		}
		
		$_SESSION["pos"][$new_product['productCode']] = $new_product;	//update products with new item array	
	}
	
 	$total_items = count($_SESSION["pos"]); //count total items
	die(json_encode(array('items'=>$total_items))); //output json 

}

################## list products in cart ###################
if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
{

	if(isset($_SESSION["pos"]) && count($_SESSION["pos"])>0){ //if we have session variable
		$cart_box = '<ul class="cart-products-loaded">';
		$total = 0;
		foreach($_SESSION["pos"] as $product){ //loop though items and prepare html content
			
			//set variables to use them in HTML content below
			$product_name = $product["description"]; 
			$product_price = $product["sellingPrice"];
			$product_code = $product["productCode"];
			$product_qty = $product["quantity"];
			//$product_color = $product["product_color"];
			//$product_size = $product["product_size"];
			
			//$cart_box .=  "<li> $product_name (Qty : $product_qty | $product_color  | $product_size ) &mdash; $currency ".sprintf("%01.2f", ($product_price * $product_qty)). " <a href=\"#\" class=\"remove-item\" data-code=\"$product_code\">&times;</a></li>";
			$cart_box .=  "<li> $product_name (Qty : $product_qty | ) &mdash; $currency ".sprintf("%01.2f", ($product_price * $product_qty)). " <a href=\"#\" class=\"remove-item\" data-code=\"$product_code\">&times;</a></li>";
			$subtotal = ($product_price * $product_qty);
			$total = ($total + $subtotal);
		}
		$cart_box .= "</ul>";
		$cart_box .= '<div class="cart-products-total">Total : '.$currency.sprintf("%01.2f",$total).' <u><a href="view_cart.php" title="Review Cart and Check-Out">Check-out</a></u></div>';
		die($cart_box); //exit and output content
	}else{
		die("Your Cart is empty"); //we have empty cart
	}
}

################# remove item from shopping cart ################
if(isset($_GET["remove_code"]) && isset($_SESSION["pos"]))
{
	$product_code   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

	if(isset($_SESSION["pos"][$product_code]))
	{
		unset($_SESSION["pos"][$product_code]);
	}
	
 	$total_items = count($_SESSION["pos"]);
	die(json_encode(array('items'=>$total_items)));
}