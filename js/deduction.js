let deductions = [];
let currentPage = 1;
let rowsPerPage = 5;
let searchTerm = '';
let editId = null;
let deleteId = null;

// DOM Elements
const tableBody = document.querySelector('.deductions-table tbody');
const paginationInfo = document.querySelector('.pagination span');
const entriesSelect = document.getElementById('entries');
const searchBox = document.getElementById('search-box');

// Initialize the application
document.addEventListener('DOMContentLoaded', () => {
    fetchDeductions();
    
    // Setup event listeners
    entriesSelect.addEventListener('change', updateEntries);
    searchBox.addEventListener('input', updateSearch);
    document.querySelector('.btn.btn-primary').addEventListener('click', showAddModal);
    document.getElementById('close-modal').addEventListener('click', closeAddModal);
    document.getElementById('close-edit-modal').addEventListener('click', closeEditModal);
    document.getElementById('close-delete-modal').addEventListener('click', closeDeleteModal);
    document.getElementById('add-deduction-form').addEventListener('submit', handleAddDeduction);
    document.getElementById('edit-deduction-form').addEventListener('submit', handleEditDeduction);
    document.getElementById('confirm-delete').addEventListener('click', confirmDelete);

    // Robust event delegation for edit/delete buttons
    tableBody.addEventListener('click', function(e) {
        // Handle clicks on either buttons or their icons
        const target = e.target.closest('.btn-edit, .btn-delete, .fa-edit, .fa-trash');
        if (!target) return;
        
        // Get the actual button element
        const btn = target.classList.contains('btn-edit') || target.classList.contains('btn-delete') 
                   ? target 
                   : target.closest('.btn-edit, .btn-delete');
        
        if (!btn) return;
        
        const id = btn.getAttribute('data-id');
        
        if (btn.classList.contains('btn-edit')) {
            editDeduction(id);
        } else if (btn.classList.contains('btn-delete')) {
            deleteDeduction(id);
        }
    });
});

function editDeduction(id) {
    // Find the deduction with the given ID
    const deduction = deductions.find(d => d.DeductionID == id);
    if (!deduction) return;

    // Set the editId to keep track of the current deduction being edited
    editId = id;

    // Pre-fill the modal form fields with the deduction data
    document.getElementById('edit-description').value = deduction.Description;
    document.getElementById('edit-amount').value = deduction.Amount;

    // Show the edit modal
    document.getElementById('edit-deduction-modal').style.display = 'block';
}


// Fetch deductions from server
function fetchDeductions() {
    fetch('deduction.php?action=get')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                deductions = data.deductions;
                renderTable();
            } else {
                alert('Error loading deductions: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            alert('Network error loading deductions');
        });
}

// Render the table with pagination
function renderTable() {
    const filtered = deductions.filter(item =>
        item.Description.toLowerCase().includes(searchTerm.toLowerCase()) ||
        item.DeductionID.toString().includes(searchTerm)
    );

    const total = filtered.length;
    const start = (currentPage - 1) * rowsPerPage;
    const paginated = filtered.slice(start, start + rowsPerPage);

    tableBody.innerHTML = '';
    paginated.forEach(d => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${d.Description}</td>
            <td>${parseFloat(d.Amount).toFixed(2)}</td>
            <td>
                <button class="btn btn-edit" data-id="${d.DeductionID}">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-delete" data-id="${d.DeductionID}">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        tableBody.appendChild(row);
    });

    updatePaginationInfo(total, start, paginated.length);
    updatePaginationControls(Math.ceil(total / rowsPerPage));
}

// Update pagination information
function updatePaginationInfo(total, start, paginatedLength) {
    const showingStart = total === 0 ? 0 : start + 1;
    const showingEnd = start + paginatedLength;
    paginationInfo.textContent = `Showing ${showingStart} to ${showingEnd} of ${total} entries`;
}

