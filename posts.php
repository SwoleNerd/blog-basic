<?php include "includes/header.php"; ?>
<?php 
  //Create db object
  $db = new Database();

  //Check URL category
  if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $query = "SELECT * FROM posts WHERE category = " . $category . " ORDER BY id DESC";
    $posts = $db->select($query);
  } else {
    // db query
    $query = "SELECT * FROM posts ORDER BY id DESC";
    // Run db query
    $posts = $db->select($query);
  }
  // db query - categories
  $query = "SELECT * FROM categories";
  // Run db query
  $categories = $db->select($query);
?>
<?php if($posts) : ?>
  <?php while($row = $posts->fetch_assoc()) : ?>
        <h3><?php echo $row['title']; ?></h3> 
        <p><?php echo shortenText($row['body']); ?></p>
        <a href="post.php?id=<?php echo urlencode($row['id']); ?>" class="button">Read More</a>
        <p class="u-pull-right"><small>Written by <?php echo $row['author']; ?> on <?php echo formatDate($row['date']); ?></small></p>
        <hr>
  <?php endwhile; ?>
        
<?php else : ?>
  <p>My apologies. There aren't any posts.</p>
<?php endif; ?>
<?php include "includes/footer.php"; ?>