function addToCart(product_id)
{
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange=function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);
    }
  };
  xhttp.open("GET", "addtocart.php?pid=" + product_id, true);
  xhttp.send();
}


function addNewReview(product_id,user_id)
{
var stars = document.querySelector('input[name = "rating1"]:checked').value;
var review = document.getElementById('comment').value;
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange=function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);
    }
  };
  xhttp.open("GET", "newreview.php?pid=" + product_id + "&uid="+user_id+"&stars="+stars+"&review="+review, true);
  xhttp.send();
}

function getReviews(product_id)
{
	
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange=function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("reviewcontent").innerHTML = this.responseText;
	  var modal = document.getElementById('myModal');
	  modal.style.display = "block";
    }
  };
  xhttp.open("GET", "reviews.php?pid="+product_id, true);
  xhttp.send();
  
}


$(document).ready(function(){

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

});


var rangeSlider = function(){
  var slider = $('.range-slider'),
      range = $('.range-slider__range'),
      value = $('.range-slider__value');
    
  slider.each(function(){

    value.each(function(){
      var value = $(this).prev().attr('value');
      $(this).html(value);
    });

    range.on('input', function(){
      $(this).next(value).html(this.value);
    });
  });
};

rangeSlider();