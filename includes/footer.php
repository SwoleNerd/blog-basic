      </div>
      <div class="three columns rounded-border">
        <h4>About</h4>
        <p><?php echo $siteDescription; ?></p>
      </div>
      <div class="three columns rounded-border spacing">
        <h4>Categories</h4>
        <nav class="category-navbar">
        <?php if($categories) : ?>
          <ul class="navbar-list">
            <?php while($row = $categories->fetch_Assoc()) : ?>
            <li class="navbar-item"><a class="" href="posts.php?category=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
            <?php endwhile ?>
          </ul>
          <?php endif; ?>
        </nav>
      </div>
    </div>
  </div>
  <div class="container spacing">
    <footer>
      <p>&copy; 2017 Blog Basic - Built with Skeleton</p>
    </footer>
  </div>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>