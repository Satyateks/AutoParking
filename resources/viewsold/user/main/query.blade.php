<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
    font-family: 'Open Sans', sans-serif;
    font-weight: 400;
    line-height: 1.5;
    max-width: 100%;
    overflow: scroll;
}
.searchbar .search {
    display: inline-block;
    border: 0px solid grey;
    padding: 0px;
    transition: all 0.15s ease;
}
.searchbar input[type=text] {
    font-size: 14px;
    border: 1px solid #888;
    border-radius: 5px;
    padding: 10px;
    width: 15em;
	margin: 10px 2px 0 0;
}

/* ##### Buttons ##### */
.btn-group .button {
    background-color: #FFF;
    color: #888;
    padding: 10px;
    text-align: center;
    display: inline-block;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.15s ease;
    border: 1px solid #888;
    border-radius: 5px;
    margin: 10px 2px;
}
.btn-group {
    display: inline-block;
}
.btn-group .button:hover {
    background-color: #888;
    color: white;
}
.btn-group .button:active, .btn-group .button:focus {
    background-color: #888;
    color: white;
}
/* ##### Boxen ##### */
.container {
    display: flex;
    flex-wrap: wrap;
}

.container-btn {
    margin: 0 0 20px 0px;
    display: flex;
    flex-wrap: wrap;
}
.item {
    max-width: 270px;
    min-height: 270px;
    background-color: #FFF;
    float: left;
    margin: 7px;
    position: relative;
    box-shadow: 0px 4px 6px 0 rgba(0,0,0,0.5);
    transition: 0.3s;
    padding: 15px 15px 10px 5px;
}
.imgframe {
    display: inline-block;
    position: relative;
    width: 70px;
    height: 70px;
    overflow: hidden;
    border-radius: 5px;
    background: #FFF;
    float: right;
-webkit-box-shadow: inset 2px 2px 3px 1px rgba(0,0,0,0.40);
-moz-box-shadow: inset 2px 2px 3px 1px rgba(0,0,0,0.40);
box-shadow: inset 2px 2px 3px 1px rgba(0,0,0,0.40);
}
.imgframe img {
    width: 75%;
    height: auto;
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
.item:hover {
    box-shadow: 0 20px 20px 0 rgba(0,0,0,0.5);
}
.titlediv {
    min-height: 70px;
    display: block;
    line-height: 1em;
    margin: 1em;
}
.title {
    font-size: 1em;
    font-weight: 900;
    color: #888;
}
.type {
    font-size: 12px;
    font-weight: 700;
    margin-left: 10px;
    padding: 5px 10px;
    border-radius: 5px;
    display: inline-block;
    position: flex;
    color: #FFF;
    border:0px solid #fff;
    background-color: #888;
}
.tag {
    bottom: 15px;
    position: absolute;
}
/* ##### Typografie ##### */

p {
    margin: 10px 3px 3px 13px;
    font-size: 13px;
    color: #515A5A;
    line-height: 18px;
}
/* ##### Filter ##### */
.filterDiv {
    display: none;
}
.show {
    display: flex;
}
.container-btn {
    margin: 0 0 20px 25px;
    display: flex;
    flex-wrap: wrap;
}
.vl {
    border-left: 1px solid lightgrey;
    height: 30px;
    margin: auto 20px;
}

/*top alert*/
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}
.alert.info {background-color: orange;}
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
    </style>
