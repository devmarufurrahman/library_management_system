<?php
include 'partials/header.php';
require "config/db.php";
$isShowSuccessMessage = false;
$message = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "DELETE FROM books WHERE id = '$id'";
    $delete = mysqli_query($dbConn, $query);
    if (mysqli_error($dbConn)) {
        print_r(mysqli_error($dbConn));
        exit(0);
    }
    $isShowSuccessMessage = true;
    $message = "Successfully deleted from database";
}

if (isset($_POST["book_name"])) {
    $id = $_POST["id"];
    $book_name = $_POST["book_name"];
    $author_name = $_POST["author_name"];
    $price = $_POST["price"];

    $query = "UPDATE books SET book_name = '$book_name', author_name = '$author_name', price = '$price' WHERE id = $id";
    $update = mysqli_query($dbConn, $query);
    if (mysqli_error($dbConn)) {
        print_r(mysqli_error($dbConn));
        exit(0);
    }
    $isShowSuccessMessage = true;
    $message = "Successfully updated in database";
}

?>
<!-- toaster code  -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
	<div
		id="liveToast"
		class="toast"
		role="alert"
		aria-live="assertive"
		aria-atomic="true">
		<div class="toast-header">
			<strong class="me-auto">Message</strong>
			<button
				type="button"
				class="btn-close"
				data-bs-dismiss="toast"
				aria-label="Close"></button>
		</div>
		<div class="toast-body"><?php echo $message; ?></div>
	</div>
</div>
<!-- toaster code  -->

<!-- modal code  -->
<!-- Modal -->
<form method="post" action="index.php">
	<div
		class="modal fade"
		id="exampleModal"
		tabindex="-1"
		aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
					<button
						type="button"
						class="btn-close"
						data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label"
							>Book Name</label
						>
						<input name="id" id="book_id" hidden type="number" />
						<input
							type="text"
							class="form-control"
							name="book_name"
							id="book_name"
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
							id="author_name"
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
							id="book_price"
							placeholder="Price" />
					</div>
				</div>
				<div class="modal-footer">
					<button
						type="button"
						class="btn btn-secondary"
						data-bs-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- modal code  -->

<!-- content started  -->
<div class="d-flex justify-content-center align-items-center flex-column py-5">
	<h2>List of Books</h2>
	<table class="table w-75">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Book Name</th>
				<th scope="col">Author Name</th>
				<th scope="col">Price</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php

$user_id = $_SESSION["user"]["id"];
$query = "SELECT * FROM books WHERE user_id = '$user_id'";
$data = mysqli_query($dbConn, $query);

$sl = 1;
while ($book = mysqli_fetch_assoc($data)) {
    $dataForSend = "'" . $book["id"] . "'" . "," . "'" . $book["book_name"] . "'" . "," . "'" . $book["author_name"] . "'" . "," . "'" . $book["price"] . "'";

    ?>
			<tr>
				<th scope="row"><?php echo $sl; ?></th>
				<td><?php echo $book["book_name"]; ?></td>
				<td><?php echo $book["author_name"]; ?></td>
				<td><?php echo $book["price"]; ?></td>
				<td>
					<button
						data-bs-toggle="modal"
						data-bs-target="#exampleModal"
						class="btn btn-sm btn-success"
            onclick="bindDataWithEditForm(<?php echo $dataForSend; ?>,)"
            >
						Edit
					</button>
					<a
						href="index.php?id=<?php echo $book['id']; ?>"
						class="btn btn-sm btn-danger"
						>Delete</a
					>
				</td>
			</tr>
			<?php $sl++;}?>
		</tbody>
	</table>
</div>
<!-- content ended  -->
<?php include 'partials/bootstrap.php';?>
<script>

	const bindDataWithEditForm = (id, book_name, author_name, book_price)=>{
    console.log(book_price)
	  document.getElementById("book_id").value = id;
	  document.getElementById("book_name").value = book_name;
	  document.getElementById("author_name").value = author_name;
	  document.getElementById("book_price").value = book_price;
	}

			const toastTrigger = document.getElementById('liveToastBtn')
			const toastLiveExample = document.getElementById('liveToast')

			const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
		<?php

if ($isShowSuccessMessage) {
    echo 'toastBootstrap.show();';
}
?>
</script>
<?php include 'partials/footer.php';?>
