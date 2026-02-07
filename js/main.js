const breakNavi = 992;

// Initialize Lenis smooth scroll
function setupLenis() {
  const lenis = new Lenis({
    duration: 1.2,           // Scroll duration
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // Easing function
    orientation: 'vertical', // Scroll direction
    smoothWheel: true,       // Smooth scroll for mouse wheel
  });

  // Integrate with GSAP ScrollTrigger
  lenis.on('scroll', ScrollTrigger.update);

  gsap.ticker.add((time) => {
    lenis.raf(time * 1000);
  });
  gsap.ticker.lagSmoothing(0);

  // Store lenis instance globally if needed
  window.lenis = lenis;
}

function setupMobileNavigation() {
  const hamburger = document.querySelector(".hamburger");
  const naviHolder = document.querySelector(".header-navi-holder ");
  const body = document.body;
  const navLinks = document.querySelectorAll(".nav-link");

  function toggleMenu() {
    hamburger.classList.toggle("active");
    naviHolder.classList.toggle("active");
    body.classList.toggle("menu-open");
    const isExpanded = hamburger.classList.contains("active");
    hamburger.setAttribute("aria-expanded", isExpanded);
  }

  if (hamburger) {
    hamburger.addEventListener("click", toggleMenu);
  }

  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      if (window.innerWidth <= breakNavi) {
        toggleMenu();
      }
    });
  });

  body.addEventListener("click", (e) => {
    if (
      body.classList.contains("menu-open") &&
      !naviHolder.contains(e.target) &&
      !hamburger.contains(e.target)
    ) {
      toggleMenu();
    }
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && body.classList.contains("menu-open")) {
      toggleMenu();
    }
  });

  window.addEventListener("resize", () => {
    if (window.innerWidth > breakNavi && body.classList.contains("menu-open")) {
      toggleMenu();
    }
  });
}

function addClassOnScroll() {
  const body = document.body;
  window.addEventListener("scroll", () => {
    if (window.scrollY > 50) {
      body.classList.add("scrolled");
    } else {
      body.classList.remove("scrolled");
    }
  });
}

function accordionSetup() {
  const cards = document.querySelectorAll(".process-card");

  cards.forEach((card) => {
    card.addEventListener("click", () => {
      const isActive = card.classList.contains("active");

      // Close all cards
      cards.forEach((c) => c.classList.remove("active"));

      // If this wasn't active, open it
      if (!isActive) {
        card.classList.add("active");
      }
    });
  });
}

function headerAnimations() {
  if (typeof gsap === "undefined") return;
  
  gsap.registerPlugin(ScrollTrigger);
  
  const holder = document.querySelector(".illustration-holder");
  if (!holder) return;
  
  const elements = {
    mainPart: holder.querySelector(".main-part"),
    heart: holder.querySelector(".heart"),
    socials: holder.querySelector(".socials"),
    video: holder.querySelector(".video"),
    location: holder.querySelector(".location")
  };
  
 
  const tl = gsap.timeline({ defaults: { ease: "back.out(1.7)" } });
  
  tl.from(elements.mainPart, { opacity: 0, scale: 0.8, y: 50, duration: 1 }, 0.2)
    .from(elements.heart, { opacity: 0, scale: 0, rotation: -180, y: -50, duration: 0.6 }, 0.5)
    .from(elements.socials, { opacity: 0, x: 100, rotation: 15, duration: 0.7 }, 0.7)
    .from(elements.video, { opacity: 0, scale: 0, y: 30, duration: 0.6 }, 0.9)
    .from(elements.location, { opacity: 0, y: 80, x: 30, duration: 0.7 }, 1.1);
  

  [elements.heart, elements.socials, elements.video, elements.location].forEach((el, i) => {
    if (!el) return;
    
    gsap.to(el, {
      y: `+=${4 + i * 1.5}`,
      rotation: i % 2 === 0 ? 3.5 : 0,
      duration: 2 + i * 0.3,
      ease: "sine.inOut",
      yoyo: true,
      repeat: -1,
      delay: tl.duration() + i * 0.15
    });
  });
  
  
  gsap.utils.toArray(".parallax-element").forEach(el => {
    const speed = parseFloat(el.dataset.speed) || 0.2;
    const direction = el.dataset.direction === "down" ? 1 : -1;
    
    gsap.to(el, {
      y: direction * speed * 50,
      ease: "none",
      scrollTrigger: {
        trigger: holder,
        start: "top bottom",
        end: "bottom top",
        scrub: 3
      }
    });
  });
  
  // CTA parallax
  const cta = document.querySelector(".cta-parallax");
  if (cta) {
    gsap.to(cta, {
      y: -80,
      ease: "none",
      scrollTrigger: {
        trigger: ".cta-section",
        start: "top bottom",
        end: "bottom top",
        scrub: 1.5
      }
    });
  }
}

function init() {
  setupLenis();
  setupMobileNavigation();
  addClassOnScroll();
  accordionSetup();
  headerAnimations();

  if (typeof Swiper !== "undefined") {
    new Swiper(".testimonials-swiper", {
      loop: true,
      slidesPerView: 2,
      spaceBetween: 50,
      centeredSlides: true,
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20,
        },

        640: {
          slidesPerView: 1.5,
          spaceBetween: 20,
        },
        760: {
          slidesPerView: 2,
          spaceBetween: 50,
        },
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  }
}

document.addEventListener("DOMContentLoaded", init);
