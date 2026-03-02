document.addEventListener("DOMContentLoaded", () => {

  /* ── Hamburger Menu ── */
  const hamburger = document.getElementById("hamburger");
  const menu = document.getElementById("mainMenu");
  if (hamburger && menu) {
    hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("active");
      menu.classList.toggle("open");
    });
    menu.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => {
        hamburger.classList.remove("active");
        menu.classList.remove("open");
      });
    });
  }

  /* ── Sticky Topbar Shadow ── */
  const topbar = document.querySelector(".topbar");
  if (topbar) {
    const onScroll = () => {
      topbar.classList.toggle("scrolled", window.scrollY > 10);
    };
    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();
  }

  /* ── Scroll Reveal ── */
  const reveals = document.querySelectorAll(".reveal");
  if (reveals.length && "IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("visible");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -40px 0px" }
    );
    reveals.forEach((el) => observer.observe(el));
  } else {
    reveals.forEach((el) => el.classList.add("visible"));
  }

  /* ── Lead Popup ── */
  const popup = document.querySelector("[data-lead-popup]");
  if (!popup) return;

  const shouldOpen = !localStorage.getItem("ars_lead_popup_seen");
  if (shouldOpen) {
    setTimeout(() => {
      popup.classList.add("active");
      localStorage.setItem("ars_lead_popup_seen", "1");
    }, 2500);
  }

  popup.addEventListener("click", (e) => {
    if (e.target.matches("[data-popup-close]") || e.target === popup) {
      popup.classList.remove("active");
    }
  });
});
