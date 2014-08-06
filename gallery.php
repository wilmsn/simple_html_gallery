<?php
#
# Change this part to your individual configuration
#
$exclude_list = array(".", "..", "text.txt");
# "dir" will contain the gallery
$mygallery=$_GET["dir"];
# this is the unix basedir of all the galleries
$basedir="/var/www/bilder/";
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
<?php echo "var headline='<center>$mytext</center>'; "; ?>
var aktbildno=0;
var aktbild = bilder[aktbildno];

//window.onload = function () {
//	$('head').append("<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>");
//}
$(function () {
	$('#bs_gallerywrapper').hide();
	$('#help').html('<img src=/img/ask.png width=40 height=40>');
	$('#help_box').hide();
	$('#ovl_left').click(function() {
		prevpic();
	});
	$('#ovl_right').click(function() {
		nextpic();
	});
	$('#ovl_center').click(function () {
		$('#bs_gallerywrapper').show();
		$('#bs_ctl_l').css('top',screen.height / 2 - 30);
		$('#bs_ctl_r').css('top',screen.height / 2 - 30);
		screenfull.request($('#bs_gallerywrapper')[0]);
	});
	$('#bs_ovl_left').click(function() {
		prevpic();
	});
	$('#bs_ovl_right').click(function() {
		nextpic();
	});
	$('#help').click(function() {
		$('#help_box').show();
        gethelp('/help/help_gallery.html');
	});
	$('#help_box_close').click(function() {
		$('#help_box').hide();
	});
	$('#bs_ovl_center').click(function () {
		screenfull.exit();
		$('#bs_gallerywrapper').hide();
	});
	document.addEventListener(screenfull.raw.fullscreenchange, function () {
		if (screenfull.isFullscreen) {
			$('#bs_pic').show();
		} else {
			$('#picturewrapper').show();
			$('#bs_gallerywrapper').hide();
		}
	});
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
    var style_big='style=" border:10px solid #fff; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; -webkit-box-shadow: 0 0 2px #999; -moz-box-shadow: 0 0 2px #999; box-shadow: 0 0 2px #999;"';
	var style_small='style=" border: 5px solid #fff; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; -webkit-box-shadow: 0 0 2px #999; -moz-box-shadow: 0 0 2px #999; box-shadow: 0 0 2px #999;"';
	var bs_pic_x = (screen.height * 4 / 3) - 20;
	var bs_pic_y = screen.height - 20;
	var bs_buf_x = (screen.width - bs_pic_x - 40) / 2;
	var bs_buf_y = bs_buf_x * 3 / 4; 
	var dim=' width=600 height=450 ';
	var buf_dim=' width=80 height=60 ';
	var bs_dim=' width=' + bs_pic_x + ' height=' + bs_pic_y + ' ';
	var bs_buf_dim=' width=' + bs_buf_x + ' height=' + bs_buf_y + ' ';
	$('#bs_pic').hide();
	$('#bs_pic').html('<img src=' + bilder[aktbildno] + bs_dim + style_big + '>');
	$('#bs_pic').show();
	$('#pic').hide();
	$('#pic').html('<img src=' + bilder[aktbildno] + dim + style_big + '>');
	$('#pic').show();
	if (aktbildno > 0) {
		$('#ctl_l').html('<img src=' + bilder[aktbildno-1] + buf_dim + style_small + ' >');
		$('#bs_ctl_l').html('<img src=' + bilder[aktbildno-1] + bs_buf_dim + style_small + ' >');
	} else {
		$('#ctl_l').html('<img src=/img/stop.png' + buf_dim + style_small + ' >');
		$('#bs_ctl_l').html('<img src=/img/stop.png' + bs_buf_dim + style_small + ' >');
	}
	if (aktbildno < bilder.length -1) {
		$('#ctl_r').html('<img src=' + bilder[aktbildno+1] + buf_dim + style_small + ' >');
		$('#bs_ctl_r').html('<img src=' + bilder[aktbildno+1] + bs_buf_dim + style_small + ' >');
	} else {
		$('#ctl_r').html('<img src=/img/stop.png' + buf_dim + style_small + ' >');
		$('#bs_ctl_r').html('<img src=/img/stop.png' + bs_buf_dim + style_small + ' >');
	}  
	$('#galleryhead').html(headline);
}

function gethelp(mypage) {
  $.get(mypage, function(data) { 
     $('#help_box_text').hide();
     $('#help_box_text').html(data); 
     $('#help_box_text').show();
});
}

</script>

		<div id=gallerywrapper>
			<div id=galleryhead></div>
            <div id=picturewrapper>
				<div id=ctl_l></div>
				<div id=pic></div>
				<div id=ctl_r></div>
				<div id=ovl_left></div>
				<div id=ovl_center></div>
				<div id=ovl_right></div>
				<div id=help></div>
			</div>	
		</div>
				<div id=help_box class=help_box>
				    <div id=help_box_head class=help_box_head>Hilfe zum Fotoalbum
						<div id=help_box_close class=help_box_close><img src=/img/close1.png></div>
                    </div> 
					<div id=help_box_text class=help_box_text>
					</div>
				</div>	
		<div id=bs_gallerywrapper>
			<div id=bs_ctl_l></div>
			<div id=bs_pic></div>
			<div id=bs_ctl_r></div>
			<div id=bs_ovl_left></div>
			<div id=bs_ovl_center></div>
			<div id=bs_ovl_right></div>
		</div>	

