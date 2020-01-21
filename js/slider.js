var sliders = document.getElementById("sliders");
var x = 0;
var sliderscount = document.getElementsByClassName("slider");
var count =0;
for(var i=1;i<=sliderscount.length;i++){
  count++;
  console.log(count);
}
var max = count; //number of slides
function slide(dir){
  if(x > -1 * (max - 1)){
    if(dir == "left"){
      x--;
    }
  }else{
    if(dir == "left"){
      x = 0;
    }
  }
  if(x < 0){
    if(dir == "right"){
      x++;
    }
  }
  else{
    if(dir == "right"){
      x = -1 * (max-1) ;
    }
  }
  sliders.style.left = (x * 100) + "%";
}
