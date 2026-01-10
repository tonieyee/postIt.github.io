// [OPTIONAL] Highlight nav link based on scroll position (simple)
const links = document.querySelectorAll(".navlinks__item"); // All nav links
const sections = ["home", "about", "contact"].map(id => document.getElementById(id)); // Section refs

window.addEventListener("scroll", () => {
  const scrollY = window.scrollY + 120; // Offset to trigger a bit earlier

  let current = "home"; // Default active section
  sections.forEach(sec => {
    if (sec.offsetTop <= scrollY) current = sec.id; // Pick latest section passed
  });

  links.forEach(a => {
    a.classList.toggle("active", a.getAttribute("href") === `#${current}`); // Toggle class
  });
});

// =========================
// AUTH MODAL CONTROLS
// =========================
// ===== AUTH MODAL OPEN/CLOSE =====
document.addEventListener("DOMContentLoaded", () => {
  const authModal = document.getElementById("authModal");
  const loginForm = document.getElementById("loginForm");
  const registerForm = document.getElementById("registerForm");

  if (!authModal) {
    console.warn("authModal not found. Did you include the modal HTML?");
    return;
  }

  function openAuth(view = "login") {
    authModal.classList.add("is-open");

    if (view === "register") {
      loginForm?.classList.remove("is-active");
      registerForm?.classList.add("is-active");
    } else {
      registerForm?.classList.remove("is-active");
      loginForm?.classList.add("is-active");
    }
  }

  function closeAuth() {
    authModal.classList.remove("is-open");
  }

  // Open when clicking buttons with data-auth
  document.addEventListener("click", (e) => {
    const openBtn = e.target.closest("[data-auth]");
    if (openBtn) {
      e.preventDefault();
      openAuth(openBtn.dataset.auth);
      return;
    }

    // Close ONLY on X
    const closeBtn = e.target.closest("[data-close]");
    if (closeBtn) {
      e.preventDefault();
      closeAuth();
    }
  });
});


// Open modal and choose view
function openAuth(view = "login") {
  authModal.classList.add("is-open");

  // default background = user
  authModal.classList.remove("is-admin");

  // show correct form
  if (view === "register") {
    loginForm.classList.remove("is-active");
    registerForm.classList.add("is-active");
  } else {
    registerForm.classList.remove("is-active");
    loginForm.classList.add("is-active");
  }

  // reset admin checkbox when opening login
  if (view === "login" && adminCheck) adminCheck.checked = false;
}

// Close modal
function closeAuth() {
  authModal.classList.remove("is-open");
  authModal.classList.remove("is-admin");
}

// Click handlers for buttons/links with data-auth
document.addEventListener("click", (e) => {
  const openBtn = e.target.closest("[data-auth]");
  const closeBtn = e.target.closest("[data-close]");
  const switchBtn = e.target.closest("[data-switch]");

  // open
  if (openBtn) {
    e.preventDefault();
    openAuth(openBtn.dataset.auth);
  }

  // close (overlay or X)
  if (closeBtn) {
    e.preventDefault();
    closeAuth();
  }

  // switch login <-> register
  if (switchBtn) {
    e.preventDefault();
    openAuth(switchBtn.dataset.switch);
  }
});

// ESC to close
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape" && authModal.classList.contains("is-open")) {
    closeAuth();
  }
});

// Admin checkbox changes background to orange (admin)
if (adminCheck) {
  adminCheck.addEventListener("change", () => {
    // Only apply orange when login is active
    const loginActive = loginForm.classList.contains("is-active");
    if (!loginActive) return;

    if (adminCheck.checked) authModal.classList.add("is-admin");
    else authModal.classList.remove("is-admin");
  });
}

loginForm.addEventListener("submit", (e) => {
  e.preventDefault();

  // TODO: validate credentials (backend)
  // For now, just route to user UI
  window.location.href = "user.html";
});

registerForm.addEventListener("submit", (e) => {
  e.preventDefault();

  // TODO: register (backend)
  // For now, route to user UI
  window.location.href = "user.html";
});

// AFTER LOGIN OR REGISTER SUBMIT
document.addEventListener("DOMContentLoaded", () => {
  const loginForm = document.getElementById("loginForm");
  const registerForm = document.getElementById("registerForm");
  const adminCheck = document.getElementById("adminCheck");

  // LOGIN → dashboard (user) OR admin dashboard (optional)
  loginForm?.addEventListener("submit", (e) => {
    e.preventDefault();

    // ✅ if you have admin route later, use this:
    // if (adminCheck?.checked) window.location.href = "/admin/dashboard";
    // else window.location.href = "/dashboard";

    // For now: user only
    window.location.href = "/dashboard";
  });

  // REGISTER → dashboard (user)
  registerForm?.addEventListener("submit", (e) => {
    e.preventDefault();
    window.location.href = "/dashboard";
  });
});


