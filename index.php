
<?php include 'partials/header.php'?>

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
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>
        <button class="btn btn-sm btn-success">Edit</button>
        <button class="btn btn-sm btn-danger">Delete</button>
      </td>
    </tr>

  </tbody>
</table>
</div>
<!-- content ended  -->
<?php include 'partials/footer.php'?>
