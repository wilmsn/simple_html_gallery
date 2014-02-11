<?php
#
# Change this part to your individual configuration
#
$exclude_list = array(".", "..", "text.txt");
# "dir" will contain the gallery
$mygallery=$_GET["dir"];
# this is the unix basedir of all the galleries
$basedir="/home/norbert/www/bilder/";
# the dir of the galleries as seen from the werbserver
$htmlprefix="/bilder/";
# $mytext contains the headline from the file "text.txt"
$mytext = file_get_contents("$basedir$mygallery/text.txt");
#
# No configuration below this
#
?>

<script type="text/javascript">
bilder = new Array(
<?php
$myfiles = array_diff(scandir("$basedir$mygallery"), $exclude_list);
$i=0;
foreach($myfiles as $thisfile) {
   if ( $i > 0) { echo ","; }
   echo "'$htmlprefix$mygallery/$thisfile' ";
   $i++;
}
?>

);
<?php echo "var headline='<div id=Galleryhead><center>$mytext</center></div>'; "; ?>
var aktbildno=0;
var aktbild = bilder[aktbildno];
$(function(){
  $('#Content').html(headline+'<div id=Gallery></div><div id=Gallerybuffer style="display: none;"></div>');
  $('#Gallerybuffer').hide();
  showpic();
});
function nextpic(){
  if (aktbildno < bilder.length -1) {
    aktbildno++;
  }
  showpic();
}
function prevpic(){
  if ( aktbildno > 0 ) {
    aktbildno--;
  }
  showpic();
}
function showpic(){
  var htmlstr='<center><table><tr><td></td>';
  htmlstr=htmlstr+'<td rowspan=3><img src='+bilder[aktbildno]+' class=bild></td><td></td></tr>';
  htmlstr=htmlstr+'<tr><td>';
  if ( aktbildno > 0 ) {
    htmlstr=htmlstr+'<a href="#" onclick="prevpic()" class="ctl-l"><img src=/img/arrow_left.gif></a>';
  } else {
    htmlstr=htmlstr+'<img src=/img/arrow_left_e.gif>';
  }
  htmlstr=htmlstr+'</td><td></td><td>';
  if (aktbildno < bilder.length -1) {
    htmlstr=htmlstr+'<a href="#" onclick="nextpic()"><img src=/img/arrow_right.gif></a>';
  } else {
    htmlstr=htmlstr+'<img src=/img/arrow_right_e.gif>';
  }
  htmlstr=htmlstr+'</td></tr><td></td><td></td><td></td></tr></table></center>';
  var htmlbufstr='';
  if (aktbildno < bilder.length -1) {
    htmlbufstr='<img src='+bilder[aktbildno+1]+' width=1 height=1>';
  }
  $('#Gallery').hide();
  $('#Gallery').html(htmlstr);
  $('#Gallery').show();
  $('#Gallerybuffer').html(htmlbufstr);
}

