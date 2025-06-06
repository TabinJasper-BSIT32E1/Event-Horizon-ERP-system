// new file pang function ng table sa employees

let currentPage = 0; //Also make sure currentPage is declared globally; Place it outside any function, near the top of your DOMContentLoaded callback. -chatGPT

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('.search-container input');
    const tableBody = document.getElementById('employee-table-body');

    function fetchEmployees(query = '', page = 0) {
        const limit = 5; //limit value display sa table 
        const offset = page * limit;
    
        fetch(`../html/employee.php?api=1&query=${query}&limit=${limit}&offset=${offset}`)
            .then(response => response.json())
            .then(data => {
                tableBody.innerHTML = '';
                data.forEach(emp => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>EMP${emp.EmployeeID}</td>
                        <td>${emp.FirstName} ${emp.LastName}</td>
                        <td>${emp.EmailAdd}</td>
                        <td>${emp.JobPosition}</td>
                        <td>${emp.Department}</td>
                        <td>${emp.Status}</td>
                        <td>Full-Time</td>
                        <td>${emp.HireDate}</td>
                    `;
                    tableBody.appendChild(row);
                });
            });
    }
    

    // previous and next button // pagination
    const paginationContainer = document.createElement('div');
    paginationContainer.className = 'pagination-controls';
    paginationContainer.innerHTML = `
        <button id="prev-page">Previous</button>
        <button id="next-page">Next</button>
    `;
    document.querySelector('.employee-container').appendChild(paginationContainer);

    document.getElementById('prev-page').addEventListener('click', () => {
        if (currentPage > 0) {
            currentPage--;
            fetchEmployees(searchInput.value, currentPage);
        }
    });

    document.getElementById('next-page').addEventListener('click', () => {
        currentPage++;
        fetchEmployees(searchInput.value, currentPage);
    });

    searchInput.addEventListener('input', function () {
        currentPage = 0; // Reset to first page on new search
        fetchEmployees(searchInput.value, currentPage);
    });

    fetchEmployees(); // Load first page on load
});
