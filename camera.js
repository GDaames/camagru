var video = document.getElementById('video');
var sticks = document.getElementById('filters');
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
{
   navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream)
   {
       video.srcObject = stream;
   });
}

var filters = new Array;
filters[0] = "images/filters/12.png";
filters[1] = "images/filters/f3.png";
filters[2] = "images/filters/f4.png";
filters[3] = "images/filters/13.png";

function add_effect(e)
{
  
    var img = new Image;
    img.crossOrigin = "Anonymous";
    img.src = filters[e];
    var can1 = document.getElementById('filters').getContext('2d');
    can1.drawImage(img,0,0,400,300);
}

function snap()
{
    var can = document.getElementById('canvas').getContext('2d');
    can.drawImage(video,0,0,400,300);
    can.drawImage(sticks,0,0,400,300);
    var str = document.getElementById('canvas').toDataURL();
    document.getElementById('camera').value = str;
}


