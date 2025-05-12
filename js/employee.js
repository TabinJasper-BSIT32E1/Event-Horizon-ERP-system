let currentPage = 0;

document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById("attendanceContainer");
    const resultsPerPage = 5;

    function renderTablePage(page = 0) {
        container.innerHTML = "";

        const start = page * resultsPerPage;
        const end = start + resultsPerPage;
        const paginatedItems = attendanceData.slice(start, end);

        paginatedItems.forEach(item => {
            const row = document.createElement("div");
            row.className = "attendance-row";

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

            container.appendChild(row);
        });

        updatePaginationButtons();
    }

    function updatePaginationButtons() {
        const totalPages = Math.ceil(attendanceData.length / resultsPerPage);
        document.getElementById('prev-page').disabled = currentPage === 0;
        document.getElementById('next-page').disabled = currentPage >= totalPages - 1;
    }

    // Create pagination buttons
    const paginationContainer = document.createElement('div');
    paginationContainer.className = 'pagination-controls';
    paginationContainer.innerHTML = `
        <button id="prev-page">Previous</button>
        <button id="next-page">Next</button>
    `;
    document.querySelector('.attendance-container').appendChild(paginationContainer);

    document.getElementById('prev-page').addEventListener('click', () => {
        if (currentPage > 0) {
            currentPage--;
            renderTablePage(currentPage);
        }
    });

    document.getElementById('next-page').addEventListener('click', () => {
        const totalPages = Math.ceil(attendanceData.length / resultsPerPage);
        if (currentPage < totalPages - 1) {
            currentPage++;
            renderTablePage(currentPage);
        }
    });

    renderTablePage(currentPage);
});
