// Simple script to handle active state for nav links
document.addEventListener('DOMContentLoaded', function () {
  const dropdownParents = document.querySelectorAll('.has-dropdown');

  dropdownParents.forEach(parent => {
    const trigger = parent.querySelector('.nav-link');

    trigger.addEventListener('click', function (e) {
      e.preventDefault();

      // accordion behavior: close others
      dropdownParents.forEach(item => {
        if (item !== parent) item.classList.remove('open');
      });

      parent.classList.toggle('open');
    });
  });
});