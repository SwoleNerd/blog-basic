<?php include "includes/header.php"; ?>
  <?php 
  $id = $_GET['id'];
  //Create db object
  $db = new Database();
  // db query
  $query = "SELECT * FROM posts WHERE id = " . $id;
  // Run db query
  $post = $db->select($query)->fetch_assoc();

  // db query - categories
  $query = "SELECT * FROM categories";
  // Run db query
  $categories = $db->select($query);
  ?>
        <h3><?php echo $post['title']; ?></h3>
        <p><?php echo $post['body']; ?></p>
<?php include "includes/footer.php"; ?>