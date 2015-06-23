<form name="myform" action="#" method="POST">



<?php
$dirPath = dir('../pdfs');
$imgArray = array();
while (($file = $dirPath->read()) !== false)
{
  if ((substr($file, -3)=="rar") || (substr($file, -3)=="zip"))
  {
     $imgArray[ ] = trim($file);
  }
}
$dirPath->close();
sort($imgArray);
$c = count($imgArray);
for($i=0; $i<$c; $i++)
{
    echo "<input type=\"radio\" name=\"group1\" value=\"" . $imgArray[$i] . "\">" . $imgArray[$i] . "<br />";
}
?>
</select>

<input type="submit" value="download">