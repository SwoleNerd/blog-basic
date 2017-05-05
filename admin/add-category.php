<?php include "includes/header.php"; ?>
<?php
// Create DB instance
$db = new Database; 
if(isset($_POST['submit'])) {
  // Assign post variables
  $name = mysqli_real_escape_string($db->link, $_POST['name']);
  // Validation
  if ($name == "") {
    $error = "Fill out all required fields.";
  } else {
    // Insert query
    $query = "INSERT INTO categories
              (name)
              VALUES('$name')";
    // Execute insert query
    $insert_row = $db->insert($query);
  }
}
?>
<h1>Add Category</h1>
<!-- The above form looks like this -->
<form method="post" action="add-category.php">
  <div class="row">
    <div class="twelve columns">
      <label for="">Category Name</label>
      <input class="u-full-width" type="text" placeholder="Add Category" id="" name="name">
    </div>
  </div>
  <input class="button-primary" type="submit" value="Submit" name="submit">
  <a href="index.php" class="button">Cancel</a>
</form>

<?php include "includes/footer.php"; ?>