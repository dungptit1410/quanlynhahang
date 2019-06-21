
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
function increaseValue(id) {
  var value = parseInt(document.getElementById('number' + id).value, 10);
  console.log(value);
  value = isNaN(value) ? 1 : value;
  value++;
  document.getElementById('number' + id).value = value;
}

function decreaseValue(id) {
  var value = parseInt(document.getElementById('number' + id).value, 10);
  if(value == 1){
    document.getElementById('number' + id).value = value;
  }
  else{
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;

    document.getElementById('number' + id).value = value;
  }
}

