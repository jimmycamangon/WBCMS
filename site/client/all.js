const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}



// Index Page JS
/*=============== LINK ACTIVE ===============*/
const linkColor = document.querySelectorAll('.nav__link')

function colorLink(){
    linkColor.forEach(l => l.classList.remove('active-link'))
    this.classList.add('active-link')
}

linkColor.forEach(l => l.addEventListener('click', colorLink))

/*=============== SHOW HIDDEN MENU ===============*/
const showMenu = (toggleId, navbarId) =>{
    const toggle = document.getElementById(toggleId),
    navbar = document.getElementById(navbarId)

    if(toggle && navbar){
        toggle.addEventListener('click', ()=>{
            /* Show menu */
            navbar.classList.toggle('show-menu')
            /* Rotate toggle icon */
            toggle.classList.toggle('rotate-icon')
        })
    }
}
showMenu('nav-toggle','nav');


function openNav() {
  document.getElementById("msg-icn").style.display = "none";
}


$(document).ready(function() {
  
  $(document).click(function() {
     $('.dropdown-menu.show').removeClass('show');
  });
  
  $('body').on('click','.apto-trigger-dropdown', function(e){
    
    e.stopPropagation();
    
   $(this).closest('.apto-dropdown-wrapper').find('.dropdown-menu').toggleClass('show');
  });
  
  
  $('body').on('click','.dropdown-item', function(e){
    
    e.stopPropagation();
    
    let $selectedValue = $(this).val(); 
    let $icon          = $(this).find('svg');
    let $btn           = $(this).closest('.apto-dropdown-wrapper').find('.apto-trigger-dropdown');
    
   $(this).closest('.apto-dropdown-wrapper').find('.dropdown-menu').removeClass('show').attr('data-selected', $selectedValue);
    
    $btn.find('svg').remove();
    $btn.prepend($icon[0].outerHTML);
    
  });
  
});

// Message Box

const typSpd = 70; 
const waitTime = 500;

const text = [
  "Welcome!",
  "Need to request something?",
  "Check out this navigation",
  "Click this icon for request"
]

var mi = 0;

function writeString(e, str, i) {
  e.innerHTML = e.innerHTML + str[i];
  
  if (e.innerHTML.length == str.length && mi != text.length)
    setTimeout(slowlyDelete, waitTime, e);
}

function deleteString(e) {
  e.innerHTML = e.innerHTML.substring(0, e.innerHTML.length - 1);
  
  if (e.innerHTML.length == 0)
    slowlyWrite(e, text[mi++]);
}

function slowlyDelete(e) {
  for (var i = 0; i < e.innerHTML.length; i++) {
    setTimeout(deleteString, typSpd / 2 * i, e);
  }
}

function slowlyWrite(e, str) {
  for (var i = 0; i < str.length; i++) {
    setTimeout(writeString, typSpd * i, e, str, i);
  }
}

const msg = document.querySelector(".msg-icn");

slowlyDelete(msg);


// Dark Mode
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
