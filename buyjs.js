var bids = [9001, 9002, 9003, 9004, 9005, 9006];
var rids = [9004, 9005, 9006, 9001, 9002, 9003];

var filtersArr = [];
var f = 0;
var buySell = "";

function viewdetails() {
  var curr = event.target.parentElement.parentElement.parentElement;
  curr.classList.add("invisible");
  curr.parentElement.getElementsByClassName("hide_details")[0].classList.remove("invisible");

}

function hdetails() {
  var cur = event.currentTarget.parentElement.parentElement;
  cur.classList.add("invisible");
  cur.parentElement.getElementsByClassName("v_details")[0].classList.remove("invisible");

}
//setting values for all the properties!

// filtering code:
function filterStart() {
  document.getElementsByClassName("filter-applied")[0].classList.remove("invisible");
  filterArray();
  filtering();
}

function filterArray() {
  var j;
  for (j = 0; j < filtersArr.length; j++) {
    if (filtersArr[j] === event.currentTarget.innerHTML) {
      break;
    }
  }
  if (j === filtersArr.length) {
    filtersArr[f] = event.currentTarget.innerHTML;
    var para = document.createElement("span");
    para.innerText = filtersArr[f];
    para.classList.add("filter-style");
    document.getElementsByClassName("filter-applied")[0].appendChild(para);
    var btn = document.createElement("button");
    btn.classList.add("filter-del");
    btn.addEventListener("click", function() {
      deleteFilter(event.currentTarget.parentElement);
      for (var x = 0; x < document.getElementsByClassName("filters").length; x++) {
        document.getElementsByClassName("filters")[x].parentElement.parentElement.parentElement.parentElement.classList.remove("invisible");
      }
      filtering();
    });
    btn.innerHTML = "<img src='images/icon-remove.png' alt=''>";
    document.getElementsByClassName("filter-applied")[0].children[f + 1].appendChild(btn);
    f++;
  }
}

function filtering() {
  for (var x = 0; x < document.getElementsByClassName("filters").length; x++) {
    var checkFilter = [];
    for (var z = 0; z < document.getElementsByClassName("filters")[x].childElementCount; z++) {
      checkFilter.push(document.getElementsByClassName("filters")[x].children[z].innerHTML);
    }
    var arr1 = checkFilter.slice(0);;
    var arr2 = filtersArr.slice(0);;
    arr2.push(buySell);
    const result = arr2.every(val => arr1.includes(val));
    if (!result) {
      document.getElementsByClassName("filters")[x].parentElement.parentElement.parentElement.parentElement.classList.add("invisible");
    }
  }
}

//delete and reset filter

function deleteFilter(del) {
  var toBeDeleted = del.innerText;
  for (i = 0; i < filtersArr.length; i++) {
    if (filtersArr[i] == toBeDeleted) {
      filtersArr.splice(i, 1);
      break;
    }
  }
  f--;
  resetfilters(del);
  if (filtersArr.length == 0) {
    document.getElementsByClassName("filter-applied")[0].classList.add("invisible");
  }
}

function resetfilters(child) {
  document.getElementsByClassName("filter-applied")[0].removeChild(child);
}

//searching for a location
function locate() {
  var locationToBeFound = document.getElementById("button-addon2").parentElement.children[0].value;
  var len = document.getElementsByClassName("filter-applied")[0].children.length;
  for (var a = len - 1; a > 0; a--) {
    deleteFilter(document.getElementsByClassName("filter-applied")[0].children[a]);
  }
  for (var x = 0; x < document.getElementsByClassName("filters").length; x++) {
    document.getElementsByClassName("filters")[x].parentElement.parentElement.parentElement.parentElement.classList.add("invisible");
  }
  for (var x = 0; x < document.getElementsByClassName("location").length; x++) {
    if (document.getElementsByClassName("location")[x].innerText === locationToBeFound) {
      document.getElementsByClassName("location")[x].parentElement.parentElement.parentElement.parentElement.parentElement.classList.remove("invisible");
    }
  }
  document.getElementById("button-addon1").classList.remove("invisible");
  document.getElementById("button-addon2").classList.add("invisible");
}

//clear location search bar
function clearLocation() {
  document.getElementById("button-addon1").parentElement.children[0].value = "";
  for (var x = 0; x < document.getElementsByClassName("filters").length; x++) {
    if (document.getElementsByClassName("filters")[x].getElementsByClassName("buyselltag")[0].innerText===buySell) {
      document.getElementsByClassName("filters")[x].parentElement.parentElement.parentElement.parentElement.classList.remove("invisible");
    }
  }
  document.getElementById("button-addon1").classList.add("invisible");
  document.getElementById("button-addon2").classList.remove("invisible");
}
