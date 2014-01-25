<?php
#
# Just enter you directories starting with a slash and ending without slash !!
#
#$webserverbasedir="/base/dir/of/your/webserver";
$webserverbasedir="/base/dir/of/your/webserver";
#$gallerybasedir="/basedir/of/your/galleries";
$gallerybasedir="/basedir/of/your/galleries";
$name_photographer="Mister Nobody";
$homepage_photographer="www.your_homepage.com";
$myheadlinefile="text.txt";
$my_arrow_left="/arrow_left.gif";
$my_arrow_right="/arrow_right.gif";
#
# No configurable items below !!!
#
?>
<!doctype html>
<html lang="de">
    <head>
        <link rel="stylesheet" type="text/css" href="/css/styles_jc.css">
        <script type="text/javascript" src="http://sorgalla.com/jcarousel/dist/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="http://sorgalla.com/jcarousel/examples/basic/jcarousel.basic.js"></script>
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    </head>
    <body>
       <h1><center>
<?php
$exclude_list = array(".", "..", "$myheadlinefile");
$mygallery=$_GET["dir"];
$htmlprefix=" <li><img src='$gallerybasedir/";
$htmlpostfix="' width='600' height='450' alt=''></li>";
$mytext = file_get_contents("$webserverbasedir$gallerybasedir/$mygallery/$myheadlinefile");
echo "$mytext";
echo "</center></h1><div class='wrapper'><div class='jcarousel-wrapper'><div class='jcarousel'><ul>\n";
$myfiles = array_diff(scandir("$webserverbasedir$gallerybasedir/$mygallery"), $exclude_list);
foreach($myfiles as $thisfile) {
   echo "$htmlprefix$mygallery/$thisfile$htmlpostfix\n";
}
?>
                    </ul>
                </div>
             <p class="photo-credits">
                <?php echo " Fotos: <a href='http://$homepage_photographer'>$name_photographer</a> "?>
             </p>
             <a href="#" class="jcarousel-control-prev"><img src=<?php echo "$my_arrow_left"; ?>></a>
             <a href="#" class="jcarousel-control-next"><img src=<?php echo "$my_arrow_right"; ?>></a>                
           </div>
        </div>
    </body>
</html>


