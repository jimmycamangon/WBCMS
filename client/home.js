 //Reveal Function While Scrolling
 ScrollReveal({
    //reset: true,
    distance: '100px',
    duration: 2500,
    delay: 50
  });
  ScrollReveal({ reset: true });    
  //Target Elements
  ScrollReveal().reveal('', { delay: 10, origin: 'left' });
  ScrollReveal().reveal('', { delay: 10, origin: 'bottom' });
  ScrollReveal().reveal('', { delay: 10, origin: 'right' });
  ScrollReveal().reveal('.item', { delay: 10, origin: 'bottom', interval: 200 });
  ScrollReveal().reveal('.gif-cat', { delay: 10, origin: 'bottom', interval: 200 });
  ScrollReveal().reveal('', { delay: 10, origin: 'top' });
  ScrollReveal().reveal('', { delay: 20, origin: 'left', interval: 200 });




//Scroll to Top button  
$(window).scroll(function() {
var height = $(window).scrollTop();
if (height > 500) {
    $('#scrolltop').fadeIn();
} else {
    $('#scrolltop').fadeOut();
}
});
$(document).ready(function() {
$("#scrolltop").click(function(event) {
    event.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, 'fast');
    return false;
});

});






// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("body-navigation");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}



// Focus when Scrolled 

function selectElementByClass(className) {
return document.querySelector(`.${className}`);
}
const sections = [
selectElementByClass('register'),
selectElementByClass('verify'),
selectElementByClass('fill'),
selectElementByClass('generate'),
selectElementByClass('waiting'),
selectElementByClass('features'),
];

const navItems = {
register: selectElementByClass('register_item'),
verify: selectElementByClass('verify_item'),
fill: selectElementByClass('fill_item'),
generate: selectElementByClass('generate_item'),
waiting: selectElementByClass('waiting_item'),
features: selectElementByClass('features_item'),
};

// intersection observer setup
const observerOptions = {
root: null,
rootMargin: '0px',
threshold: 0.7,
};

function observerCallback(entries, observer) {
entries.forEach((entry) => {
if (entry.isIntersecting) {
  // get the nav item corresponding to the id of the section
  // that is currently in view
  const navItem = navItems[entry.target.id];
  // add 'active' class on the navItem
  navItem.classList.add('ON');
  navItem.classList.add('OFF');
  // remove 'active' class from any navItem that is not
  // same as 'navItem' defined above
  Object.values(navItems).forEach((item) => {
    if (item != navItem) {
      item.classList.remove('ON');
      item.classList.remove('OFF');
    }
  });
}
});
}


const observer = new IntersectionObserver(observerCallback, observerOptions);

sections.forEach((sec) => observer.observe(sec));

// Focus when Scrolled Mobile
// intersection observer setup


  



// Open Mobile Navigation
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
  document.getElementById("mySidenav").style.display = "block";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("mySidenav").style.display = "hidden";
}

// Open Mobile Navigation
function openNav2() {
  document.getElementById("mySidenav2").style.width = "100%";
  document.getElementById("mySidenav2").style.display = "block";
}

function closeNav2() {
  document.getElementById("mySidenav2").style.width = "0";
  document.getElementById("mySidenav2").style.display = "hidden";
}



// Side Navigation Home

function openNav3() {
  document.getElementById("mySidenav2").style.width = "250px";
  document.getElementById("body__container").style.marginLeft = "250px";
  document.getElementById("openNav").style.display = "none";
  document.getElementById("closeNav").style.display = "block";
}

function closeNav3() {
  document.getElementById("mySidenav2").style.width = "0";
  document.getElementById("body__container").style.marginLeft= "0";
  document.getElementById("closeNav").style.display = "none";
  document.getElementById("openNav").style.display = "block";
}