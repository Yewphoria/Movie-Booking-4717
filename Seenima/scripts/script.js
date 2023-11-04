document.addEventListener('DOMContentLoaded', function () {
  let slideIndex = 0;
  const slides = document.querySelectorAll('.carousel-slide');
  showSlide(slideIndex);
  let autoAdvanceTimeout;

  function changeSlide(n) {
    showSlide(slideIndex += n);
  }

  function showSlide(n) {
    if (n >= slides.length) {
      slideIndex = 0;
    }
    if (n < 0) {
      slideIndex = slides.length - 1;
    }

    for (let i = 0; i < slides.length; i++) {
      slides[i].style.display = 'none';
    }

    slides[slideIndex].style.display = 'block';
  }

  function resetAutoAdvance() {
    clearTimeout(autoAdvanceTimeout);
    autoAdvanceTimeout = setTimeout(autoAdvance, 3000);
  }

  function autoAdvance() {
    changeSlide(1);
    resetAutoAdvance();
  }

  // Add event listeners to each image for mouseover and mouseout
  slides.forEach(function (slide, index) {
    slide.addEventListener('mouseover', function() {
      clearTimeout(autoAdvanceTimeout); // Pause auto-advance on mouseover
    });

    slide.addEventListener('mouseout', function() {
      resetAutoAdvance(); // Resume auto-advance on mouseout
    });
  });

  showSlide(slideIndex);
  autoAdvance();

  // Rest of your JavaScript code...
});


// Function to toggle the tab content
function showMovies(tabName) {
  const tabs = document.querySelectorAll('.tab-content');
  tabs.forEach((tab) => {
      tab.style.display = 'none';
  });

  const selectedTab = document.getElementById(tabName);
  selectedTab.style.display = 'block';
}

// JavaScript function to toggle the active tab
function toggleTab(tab) {
  const tabs = document.querySelectorAll('.tab-button');
  tabs.forEach((button) => {
      button.classList.remove('active-tab');
  });

  tab.classList.add('active-tab');
}

// Initial setup - Show the default tab
document.addEventListener('DOMContentLoaded', function () {
  showMovies('now-showing'); // Show the "Now Showing" tab content by default
});