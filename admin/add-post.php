<?php include "includes/header.php"; ?>
<?php
// Create DB instance
$db = new Database; 
if(isset($_POST['submit'])) {
  // Assign post variables
  $title = mysqli_real_escape_string($db->link, $_POST['title']);
  $author = mysqli_real_escape_string($db->link, $_POST['author']);
  $body = mysqli_real_escape_string($db->link, $_POST['body']);
  $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
  $category = mysqli_real_escape_string($db->link, $_POST['category']);
  // Validation
  if ($title == "" ||
      $body == "" || 
      $category == "" ||
      $author == "") {
    $error = "Fill out all required fields.";
  } else {
    // Insert query
    $query = "INSERT INTO posts
              (category, title, body, author, tags)
              VALUES($category, '$title', '$body', '$author', '$tags')";
    // Execute insert query
    $insert_row = $db->insert($query);
  }
}
// Create query
$query = "SELECT * FROM categories";
// Execute category query
$categories = $db->select($query); 
?>
<h1>Add Post</h1>
<!-- The above form looks like this -->
<form method="post" action="add-post.php">
  <div class="row">
    <div class="six columns">
      <label for="">Title</label>
      <input class="u-full-width" type="text" placeholder="Post Title" id="" name="title">
    </div>
    <div class="six columns">
      <label for="exampleRecipientInput">Choose a Category</label>
      <select class="u-full-width" id="exampleRecipientInput" name="category">
        <?php while($row = $categories->fetch_assoc()) : ?>
          <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
        <?php endwhile; ?>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="six columns">
      <label for="">Author</label>
      <input class="u-full-width" type="text" placeholder="Author" id="" name="author">
    </div>
    <div class="six columns">
      <label for="">Tags</label>
      <input class="u-full-width" type="text" placeholder="Tags" id="" name="tags">
    </div>
  </div>
  <label for="exampleMessage">Message</label>
  <textarea class="u-full-width" placeholder="Blog away..." id="blog-msg" name="body" rows="30"></textarea>

  <input class="button-primary" type="submit" value="Submit" name="submit">
  <a href="index.php" class="button">Cancel</a>
</form>

<?php include "includes/footer.php"; ?>