document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.querySelector(".deductions-table tbody");
    const addModal = document.getElementById("add-deduction-modal");
    const editModal = document.getElementById("edit-deduction-modal");
    const addForm = document.getElementById("add-deduction-form");
    const editForm = document.getElementById("edit-deduction-form");
    const closeAddModalBtn = document.getElementById("close-modal");
    const closeEditModalBtn = document.getElementById("close-edit-modal");

    let editingRow = null; // Reference to the row being edited
    let editingId = null;  // ID of the deduction being edited

    // Load existing deductions
    function loadDeductions() {
        fetch('../html/deduction.php?action=get')
            .then(response => response.json())
            .then(data => {
                if (data.success && data.deductions) {
                    tableBody.innerHTML = ''; // Clear existing rows
                    data.deductions.forEach(deduction => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${deduction.Description}</td>
                            <td>${parseFloat(deduction.Amount).toFixed(2)}</td>
                            <td>
                                <button class="btn btn-edit" data-id="${deduction.DeductionID}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-delete" data-id="${deduction.DeductionID}">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
                } else {
                    alert('Error loading deductions: ' + (data.message || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error loading deductions:', error);
                alert('An error occurred while loading deductions.');
            });
    }

    // Open Add Modal
    document.querySelector(".btn-primary").addEventListener("click", function () {
        addForm.reset();
        addModal.style.display = "flex";
    });

    // Close Add Modal
    closeAddModalBtn.addEventListener("click", function () {
        addModal.style.display = "none";
    });

    // Close Edit Modal
    closeEditModalBtn.addEventListener("click", function () {
        editModal.style.display = "none";
    });

    // Close modals when clicking outside the modal content
    window.addEventListener("click", function (event) {
        if (event.target === addModal) {
            addModal.style.display = "none";
        }
        if (event.target === editModal) {
            editModal.style.display = "none";
        }
    });

    // Handle Add Form Submission
    addForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(addForm);
        const jsonData = {};
        formData.forEach((value, key) => {
            jsonData[key] = value;
        });

        // Send data to PHP script using fetch API
        fetch('../html/deduction.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(jsonData),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${jsonData.description}</td>
                    <td>${parseFloat(jsonData.amount).toFixed(2)}</td>
                    <td>
                        <button class="btn btn-edit" data-id="${data.id}">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-delete" data-id="${data.id}">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                `;
                tableBody.appendChild(newRow);

                addForm.reset();
                addModal.style.display = "none";
                alert('Deduction saved successfully!');
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred: ' + error.message);
        });
    });

    // Open Edit Modal
    tableBody.addEventListener("click", function (event) {
        if (event.target.closest(".btn-edit")) {
            const editButton = event.target.closest(".btn-edit");
            editingRow = editButton.closest("tr");
            editingId = editButton.dataset.id;

            // Populate the form with existing data
            const description = editingRow.querySelector("td:nth-child(1)").textContent;
            const amount = editingRow.querySelector("td:nth-child(2)").textContent;

            document.getElementById("edit-description").value = description;
            document.getElementById("edit-amount").value = amount;

            editModal.style.display = "flex";
        }
    });

    // Handle Edit Form Submission
    editForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(editForm);
        const jsonData = {};
        formData.forEach((value, key) => {
            jsonData[key] = value;
        });
        jsonData["id"] = editingId; // Add ID for editing

        // Send data to PHP script using fetch API
        fetch('../html/deduction.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(jsonData),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update the existing row in the table
                editingRow.querySelector("td:nth-child(1)").textContent = jsonData.description;
                editingRow.querySelector("td:nth-child(2)").textContent = parseFloat(jsonData.amount).toFixed(2);

                // Close the modal
                editModal.style.display = "none";
                alert('Deduction updated successfully!');
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred: ' + error.message);
        });
    });
    // Initial load
    loadDeductions();
});

document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.querySelector(".deductions-table tbody");
    const deleteModal = document.getElementById("delete-deduction-modal");
    const closeDeleteModalBtn = document.getElementById("close-delete-modal");
    const confirmDeleteBtn = document.getElementById("confirm-delete");
    const deleteDescription = document.getElementById("delete-deduction-description");

    let rowToDelete = null; // Reference to the row being deleted
    let deleteId = null;    // ID of the deduction being deleted

    // Open Delete Modal
    tableBody.addEventListener("click", function(event) {
        if (event.target.closest(".btn-delete")) {
            const deleteButton = event.target.closest(".btn-delete");
            rowToDelete = deleteButton.closest("tr");
            deleteId = deleteButton.dataset.id;
    
            const description = rowToDelete.querySelector("td:nth-child(1)").textContent;
            
            // Set the title and data separately
            document.getElementById('delete-deduction-title').textContent = "DELETE DEDUCTION";
            document.getElementById('delete-deduction-data').textContent = description;
            
            deleteModal.style.display = "flex";
        }
    });

    // Close Delete Modal
    closeDeleteModalBtn.addEventListener("click", function () {
        deleteModal.style.display = "none";
    });

    // Confirm Delete
    confirmDeleteBtn.addEventListener("click", function () {
        if (deleteId) {
            fetch(`../html/deduction.php?action=delete&id=${deleteId}`, {
                method: 'GET',
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    rowToDelete.remove(); // Remove the row from the table
                    deleteModal.style.display = "none";
                    alert('Deduction deleted successfully!');
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred: ' + error.message);
            });
        }
    });

    // Close modal when clicking outside the modal content
    window.addEventListener("click", function (event) {
        if (event.target === deleteModal) {
            deleteModal.style.display = "none";
        }
    });
});