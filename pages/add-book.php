<?php include '../partials/header.php'?>

<!-- content started  -->
<div class="container px-5 py-5 add-book-wrapper">
	<form>
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Book Name</label>
			<input
				type="text"
				class="form-control"
				id="exampleFormControlInput1"
				placeholder="Enter book name" />
		</div>
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label"
				>Author Name</label
			>
			<input
				type="text"
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
<?php include '../partials/footer.php'?>
