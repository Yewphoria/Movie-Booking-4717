// Define an object to store showtimes for each cinema
const cinemaShowtimes = {
    '05-Nov-2023': ['0930', '1130'],
    '06-Nov-2023': ['1000', '1500'],
    '07-Nov-2023': ['1030', '1230', '1430']
};

function showShowtimes(date,event) {
    event.preventDefault(); // Prevent the default behavior of the link

    const showtimesContent = document.getElementById('showtimes-content');
    const selectedDateInput = document.getElementById('selected-date');
    const selectedTimeInput = document.getElementById('selected-time');

    // Clear the previous content
    showtimesContent.innerHTML = '';

    // Create and display showtimes for the selected cinema
    const showtimes = getShowtimesForCinema(date);
    const ul = document.createElement('ul');

    showtimes.forEach(time => {
       const box= createShowtimeBox(time, date, selectedTimeInput, selectedDateInput);  // pass in the cinema name into the showbox
       showtimesContent.appendChild(box);
    });

    showtimesContent.appendChild(ul);
}


//return the showtimes for the selected cinema
function getShowtimesForCinema(date) {
    // Retrieve showtimes from the cinemaShowtimes object
    return cinemaShowtimes[date] || [];
}

//box div for showtimes 
function createShowtimeBox(time, date, selectedTimeInput, selectedDateInput) {
    const box = document.createElement('div');
    box.className = 'showtime-box';
    box.textContent = time;

    box.addEventListener('click', function() {
        // selectedDateInput.value = date; 
        selectedTimeInput.value = time;
        selectedDateInput.value = date;
          // Submit the form
          const bookingForm = document.getElementById('booking-form');
          bookingForm.submit(); 
    });

    return box;
}




