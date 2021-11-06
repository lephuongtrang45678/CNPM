<?php




	function getbookprice($isbn)
	{
		$conn = mysqli_connect("localhost", "root", "", "buy_book");

		$query = "SELECT book_price FROM books WHERE book_isbn = '$isbn'";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			echo "get book price failed! " . mysqli_error($conn);
			exit;
		}
		$row = mysqli_fetch_assoc($result);
		return $row['book_price'];
	}

	
	

/*
		loop through array of $_SESSION['cart'][book_isbn] => number
		get isbn => take from database => take book price
		price * number (quantity)
		return sum of price
	*/

	function total_price($cart)
	{
		$price = 0.0;
		if (is_array($cart)) {
			foreach ($cart as $isbn => $qty) {
				$bookprice = getbookprice($isbn);
				if ($bookprice) {
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

	