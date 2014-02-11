This is just a very basic and easy to use gallery for your homepage.

Main advantage:
- just put all the files of your gallery in one directory
- if you want a headline just fill one file with it (default: text.txt)
- let the script generate the rest for you!
- implement it in your homepage and load it via javascript

Basic requirements:
- a server with PHP installed and useable in the webserver

- only one basedirectory for all your galleries
- one subdirectory for every gallery
Like this:
/gallery/base/dir/gallery1
/gallery/base/dir/gallery2
...
/gallery/base/dir/galleryN

Todo:
Change the "gallery.php" to your needs.
Minimum is to set the "$basedir" to the UNIX-basedir of the galleries and to set the "$htmlprefix" to the HTML-basedir of your galleries.

Change the "index.html" to your needs.
Remember it is just a very basic sceleton.

How it works:
Inside your html file you put this:
&lt;div id="Content"&gt;
&lt;/div&gt;

Between this tags your gallery will been shown.
The gallery will be activated by clicking on a link or a button, use this code for it:

&lt;a href='#' onclick="showgallery('mygallery');"&gt;

Where "mygallery" is the name of the folder containing the pictures.

If you just want to start it put all the file in the documentroot of your webserver.
