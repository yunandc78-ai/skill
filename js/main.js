/**
 * PT SKILL NUSA INFOTAMA - MAIN CLIENT SCRIPT
 * Version: 2.0 (PHP Architecture Revamp)
 * Website: www.skillnusa.co.id
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Mobile Drawer Navigation
  const toggleBtn = document.getElementById('mobile-toggle-btn');
  const drawer = document.getElementById('mobile-drawer');
  const backdrop = document.getElementById('drawer-backdrop');
  const closeBtn = document.getElementById('drawer-close-btn');

  function openDrawer() {
    if (drawer && backdrop) {
      drawer.classList.add('active');
      backdrop.classList.add('active');
      document.body.style.overflow = 'hidden';
      if (toggleBtn) toggleBtn.setAttribute('aria-expanded', 'true');
    }
  }

  function closeDrawer() {
    if (drawer && backdrop) {
      drawer.classList.remove('active');
      backdrop.classList.remove('active');
      document.body.style.overflow = '';
      if (toggleBtn) toggleBtn.setAttribute('aria-expanded', 'false');
    }
  }

  if (toggleBtn) toggleBtn.addEventListener('click', openDrawer);
  if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
  if (backdrop) backdrop.addEventListener('click', closeDrawer);

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && drawer && drawer.classList.contains('active')) {
      closeDrawer();
    }
  });

  // 2. Smooth Scrolling for internal anchor links (#)
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const targetId = this.getAttribute('href');
      if (targetId.length > 1) {
        const targetElem = document.querySelector(targetId);
        if (targetElem) {
          e.preventDefault();
          closeDrawer();
          const navHeight = 75;
          const elemPos = targetElem.getBoundingClientRect().top + window.pageYOffset - navHeight;
          window.scrollTo({
            top: elemPos,
            behavior: 'smooth'
          });
        }
      }
    });
  });

  // 3. Highlight Active Category Pill in Layanan Page on Scroll
  const pills = document.querySelectorAll('.category-pill');
  if (pills.length > 0) {
    const serviceCards = document.querySelectorAll('.service-detail-card');
    window.addEventListener('scroll', () => {
      let currentId = '';
      serviceCards.forEach(card => {
        const cardTop = card.offsetTop - 120;
        if (window.pageYOffset >= cardTop) {
          currentId = card.getAttribute('id');
        }
      });

      if (currentId) {
        pills.forEach(pill => {
          pill.classList.remove('active');
          if (pill.getAttribute('href') === `#${currentId}`) {
            pill.classList.add('active');
          }
        });
      }
    }, { passive: true });
  }

  // 4. Contact Form Validation Enhancement
  const contactForm = document.getElementById('contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
      const name = document.getElementById('name');
      const email = document.getElementById('email');
      const message = document.getElementById('message');

      if (!name.value.trim() || !email.value.trim() || !message.value.trim()) {
        e.preventDefault();
        alert('Mohon lengkapi seluruh kolom yang wajib diisi.');
        return;
      }
    });
  }
});
