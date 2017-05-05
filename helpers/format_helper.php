<?php 
/*
 * Function format date
 */
function formatDate($date) {
  return date("M. j, Y, g:i A", strtotime($date));
}

/*
 * Function shorten text
 */
function shortenText($text, $chars = 450) {
  //$text = $text . " ";
  $text = substr($text, 0, $chars);
  $text = substr($text, 0, strrpos($text, ' '));
  $text = $text . "...";
  return $text; 
}
?>