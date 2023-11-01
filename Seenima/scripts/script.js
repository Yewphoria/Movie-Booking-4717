document.addEventListener('DOMContentLoaded', function () {
  let slideIndex = 0;
  const slides = document.querySelectorAll('.carousel-slide');
  showSlide(slideIndex);

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

  // Add event listeners for mouseover and mouseout on the image
  document.getElementById('carousel-prev').addEventListener('mouseover', pauseAutoAdvance);
  document.getElementById('carousel-next').addEventListener('mouseover', pauseAutoAdvance);
  document.getElementById('carousel-prev').addEventListener('mouseout', resumeAutoAdvance);
  document.getElementById('carousel-next').addEventListener('mouseout', resumeAutoAdvance);

  function pauseAutoAdvance() {
    clearTimeout(autoAdvanceTimeout);
  }

  function resumeAutoAdvance() {
    autoAdvanceTimeout = setTimeout(autoAdvance, 3000);
  }

  showSlide(slideIndex);
  autoAdvance();

  // Set the default tab to "Now Showing"
  showMovies('now-showing');
  
  // Rest of your JavaScript code...
});

function showMovies(tabId) {
  const tabs = document.getElementsByClassName("tab-content");
  const buttons = document.getElementsByClassName("tab-button");
  for (let i = 0; i < tabs.length; i++) {
      tabs[i].style.display = "none";
      buttons[i].classList.remove("active");
  }
  document.getElementById(tabId).style.display = "block";
  document.querySelector(`[onclick="showMovies('${tabId}"]`).classList.add("active");
}
