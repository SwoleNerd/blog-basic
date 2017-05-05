<?php include "includes/header.php"; ?>
<?php
// Get post id
$id = $_GET['id'];
// Create DB instance
$db = new Database; 
// Query posts table
$query = "SELECT * FROM posts WHERE id = " . $id;
// Execute query
$post = $db->select($query)->fetch_assoc();

// Query categories table
$query = "SELECT * FROM categories";
// Execute categories query
$categories = $db->select($query);
?>
<?php
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
    // Update query
    $query = "UPDATE posts
              SET
              title = '$title',
              body = '$body',
              category = '$category',
              tags = '$tags',
              author = '$author'
              WHERE id = " . $id;
    // Execute update query
    $update_row = $db->update($query);
  }
}
?>
<?php
if(isset($_POST['delete'])) {
  // Delete query
  $query = "DELETE FROM posts WHERE id = " . $id;
  $delete_post = $db->delete($query);
}
?>


<h1>Edit Post</h1>
<!-- The above form looks like this -->
<form method="post" action="edit-post.php?id=<?php echo $post['id']; ?>">
  <div class="row">
    <div class="six columns">
      <label for="">Title</label>
      <input class="u-full-width" type="text" placeholder="Post Title" id="" value="<?php echo $post['title']; ?>" name="title">
    </div>
    <div class="six columns">
      <label for="exampleRecipientInput">Choose a Category</label>
      <select class="u-full-width" id="exampleRecipientInput" name="category">
        <?php while($row = $categories->fetch_assoc()) : ?>
          <?php 
            if($row['id'] == $post['category']) {
              $selected = "selected"; 
            } else {
              $selected = "";
            } 
          ?>
          <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
        <?php endwhile; ?>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="six columns">
      <label for="">Author</label>
      <input class="u-full-width" type="text" placeholder="Author" id="" name="author" value="<?php echo $post['author']; ?>">
    </div>
    <div class="six columns">
      <label for="">Tags</label>
      <input class="u-full-width" type="text" placeholder="Tags" id="" name="tags" value="<?php echo $post['tags']; ?>">
    </div>
  </div>
  <label for="exampleMessage">Message</label>
  <textarea class="u-full-width" placeholder="Blog away..." id="blog-msg" name="body" rows="30">
  <?php echo $post['body']; ?>
  </textarea>

  <input class="button-primary" type="submit" value="Submit" name="submit">
  <a href="index.php" class="button">Cancel</a>
  <input class="button-primary" id="btn-danger" type="submit" value="Delete" name="delete">
  
</form>

<?php include "includes/footer.php"; ?>