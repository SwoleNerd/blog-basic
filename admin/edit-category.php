<?php include "includes/header.php"; ?>
<?php
// Get category id
$id = $_GET['id'];
// Create DB instance
$db = new Database; 
// Create query
$query = "SELECT * FROM categories WHERE id = " . $id;
// Execute category query
$category = $db->select($query)->fetch_assoc(); 
?>
<?php
if(isset($_POST['submit'])) {
  // Assign post variables
  $name = mysqli_real_escape_string($db->link, $_POST['name']);
  // Validation
  if ($name == "") {
    $error = "Fill out the required field.";
  } else {
    // Update query
    $query = "UPDATE categories
              SET
              name = '$name'
              WHERE id = " . $id;
    // Execute update query
    $update_row = $db->update($query);
  }
}
?>
<?php
if(isset($_POST['delete'])) {
  // Delete query
  $query = "DELETE FROM categories WHERE id = " . $id;
  $delete_post = $db->delete($query);
}
?>
<h1>Add Category</h1>
<!-- The above form looks like this -->
<form method="post" action="edit-category.php?id=<?php echo $category['id']; ?>">
  <div class="row">
    <div class="twelve columns">
      <label for="">Category Name</label>
      <input class="u-full-width" type="text" placeholder="Add Category" id="" name="name" value="<?php echo $category['name']; ?>">
    </div>
  </div>
  <input class="button-primary" type="submit" value="Submit" name="submit">
  <a href="index.php" class="button">Cancel</a>
  <input class="button-primary" id="btn-danger" type="submit" value="Delete" name="delete">
  
</form>

<?php include "includes/footer.php"; ?>