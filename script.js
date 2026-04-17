
// ======================
// DOM READY (IMPORTANT)
// ======================
document.addEventListener("DOMContentLoaded", function(){

  // ======================
  // TYPING EFFECT
  // ======================
  const text = "Grow Your Business Digitally 🚀";
  let i = 0;

  function type(){
    let el = document.getElementById("typing");
    if(el && i < text.length){
      el.innerHTML += text.charAt(i);
      i++;
      setTimeout(type, 50);
    }
  }
  type();


  // ======================
  // USER SHOW / LOGIN BTN
  // ======================
  let user = localStorage.getItem("user");
  let userMenu = document.querySelector(".user-menu");

  if(user && document.getElementById("userName")){
    document.getElementById("userName").innerText = user;
  }else if(userMenu){
    userMenu.innerHTML = `<a href="login.html" class="login-btn">Login</a>`;
  }

});


// ======================
// SCROLL ANIMATION
// ======================
window.addEventListener('scroll', () => {
  document.querySelectorAll('.reveal').forEach(el => {
    let top = el.getBoundingClientRect().top;

    if(top < window.innerHeight - 100){
      el.classList.add('active');
    }
  });
});


// ======================
// ACTIVE NAV LINK
// ======================
const links = document.querySelectorAll(".nav-links a");

links.forEach(link => {
  if(link.href === window.location.href){
    link.classList.add("active");
  }
});


// ======================
// SCROLL TO CONTACT
// ======================
function scrollToContact(){
  let section = document.getElementById("contact");
  if(section){
    section.scrollIntoView({ behavior: "smooth" });
  }
}


// ======================
// HOME REDIRECT
// ======================
function goHome(){
  window.location.href = "index.html";
}


// ======================



// ======================
// CLICK OUTSIDE CLOSE
// ======================
document.addEventListener("click", function(e){
  let menu = document.querySelector(".user-menu");

  if(menu && !menu.contains(e.target)){
    menu.classList.remove("active");

    let dropdown = document.getElementById("dropdownMenu");
    if(dropdown){
      dropdown.classList.remove("show");
    }
  }
});


// ======================
// LOGOUT
// ======================
function logout(){
  localStorage.removeItem("user");
  window.location.href = "login.html";
}

// DROPDOWN TOGGLE
// ======================
function toggleDropdown(){
  let menu = document.querySelector(".user-menu");
  let dropdown = document.getElementById("dropdownMenu");

  if(menu && dropdown){
    menu.classList.toggle("active");
    dropdown.classList.toggle("show");
  }
}
