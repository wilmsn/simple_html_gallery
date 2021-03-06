# Simple HTML Gallery
This is Version 1.0 of my simple HTML gallery. 
Feel free to use this gallery for your homepage.

## Features:
- Full screen mode (also on mobile devices)
- preview from next and previous picture
- just put all the files of your gallery in one directory
- if you want a headline just fill one file with it (default: text.txt)
- let the script generate the rest for you!
- implement it in your homepage and load it via javascript (ajax)

## Screenshots
![alt text](https://raw.githubusercontent.com/wilmsn/simple_html_gallery/master/screenshot1.jpg "Screenshot 1")
![alt text](https://raw.githubusercontent.com/wilmsn/simple_html_gallery/master/screenshot2.jpg "Screenshot 2")


## Basic requirements:
- a server with PHP installed and useable inside the webserver

- only one basedirectory for all your galleries
- one subdirectory for every gallery

Like this:
```
   /gallery/base/dir/gallery1
   /gallery/base/dir/gallery2
   ...
   /gallery/base/dir/galleryN
```
## Install it:
The easy way: 
- Just put all the files in the root of your webserver.
 
### Todo:
- Change the "gallery.php" to your needs. Minimum is to set the "$basedir" to the UNIX-basedir of the galleries and to set the "$htmlprefix" to the HTML-basedir of your galleries.
- Change the "index.html" to your needs.

Remember it is just a very basic sceleton.

## How it works:
Inside your html file you put this:
&lt;div id="content"&gt;
&lt;/div&gt;

Between this tags your gallery will been shown.
The gallery will be activated by clicking on a link or a button, use this code for it:

&lt;a href='#' onclick="showgallery('mygallery');"&gt;

Where "mygallery" is the name of the folder containing the pictures.

## See it working

at http://www.wilmie.de

## License

"simple_html_server" is licensed under the [Apache 2.0](http://www.apache.org/licenses/LICENSE-2.0) license. 

It is based on BigScreen (https://github.com/bdougherty/BigScreen) which is 
Copyright 2013 Brad Dougherty.