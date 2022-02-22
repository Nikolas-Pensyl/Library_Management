<?php

include CONNECT.php;

$ISBN = $_POST['ISBN'];
$member = $_POST['member'];

$stmt = "select count(*) from checkout where member_id = '$member';";
$result = mysqli_query($conn, $stmt);

$checked_out = mysqli_fetch_assoc($result);

$stmt = "select staff from members where id = '$member';";
$result = mysqli_query($conn, $stmt);
$isStaff = mysqli_fetch_assoc($result);


$stmt = "select short_term from books where isbn = '$ISBN';";
$result = mysqli_query($conn, $stmt);
$short_term = mysqli_fetch_assoc($result);


$date = date("Y-M-D");
if($short_term) {
	$duedate = date_add($date, date_interval_create_from_date_string("7 days"));
} else {
	$duedate = date_add($date, date_interval_create_from_date_string("28 days"));
}


if($checked_out >= 12) {
	die("You can't check out more than 12 books. Please return some books before trying to borrow more.");
} else if(($checked_out >=6 && ($isStaff == false)) {
	die("You can't check out more than 6 books. Please return some books before trying to borrow more.");
} else {
	$stmt = "insert into checkout
		(book_isbn, member_id, out_date, due_date)
		values
		('$ISBN', $member, '$date', '$duedate');";
	
	$results = mysqli_query($conn, $stmt);
}


?>