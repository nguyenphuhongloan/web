var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("section-1-item");
  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}

slideIndex = 1;
showImg(slideIndex);

function plusImg(n) {
  showImg(slideIndex += n);
}

function currentImg(n) {
  showImg(slideIndex = n);
}

function showImg(n) {
  var i;
  var slides = document.getElementsByClassName("img-detail");
  var dots = document.getElementsByClassName("img-slide");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active1", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active1";
}

function openmodal(id) {
  var modal = document.getElementById(id);
  modal.style.display="block";
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}

function closemodal(id) {
  var modal = document.getElementById(id);
  modal.style.display= "none";
}

function openTab(evt, tab) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent"); 
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("open");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tab).style.display = "block";
  evt.currentTarget.className += " active";
}

var input = document.getElementById("textsearch");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("icon-search").click();
  }
});

slideIndex = 1;
showImg(slideIndex);

function plusImg(n) {
  showImg(slideIndex += n);
}

function currentImg(n) {
  showImg(slideIndex = n);
}

function showImg(n) {
  var i;
  var slides = document.getElementsByClassName("img-detail");
  var dots = document.getElementsByClassName("img-slide");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active1", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active1";
}


