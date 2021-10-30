<?php
/*
		loop through array of $_SESSION['cart'][book_isbn] => number
		get isbn => take from database => take book price
		price * number (quantity)
		return sum of price
	*/
	
	function total_price($cart){
		$price = 0.0;
		if(is_array($cart)){
		  	foreach($cart as $isbn => $qty){

				$conn = mysqli_connect("localhost", "root", "", "buy_book");
				$query = "SELECT book_price FROM books WHERE book_isbn = '$isbn'";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
		  		$bookprice = $row['book_price'];
		  		if($bookprice){
		  			$price += $bookprice * $qty;
		  		}
		  	}
		}
		return $price;
	}

	/*
		loop through array of $_SESSION['cart'][book_isbn] => number
		$_SESSION['cart'] is associative array which is [book_isbn] => number of books for each book_isbn
		calculate sum of books 
	*/
	function total_items($cart){
		$items = 0;
		if(is_array($cart)){
			foreach($cart as $isbn => $qty){
				$items += $qty;
			}
		}
		return $items;
	}

	