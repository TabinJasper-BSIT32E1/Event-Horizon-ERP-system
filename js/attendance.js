let currentPage = 0;
const resultsPerPage = 5; // Number of records per page
const attendanceContainer = document.getElementById('attendanceContainer');

// Create and add pagination buttons dynamically
const paginationContainer = document.createElement('div');
paginationContainer.className = 'pagination-controls';
const prevButton = document.createElement('button');
prevButton.id = 'prev-page';
prevButton.innerText = 'Previous';
paginationContainer.appendChild(prevButton);

const nextButton = document.createElement('button');
nextButton.id = 'next-page';
nextButton.innerText = 'Next';
paginationContainer.appendChild(nextButton);

document.querySelector('.attendance-container').appendChild(paginationContainer);

// Function to render attendance data on the page
function renderAttendancePage(page) {
    attendanceContainer.innerHTML = ''; // Clear previous content

    // Calculate the range of records to display
    const start = page * resultsPerPage;
    const end = start + resultsPerPage;
    const paginatedItems = attendanceData.slice(start, end);

    // Generate the rows for the table
    paginatedItems.forEach(item => {
        const row = document.createElement('div');
        row.className = 'attendance-row';
        row.innerHTML = `
            <div class="employee-info">
                <div>EMP-${item.EmployeeID}</div>
            </div>
            <div class="employee-stats">
                <div>${item.AttendanceDate ?? 'N/A'}</div>
                <div>${item.TimeIn ?? 'N/A'}</div>
                <div>${item.TimeOut ?? 'N/A'}</div>
                <div>${item.AttendanceStatus ?? 'N/A'}</div>
            </div>
        `;
        attendanceContainer.appendChild(row);
    });

    updatePaginationButtons();
}

// Function to update pagination buttons (disable when necessary)
function updatePaginationButtons() {
    const totalPages = Math.ceil(attendanceData.length / resultsPerPage);

    prevButton.disabled = currentPage === 0;
    nextButton.disabled = currentPage >= totalPages - 1;
}

// Pagination event listeners
prevButton.addEventListener('click', () => {
    if (currentPage > 0) {
        currentPage--;
        renderAttendancePage(currentPage);
    }
});

nextButton.addEventListener('click', () => {
    const totalPages = Math.ceil(attendanceData.length / resultsPerPage);
    if (currentPage < totalPages - 1) {
        currentPage++;
        renderAttendancePage(currentPage);
    }
});

// Initial rendering of the page
renderAttendancePage(currentPage);
