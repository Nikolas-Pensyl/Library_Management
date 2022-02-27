<?php

include "CONNECT.php";

echo "
	<script type=text/javascript>
		var member = prompt('Enter the member ID for the customer:');
	</script>
	";
$member = "<script type=text/javascript> document.write(member); </script>";

$ISBN = $_POST['ISBN'];


$stmt = "select count(*) from checkout where member_id = '$member';";
$result = mysqli_query($conn, $stmt);

$checked_out = mysqli_fetch_assoc($result)['count(*)'];

$stmt = "select staff from members where id = '$member';";
$result = mysqli_query($conn, $stmt);
$isStaff = mysqli_fetch_assoc($result);


$stmt = "select copies from books where isbn = '$ISBN';";
$result = mysqli_query($conn, $stmt);
$copies = mysqli_fetch_assoc($result)['copies'];

if($copies == 0) {
	echo
	"
	<script>alert('This book is currently out of stock. Please try again later.')</script>
	";
}


$stmt = "select short_term from books where isbn = '$ISBN';";
$result = mysqli_query($conn, $stmt);
$short_term = mysqli_fetch_assoc($result);

$date = date_create(date("Y-m-d"));
if($short_term==1) {
	$duedate = date_add($date, date_interval_create_from_date_string("7 days"));
} else {
	$duedate = date_add($date, date_interval_create_from_date_string("28 days"));
}


if($checked_out >= 12) {
	echo
	"
		<script>alert('You cannot check out more than 12 books. Please return some books and try again later.')</script>
	";
} else if(($checked_out >=6) && ($isStaff == 0)) {
	echo
	"
		<script>alert('You cannot check out more than 6 books. Please return some books and try again later.')</script>
	";
} else {
	$stmt = "insert into checkout
		(book_isbn, member_id, out_date, due_date)
		values
		('$ISBN', $member, '".date_format($date, 'Y-m-d')."', '".date_format($duedate, 'Y-m-d')."');";
	$results = mysqli_query($conn, $stmt);
	
	$copies = $copies - 1;
	$stmt = "update table books set copies = $copies where isbn = '$ISBN';";
	
	$results = mysqli_query($conn, $stmt);
	echo "
		<script>alert('Book successfully checked out')</script>
	";
}

echo "<meta http-equiv='refresh' content='0; url=search_books.php'>";


?>