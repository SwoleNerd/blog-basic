<?php include "config/config.php"; ?>
<?php include "libraries/Database.php"; ?>
<?php include "helpers/format_helper.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Blog Basic</title>
  <meta name="description" content="">
  <meta name="author" content="Jay Watson">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>
  <nav class="navbar">
    <div class="container">
      <span id="logo"><a href="index.php">Blog Basic</a></span>
      <ul class="navbar-list">
        <li class="navbar-item"><a class="" href="index.php">Home</a></li>
        <li class="navbar-item"><a class="" href="posts.php">All Posts</a></li>
        <li class="navbar-item"><a class="" href="#">Get in touch</a></li>
      </ul>
    </div>
  </nav>
  <div class="container spacing">
    <!-- columns should be the immediate child of a .row -->
    <div class="row">
      <div class="nine columns" style="min-height: 500px;">