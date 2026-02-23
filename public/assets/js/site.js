document.addEventListener("DOMContentLoaded", () => {
  const popup = document.querySelector("[data-lead-popup]");
  if (!popup) return;

  const shouldOpen = !localStorage.getItem("ars_lead_popup_seen");
  if (shouldOpen) {
    setTimeout(() => {
      popup.classList.add("active");
      localStorage.setItem("ars_lead_popup_seen", "1");
    }, 2200);
  }

  popup.addEventListener("click", (e) => {
    if (e.target.matches("[data-popup-close]") || e.target === popup) {
      popup.classList.remove("active");
    }
  });
});
