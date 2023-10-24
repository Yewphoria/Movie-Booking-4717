// Define an object to store showtimes for each cinema
const cinemaShowtimes = {
    'Cinema A': ['10:00 AM', '8:00 PM'],
    'Cinema B': ['7:00 PM', '6:00 PM'],
    'Cinema C': ['9:30 AM', '12:30 PM', '3:30 PM']
};

function showShowtimes(cinema, event) {
    event.preventDefault(); // Prevent the default behavior of the link

    const showtimesContent = document.getElementById('showtimes-content');

    // Clear the previous content
    showtimesContent.innerHTML = '';

    // Create and display showtimes for the selected cinema
    const showtimes = getShowtimesForCinema(cinema);
    const ul = document.createElement('ul');

    showtimes.forEach(time => {
       const box= createShowtimeBox(time);
       showtimesContent.appendChild(box);
    });

    showtimesContent.appendChild(ul);
}


//return the showtimes for the selected cinema
function getShowtimesForCinema(cinema) {
    // Retrieve showtimes from the cinemaShowtimes object
    return cinemaShowtimes[cinema] || [];
}

//box div for showtimes 
function createShowtimeBox(time) {
    const box = document.createElement('div');
    box.className = 'showtime-box';
    box.textContent = time;

    box.addEventListener('click', function() {
        // Handle the click event here, e.g., navigate to a booking page
        navigateToShowtimePage(time);  //navigate to html page based of timing 
    });

    return box;
}


//function to navigate to the page
function navigateToShowtimePage(time) {

    const encodedTime = encodeURIComponent(time);
    // Determine the URL for the showtime page based on the timing
    const showtimePageURL =  `showtime.php?time=${encodedTime}`;
    
    // Navigate to the new page
    window.location.href = showtimePageURL;
}