</head>
<body>
<div class="container-btn">
    <div class="searchbar">
      <div class="search">
        <input type="text" id="searchinput" onkeyup="searchFunction()"  placeholder="Search">
      </div>
    </div>
    <div class="vl"></div>
    <div class="buttons">
      <div class="btn-group">
        <button class="button active" onclick="filterSelection('all')"> Show all</button>
        <button class="button" onclick="filterSelection('Images')"> Images</button>
        <button class="button" onclick="filterSelection('Audio')"> Audio</button>
        <button class="button" onclick="filterSelection('Video')"> Video</button>
        <button class="button" onclick="filterSelection('Icons')"> Icons</button>
      </div>
    </div>
  </div>

  <div class="container">

  <a href="https://live.staticflickr.com/4032/4616626262_812e2d8db9_b.jpg" target="_blank">
    <div class="item filterDiv Images">
      <div class="content">
        <div class="imgframe"><img src="https://futuremarketing.co/wp-content/uploads/2018/03/flickr_cc_logos.jpg"alt="Flickr Creative Commons"></div>
        <div class="titlediv"><span class="title">Flickr Creative Commons</span></div>
        <p>Flickr is a place you can browse or search for contents under the different types of free Creative Commons Licenses, including public domain resources.</p>
        </br>
        <div class="tag"><span class="type">Images</span></div>
      </div>
    </div>
    </a>


  <a href="https://graphicburger.com/" target="_blank">
    <div class="item filterDiv Icons, Images">
      <div class="content">
        <div class="imgframe"><img src="https://pbs.twimg.com/profile_images/903913611948683264/f7V3YfQd_400x400.jpg"alt="GraphicBurger"></div>
        <div class="titlediv"><span class="title">Graphic- Burger</span></div>
        <p>GraphicBurger is a free market featuring hundreds of icon files.</p>
        </br>
        <div class="tag"><span class="type">Images</span><span class="type">Icons</span></div>
      </div>
    </div>
  </a>

  <a href="https://iconmonstr.com/" target="_blank">
    <div class="item filterDiv Icons">
      <div class="content">
        <div class="imgframe"><img src="https://i.pinimg.com/originals/c7/6a/05/c76a0586385b3ba88bc11c7e2678c724.jpg"alt="iconmonstr"></div>
        <div class="titlediv"><span class="title">iconmonstr</span></div>
        <p>A large and continuing collection of simple icons available for non-commercial and commercial use. The owner requires no need for attribution.</p>
        </br>
        <div class="tag"><span class="type">Icons</span></div>
      </div>
    </div>
    </a>

  <a href="https://lifeofvids.com/" target="_blank">
    <div class="item filterDiv Video">
      <div class="content">
        <div class="imgframe"><img src="https://www.footagesecrets.com/wp-content/uploads/2018/07/life-of-vids-logo.jpg"alt="Life of Vids"></div>
        <div class="titlediv"><span class="title">Life of Vids</span></div>
        <p>No copyright restrictions for personal and commercial use. Limited to redistribution of not more than 10 videos on other sites. Credit of use is appreciated but not required.</p>
        </br>
        <div class="tag"><span class="type">Video</span></div>
      </div>
    </div>
    </a>

  <a href="https://www.lifeofpix.com/" target="_blank">
    <div class="item filterDiv Imagess">
      <div class="content">
        <div class="imgframe"><img src="https://www.lifeofpix.com/wp-content/themes/lifeofpix_v2/img/lop-logo-vert.svg"alt="Life of Pix"></div>
        <div class="titlediv"><span class="title">Life of Pix</span></div>
        <p>Contains free high-resolution photos with no copyrights restrictions for personal and commercial use. All images are donated to the public domain but no mass distribution allowed.</p>
        </br>
        <div class="tag"><span class="type">Images</span></div>
      </div>
    </div>
    </a>

  <a href="https://www.youtube.com/audiolibrary/music?nv=1" target="_blank">
    <div class="item filterDiv Audio">
      <div class="content">
        <div class="imgframe"><img src="https://i0.wp.com/hd1webdesign.com/wp-content/uploads/2017/05/YouTube-Audio-Library-1.jpg?fit=1140%2C700&ssl=1"alt="YouTube Audio Library"></div>
        <div class="titlediv"><span class="title">YouTube Audio Library</span></div>
        <p>Popular source for getting audio files from YouTube’s free music library. Check to make sure if attribution is required and if so, credit the artist.</p>

        <div class="tag"><span class="type">Audio</span></div>
      </div>
    </div>
    </a>





    <script>

filterSelection("all")

function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
        w3RemoveClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
}

function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {
            element.className += " " + arr2[i];
        }
    }
}

function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
    }
    element.className = arr1.join(" ");
}

function searchFunction() {
    // Declare variables
    var input, filter, list, i;
    input = document.getElementById('searchinput');
    filter = input.value.toUpperCase();
    list = document.getElementsByClassName('content');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < list.length; i++) {
        if (list[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            list[i].parentElement.parentElement.style.display = "";
        } else {
            list[i].parentElement.parentElement.style.display = "none";
        }
    }
}


var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
    </script>








</body>
</html>
