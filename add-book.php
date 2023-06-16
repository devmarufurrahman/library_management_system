<?php
include 'partials/header.php';
require 'config/db.php';
$isShowSuccessMessage = false;
if (isset($_POST["book_name"])) {
    $book_name = $_POST["book_name"];
    $author_name = $_POST["author_name"];
    $price = $_POST["price"];
    $userId = $_SESSION["user"]["id"];
    $query = "INSERT INTO books(book_name, author_name, price, user_id) VALUES('$book_name', '$author_name', '$price', '$userId')";
    $execute = mysqli_query($dbConn, $query);
    if (mysqli_error($dbConn)) {
        print_r(mysqli_error($dbConn));
        exit(0);
    }
    $isShowSuccessMessage = true;

}
?>

<!-- content started  -->
<!-- toaster code  -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Add Book</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Successfully added book into database
    </div>
  </div>
</div>
<!-- toaster code  -->
<div class="container px-5 py-5 add-book-wrapper">
	<form method="post" action="add-book.php">
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Book Name</label>
			<input
				type="text"
				class="form-control"
				name="book_name"
				id="exampleFormControlInput1"
				placeholder="Enter book name" />
		</div>
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label"
				>Author Name</label
			>
			<input
				type="text"
				name="author_name"
				class="form-control"
				id="exampleFormControlInput1"
				placeholder="Enter author name" />
		</div>
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label"
				>Book Price</label
			>
			<input
				type="number"
				name="price"
				class="form-control"
				id="exampleFormControlInput1"
				placeholder="Price" />
		</div>
		<div class="text-center mb-3">
			<button class="btn btn-primary">Add Book</button>
		</div>
	</form>
</div>
<!-- content ended  -->
<?php include 'partials/bootstrap.php'?>

<script>
	const toastTrigger = document.getElementById('liveToastBtn')
	const toastLiveExample = document.getElementById('liveToast')

	const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
	<?php
if ($isShowSuccessMessage) {
    echo 'toastBootstrap.show();';
}

?>
</script>
<?php include 'partials/footer.php'?>
