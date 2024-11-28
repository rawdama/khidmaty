// offers swiper
let offersSwiper = new Swiper(".offersSwiper", {
  loop: true,
  speed: 3000,
  autoplay: {
    delay: 500
  }
});
// hero swiper
let heroSwiper = new Swiper(".heroSwiper", {
  loop: true,
  speed: 1000,
  effect: "fade",
  autoplay: {
    delay: 4000,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
})
//servicesBarSwiper 
let servicesBarSwiper = new Swiper(".servicesBarSwiper", {
  loop: true,
  speed: 3000,
  autoplay: {
    delay: 2500,
  },
  breakpoints: {
    992: {
      slidesPerView: 10,
    },
    768: {
      slidesPerView: 7,
    },
    350: {
      slidesPerView: 3,
    },
  },
});
// nav bar fixed up
let header = document.querySelector("header");
let heroSection = document.querySelector("main");
window.addEventListener("scroll", () => {
  if (this.scrollY > 120) {
    header.classList.add("sticky");
    document.querySelector(".mini_cart").style.top = "80px";
    heroSection.style.margin = "130px 0 0"
  } else {
    header.classList.remove("sticky");
    document.querySelector(".mini_cart").style.top = "130px";
    heroSection.style.margin = "0"
  }
});
// small cart toggle
let smallCartToggler = document.getElementById("toggleSmallCart");
let smallCart = document.querySelector(".mini_cart");
smallCartToggler.addEventListener("mouseenter", () => {
  if (smallCart.classList.contains("show") == false) {
    smallCart.classList.add("show");
  }
});
smallCartToggler.addEventListener("mouseleave", () => {
  if (smallCart.classList.contains("show") == true) {
    smallCart.classList.remove("show");
  }
});
smallCart.addEventListener("mouseenter", () => {
  smallCart.classList.add("show");
});
smallCart.addEventListener("mouseleave", () => {
  smallCart.classList.remove("show");
});
// blogs trim text and add Read more
$(document).ready(function () {
  $(".blog p").each(function () {
    var text = $(this).text();
    if (text.length > 150) {
      var truncatedText =
        $.trim(text).substring(0, 150).split(" ").slice(0, -1).join(" ") + ".";
      var readMoreLink = $('<a href="#">إقرأ المزيد <i class="fa-light fa-angle-left"></i></a>');
      $(this).text(truncatedText).append(readMoreLink);
    }
  });
});
//toogler menu
let toggler = document.querySelector(".toggler");
let menu = document.querySelector(".navigation_links");
toggler.addEventListener("click", () => {
  menu.classList.toggle("show");
  if (menu.classList.contains("show")) {
    toggler.classList.add("close");
  } else {
    toggler.classList.remove("close");
  }
});
//contact higlight inputs
const inputs = document.querySelectorAll('.inputfield input, .inputfield textarea');
function highlight(event) {
  const label = event.target.previousElementSibling;
  label.classList.add("h");
}
function dehighlight(event) {
  const label = event.target.previousElementSibling;
  if (event.target.value === "") {
    label.classList.remove("h");
  }
}
inputs.forEach(input => {
  input.addEventListener('focus', highlight);
  input.addEventListener('blur', dehighlight);
});
// nav-links highlight by getting path name
const { pathname } = window.location;
let navLinks = document.querySelectorAll(".navigation_links a");
for (let i = 0; i < navLinks.length; i++) {
  navLinks[i].classList.remove("active");
}
for (let i = 0; i < navLinks.length; i++) {
  const linkPathname = new URL(navLinks[i].href).pathname;
  if (linkPathname === pathname) {
    navLinks[i].classList.add("active");
  }
  if (pathname === "/") {
    navLinks[0].classList.add("active");
  }
}
// testimonials slider
var swiper = new Swiper(".testimonilasSwiper", {
  loop: true,
  spaceBetween: 30,
  speed: 2000,
  centeredSlides: true,
  pagination: {
    el: ".testimonialsSwiperPagination",
    clickable: true
  },
  autoplay: {
    delay: 4000
  },
  breakpoints: {
    992: {
      slidesPerView: 3
    },
    768: {
      slidesPerView: 2
    },
    350: {
      slidesPerView: 1
    }
  }
});