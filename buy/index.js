var bids=[9001,9002,9003,9004,9005,9006];
var rids=[9004,9005,9006,9001,9002,9003];

var filtersArr=[];
var f=0;

function viewdetails(){
  var curr=event.target.parentElement.parentElement.parentElement;
  var temp=event.target.parentElement.parentElement.parentElement.innerHTML;
  var rps="";
  var ams="";
  console.log(curr);
  var id=event.path[5].id;
  var nhtml="<div class='d-flex justify-content-between align-items-center dets'><p class='prop-desc'>This is a paragraph with various details of the flat!<br><br> <button type='button' class='btn btn-sm btn-outline-dark'>Contact Broker</button></p><button type='button' class='btn btn-sm btn-dark cdetails'><i class='fas fa-angle-up'></i></button></div>";
  curr.innerHTML=nhtml;
  curr.getElementsByClassName("cdetails")[0].addEventListener("click",function(){
    curr.innerHTML=temp;
    for(var b=0;b<curr.getElementsByClassName("fil").length;b++)
    {
      curr.getElementsByClassName("fil")[b].addEventListener("click",filterStart);
    }
    curr.getElementsByClassName("vdetails")[0].addEventListener("click",viewdetails);
  });
  }

//setting values for all the properties!
function buyProp(){
  clear();
  document.getElementById("prop").classList.remove("invisible");
  document.getElementById("heading").innerHTML="Properties on Sale";
  for(var i=0;i<bids.length;i++)
  {
    var x= bids[i];
    createbox(i,x);
    var path= "apt_images/"+x+"-img1.jpg";
    document.getElementsByClassName("bd-placeholder-img")[i+1].style.backgroundImage="url("+path+")";
    document.getElementsByClassName("vdetails")[i+1].addEventListener("click",viewdetails);
  }
}

function rentProp(){
  clear();
  document.getElementById("prop").classList.remove("invisible");
  document.getElementById("heading").innerHTML="Properties on Rent";
  for(var i=0;i<rids.length;i++)
  {
    var y= rids[i];
    createbox(i,y);
    var path= "apt_images/"+y+"-img1.jpg";
    document.getElementsByClassName("bd-placeholder-img")[i+1].style.backgroundImage="url("+path+")";
  }
  for(var j=0;j<document.getElementsByClassName("vdetails").length;j++)
  {
    document.getElementsByClassName("vdetails")[j].addEventListener("click",viewdetails);
  }
}

function createbox(i,a){
  var d = document.createElement("div");
  d.classList.add("col");
  d.innerHTML=document.getElementsByClassName("col")[0].innerHTML;
  d.id=a;
  d.getElementsByClassName("filters")[0].getElementsByClassName("location")[0].innerHTML="location"+a;
  d.getElementsByClassName("filters")[0].getElementsByClassName("bhk")[0].innerHTML="bhk";
  d.getElementsByClassName("filters")[0].getElementsByClassName("furn")[0].innerHTML="furn";
  document.getElementById("box-prop").appendChild(d);
  for(var a=0;a<d.getElementsByClassName("fil").length;a++)
  {
    d.getElementsByClassName("fil")[a].addEventListener("click",filterStart);
  }
}

function clear(){
  var lenght=document.getElementById("box-prop").children.length;
  for(var k=lenght-1;k>0;k--)
  {
    console.log("value of k is "+k);
    console.log("element to be deleted is");
    console.log(document.getElementById("box-prop").children[k]);
    document.getElementById("box-prop").children[k].remove();
  }
}

// filtering code:
function filterStart(event){
  document.getElementsByClassName("filter-applied")[0].classList.remove("invisible");
  filterArray();
  filtering();
}

function filterArray(){
  var j;
  for(j=0;j<filtersArr.length;j++){
    if(filtersArr[j]==event.currentTarget.innerHTML){
      break;
    }
  }
  if(j==filtersArr.length){
    filtersArr[f]=event.currentTarget.innerHTML;
    var para = document.createElement("span");
    para.innerText = filtersArr[f];
    para.classList.add("filter-style");
    document.getElementsByClassName("filter-applied")[0].appendChild(para);
    var btn= document.createElement("button");
    btn.classList.add("filter-del");
    btn.addEventListener("click",deleteFilter);
    btn.innerHTML="<img src='images/icon-remove.png' alt=''>";
    document.getElementsByClassName("filter-applied")[0].children[f+1].appendChild(btn);
    f++;
  }
}

function filtering(){
  for(var x=0;x<document.getElementsByClassName("filters").length;x++){
      var checkFilter=[];
      for(var z=0;z<document.getElementsByClassName("filters")[x].childElementCount;z++){
        checkFilter.push(document.getElementsByClassName("filters")[x].children[z].innerHTML);
      }
      var arr1=checkFilter;
      var arr2= filtersArr;
      const result = arr2.every(val => arr1.includes(val));
      if(!result){
        document.getElementsByClassName("filters")[x].parentElement.parentElement.parentElement.parentElement.classList.add("invisible");
      }
  }
}

//delete and reset filter

function deleteFilter(){
  var toBeDeleted=event.currentTarget.parentElement.innerText;
  for(i=0;i<filtersArr.length;i++){
    if(filtersArr[i]==toBeDeleted){
      filtersArr.splice(i, 1);
      break;
    }
  }
  f--;
  resetfilters(event.currentTarget.parentElement);
  filtering();
  if(filtersArr.length==0){
    document.getElementsByClassName("filter-applied")[0].classList.add("invisible");
  }
}

function resetfilters(child){
  document.getElementsByClassName("filter-applied")[0].removeChild(child);
  for(var x=1;x<document.getElementsByClassName("filters").length;x++){
    document.getElementsByClassName("filters")[x].parentElement.parentElement.parentElement.parentElement.classList.remove("invisible");
  }
}

//searching for a location
/*function locate(){
  var locationToBeFound=document.getElementById("button-addon2").parentElement.children[0].value;
  for(var x=1;x<document.getElementsByClassName("filters").length;x++){
    document.getElementsByClassName("filters")[x].parentElement.parentElement.parentElement.parentElement.classList.remove("invisible");
  }
  filtersArr=[];
}*/
