let nav = 0;
let events = [];

const calendar = document.getElementById('calendar');
// const backDrop = document.getElementById('modalBackDrop');
const weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

// Function to fetch appointments from the server and load them into the calendar
function fetchAppointments() {
  console.log('Fetching appointments');
  fetch('../action/fetchBydates.php')
    .then(response => response.json())
    .then(data => {
      
      events = data;
      console.log(events);
      load();
    })
    .catch(error => console.error('Error fetching appointments:', error));
}
fetchAppointments();

function load() {
  const dt = new Date();

  if (nav !== 0) {
    dt.setMonth(new Date().getMonth() + nav);
  }

  const day = dt.getDate();
  const month = dt.getMonth();
  const year = dt.getFullYear();

  const firstDayOfMonth = new Date(year, month, 1);
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  
  const dateString = firstDayOfMonth.toLocaleDateString('en-us', {
    weekday: 'long',
    year: 'numeric',
    month: 'numeric',
    day: 'numeric',
  });
  const paddingDays = weekdays.indexOf(dateString.split(', ')[0]);

  document.getElementById('monthDisplay').innerText = `${dt.toLocaleDateString('en-us', { month: 'long' })} ${year}`;

  calendar.innerHTML = '';

  for(let i = 1; i <= paddingDays + daysInMonth; i++) {
    const daySquare = document.createElement('div');
    daySquare.classList.add('day');

    const dayString = `${year}-${String(month + 1).padStart(2, '0')}-${String(i - paddingDays).padStart(2, '0')}`;


    if (i > paddingDays) {
      daySquare.innerText = i - paddingDays;
      const eventsForDay = events.filter(e => e.date === dayString);

      if (i - paddingDays === day && nav === 0) {
        daySquare.id = 'currentDay';
      }

      eventsForDay.forEach(event => {
        const eventDiv = document.createElement('div');
        eventDiv.classList.add('event');
    
        
    
        const idDiv = document.createElement('div');
        idDiv.innerText = `Appointment: ${event.a_id}`;
        eventDiv.appendChild(idDiv);

        const titleDiv = document.createElement('div');
        titleDiv.innerText = event.title;
        eventDiv.appendChild(titleDiv);
    
        daySquare.appendChild(eventDiv);
    });
    
    } else {
      daySquare.classList.add('padding');
    }

    calendar.appendChild(daySquare);    
  }
}

function initButtons() {
  document.getElementById('nextButton').addEventListener('click', () => {
    nav++;
    console.log(nav);
    load();
    fetchAppointments();
  });

  document.getElementById('backButton').addEventListener('click', () => {
    nav--;
    load();
    fetchAppointments();
  });
}

document.addEventListener('DOMContentLoaded', function() {
  // Place your initButtons function call here
  fetchAppointments()
  initButtons();
  
   // And any other function calls that need to run on page load
});