// Update pagination controls
function updatePaginationControls(totalPages) {
    const container = document.querySelector('.pagination-controls');
    container.innerHTML = `
        <button class="btn btn-pagination" ${currentPage === 1 ? 'disabled' : ''}>
            Previous
        </button>
        <span class="page-number active">${currentPage}</span>
        <button class="btn btn-pagination" ${currentPage >= totalPages ? 'disabled' : ''}>
            Next
        </button>
    `;
    
    container.querySelector('.btn-pagination:first-child').addEventListener('click', () => changePage(currentPage - 1));
    container.querySelector('.btn-pagination:last-child').addEventListener('click', () => changePage(currentPage + 1));
}

// Change page number
function changePage(page) {
    const totalPages = Math.ceil(deductions.filter(d =>
        d.Description.toLowerCase().includes(searchTerm.toLowerCase()) ||
        d.DeductionID.toString().includes(searchTerm)
    ).length / rowsPerPage);

    if (page >= 1 && page <= totalPages) {
        currentPage = page;
        renderTable();
    }
}

// Update number of rows per page
function updateEntries() {
    rowsPerPage = parseInt(entriesSelect.value, 10);
    currentPage = 1;
    renderTable();
}

// Update search term
function updateSearch(e) {
    searchTerm = e.target.value;
    currentPage = 1;
    renderTable();
}

function showAddModal() {
    document.getElementById('add-deduction-modal').style.display = 'block';
}

function closeAddModal() {
    document.getElementById('add-deduction-modal').style.display = 'none';
    document.getElementById('add-deduction-form').reset();
}

function closeEditModal() {
    document.getElementById('edit-deduction-modal').style.display = 'none';
    document.getElementById('edit-deduction-form').reset();
}

function closeDeleteModal() {
    document.getElementById('delete-deduction-modal').style.display = 'none';
}

/* CRUD Operations */
async function handleAddDeduction(e) {
    e.preventDefault();
    
    // Get values from the form
    const description = document.getElementById('description').value.trim();
    const amount = parseFloat(document.getElementById('amount').value.trim());

    // Validate input
    if (!description || isNaN(amount) || amount <= 0) {
        alert('Invalid input: Please check your Description and Amount');
        return;
    }

    // Prepare data to send as JSON
    const data = {
        description: description,
        amount: amount
    };

    try {
        const response = await fetch('deduction.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data) // Send the data as JSON
        });
        const result = await response.json();
        
        if (result.success) {
            closeAddModal();
            fetchDeductions();
        } else {
            alert('Error: ' + (result.message || 'Failed to add deduction'));
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Network error while adding deduction');
    }
}


// Handle form submission for updating the deduction
async function handleEditDeduction(e) {
    e.preventDefault();
    
    // Get the updated description and amount values
    const description = document.getElementById('edit-description').value.trim();
    const amount = parseFloat(document.getElementById('edit-amount').value.trim());

    // Validate input
    if (!description || isNaN(amount) || amount <= 0) {
        alert('Invalid input: Please check your Description and Amount');
        return;
    }

    // Prepare the data to be sent for the update
    const data = {
        id: editId,  // Include the ID of the deduction being updated
        description: description,
        amount: amount
    };

    try {
        const response = await fetch('deduction.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)  // Send the data as JSON
        });

        const result = await response.json();
        
        if (result.success) {
            closeEditModal();
            fetchDeductions();  // Refresh the table data after successful update
        } else {
            alert('Error: ' + (result.message || 'Failed to update deduction'));
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Network error while updating deduction');
    }
}


function deleteDeduction(id) {
    const deduction = deductions.find(d => d.DeductionID == id);
    if (!deduction) return;
    
    deleteId = id;
    document.getElementById('delete-deduction-data').textContent = 
        `${deduction.Description} (${deduction.Amount})`;
    document.getElementById('delete-deduction-modal').style.display = 'block';
}

async function confirmDelete() {
    try {
        const response = await fetch(`deduction.php?action=delete&id=${deleteId}`);
        const result = await response.json();
        
        if (result.success) {
            closeDeleteModal();
            fetchDeductions();
        } else {
            alert('Error: ' + (result.message || 'Failed to delete deduction'));
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Network error while deleting deduction');
    }
}