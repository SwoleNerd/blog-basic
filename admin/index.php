<?php include "includes/header.php"; ?>
<?php
// Create DB instance
$db = new Database;

// DB query for posts and category name
$query = "SELECT posts.*, categories.name FROM posts
          INNER JOIN categories
          ON posts.category = categories.id
          ORDER BY posts.id DESC";
// Execute query
$posts = $db->select($query);

// DB query for categories
$query = "SELECT * FROM categories
          ORDER BY name DESC";
// Execute query
$categories = $db->select($query);
?>
<h1>Admin Dashboard</h1>
<table class="u-full-width">
  <thead>
    <tr>
      <th>Post ID</th>
      <th>Post Title</th>
      <th>Category</th>
      <th>Author</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $posts->fetch_assoc()) : ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><a href="edit-post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['author']; ?></td>
        <td><?php echo formatDate($row['date']); ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<table class="u-full-width">
  <thead>
    <tr>
      <th>Category ID</th>
      <th>Category Name</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $categories->fetch_assoc()) : ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><a href="edit-category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<?php include "includes/footer.php"; ?>