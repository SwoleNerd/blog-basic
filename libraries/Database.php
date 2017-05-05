<?php 

class Database {
  public $host = DB_HOST; 
  public $username = DB_USER;
  public $password = DB_PASS; 
  public $db_name = DB_NAME;
  
  public $link; // Variable to hold instance of mysqli object
  public $error; // Variable to hold instance of error message
  
  /*
   * Constructor 
   */
  public function __construct() {
    // Call connect function
    $this->connect(); 
  }
  
  
  /*
   * Connect Function 
   */
  private function connect() {
    $this->link = new mysqli($this->host, $this->username, $this->password, $this->db_name);
    
    if (!$this->link) {
      $this->error = "Connection failed: " . $this->link->connect_error;
      return false; 
    }
  }

  /*
   * Select Function 
   */

  public function select($query) {
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if ($result->num_rows > 0) {
      return $result;
    } else {
      return false; 
    }
  }
  
  /*
   * Insert Function 
   */

  public function insert($query) {
    $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
    if ($insert_row) {
      header("Location: index.php?msg=".urlencode('Record Added'));
      exit();
    } else {
      die('Error: ' . $this->link->errno . ') - ' . $this->link->error);
    }
  }
          
  /*
   * Update Function 
   */

  public function update($query) {
    $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
    if ($update_row) {
      header("Location: index.php?msg=".urlencode('Record Updated'));
      exit();
    } else {
      die("Error: " . $this->link->errno . ") - " . $this->link->error);
    }
  }
          
  /*
   * Delete Function 
   */

  public function delete($query) {
    $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
    if ($delete_row) {
      header("Location: index.php?msg=".urlencode('Record Deleted'));
    } else {
      die("Error: " . $this->link->errno . ") - " . $this->link->error);
    }
  }
}