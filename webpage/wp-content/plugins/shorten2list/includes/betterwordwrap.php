<?php

// PHP Word Wrap routine
// Version 1.0.1, Jan 5th 2004
// Copyright 2004 Kohan Ikin
// syneryder@namesuppressed.com
// http://www.namesuppressed.com/syneryder/

// This software is provided 'as-is', without any express or implied
// warranty.  In no event will the author be held liable for any damages
// arising from the use of this software.

// Permission is granted to use this code for any purpose, but its origin
// must not be misrepresented (ie you must not claim you wrote the code or
// the accompanying tutorial).  If you use this code I would appreciate a
// short email explaining where and how the code is being used, but you
// don't have to if you're too shy :)

// Version History
// 1.00  2000.12.22  Initial release
// 1.01  2004.01.05  Fixed a bug causing tokens that evaluate
//                   to zero to be truncated.  Thanks to Joe
//                   Pfeiffer at New Mexico State University
//                   Computer Science Department and Dave Holle
//                   for alerting me to the problem.



##############################################################
#  wordwrapLine
#
#  Reformats a string to fit within a display with a certain
#  number of columns.  Words are moved between the lines as
#  necessary.  Particularly useful for formatting text to
#  be sent via email (prevents nasty wrap-around problems).
#
#  Params:    $s, the string to be formatted
#             $l, the maximum length of a line
#  Returns:   a string formatted to $width columns
#  Notes:     assumes no newline characters in input
##############################################################

function wordwrapLine($s, $l) {

  $tok = strtok($s, " ");
  while (strlen($tok) != 0) {
    if (strlen($line) + strlen($tok) < ($l + 2) ) {
      $line .= " $tok";
    }
    else {
      $formatted .= "$line\n";
      $line = $tok;
    }
    $tok = strtok(" ");
  }
  $formatted .= $line;
  $formatted = trim($formatted);
  return $formatted;
}



##############################################################
#  wordwrap
#
#  Reformats a string to fit within a display with a certain
#  number of columns.  Words are moved between the lines as
#  necessary.  Particularly useful for formatting text to
#  be sent via email (prevents nasty wrap-around problems).
#
#  Params:    $str, the string to be formatted
#             $linelength, the maximum length of a line
#  Returns:   a string formatted to $width columns
##############################################################

function betterWordwrap($str, $linelength) {

  $str = ereg_replace("([^\r\n])\r\n([^\r\n])", "\\1 \\2", $str);
  $str = ereg_replace("[\r\n]*\r\n[\r\n]*", "\r\n\r\n", $str);
  $str = ereg_replace("[ ]* [ ]*", ' ', $str);
  $str = StripSlashes($str);
  
  $paragraphs = explode("\n", $str);
  $cnt = 0;
  while($cnt < sizeof($paragraphs)) {
    $para = trim(current($paragraphs)); 
    $newparas .= wordwrapLine($para, $linelength) . "\n";
    next($paragraphs);
    $cnt++;
  }
  $newparas = trim($newparas);
  return $newparas;
}

?>