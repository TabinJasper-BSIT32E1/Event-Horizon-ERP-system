<?php
include '../database/database.php'; // Include the database connection

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    // Decode the JSON data from the request body
    $data = json_decode(file_get_contents('php://input'), true);

    // Validate the input
    if (!isset($data['description']) || !isset($data['amount'])) {
        echo json_encode(['success' => false, 'message' => 'Invalid input']);
        exit;
    }

    $description = mysqli_real_escape_string($conn, $data['description']);
    $amount = floatval($data['amount']);

    // Check if there's an 'id' for updating existing data
    if (isset($data['id'])) {
        // Update existing deduction
        $id = intval($data['id']);
        $sql = "UPDATE deductions SET Description = '$description', Amount = $amount WHERE DeductionID = $id";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(['success' => true, 'message' => 'Deduction updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Database error: ' . mysqli_error($conn)]);
        }
    } else {
        // Insert new deduction
        $sql = "INSERT INTO deductions (Description, Amount) VALUES ('$description', $amount)";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(['success' => true, 'id' => mysqli_insert_id($conn), 'message' => 'Deduction saved successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Database error: ' . mysqli_error($conn)]);
        }
    }
    exit;
}

// Handle GET request to fetch existing deductions
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'get') {
    header('Content-Type: application/json');

    // Fetch the deductions from the database
    $sql = "SELECT DeductionID, Description, Amount FROM deductions";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo json_encode(['success' => false, 'message' => 'Database query error: ' . mysqli_error($conn)]);
        exit;
    }

    $deductions = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $deductions[] = $row;
    }

    // Return the deductions in JSON format
    echo json_encode(['success' => true, 'deductions' => $deductions]);
    exit;
}

// Handle DELETE request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    header('Content-Type: application/json');

    if (!isset($_GET['id'])) {
        echo json_encode(['success' => false, 'message' => 'Invalid deduction ID']);
        exit;
    }

    $id = intval($_GET['id']);
    $sql = "DELETE FROM deductions WHERE DeductionID = $id";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true, 'message' => 'Deduction deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . mysqli_error($conn)]);
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deductions Management</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/deduction.css?ver=<?php echo time(); ?>" />    
    <link rel="stylesheet" href="../css/header.css?ver=<?php echo time(); ?>" />
    <link rel="stylesheet" href="../css/footer.css?ver=<?php echo time(); ?>" />
</head>

<body>

    <div id="header-placeholder"></div>

    <div id="content-container">
        <div class="container">
            <h1>Deductions</h1>
            <div class="card">

                <div class="table-controls">
                    <button class="btn btn-primary">+ New</button>
                </div>
                <div class="controls-group">
                    <label for="entries">Show 
                        <select id="entries">
                            <option value="5">5</option>
                            <option value="10">10</option>
                        </select> entries
                    </label>
                    <div class="search-container">
                        <label for="search-box">Search:</label>
                        <input type="text" id="search-box" placeholder="" class="search-box">
                    </div>
                </div>

                <table class="deductions-table">
    <thead>
        <tr>
            <th>Description</th>
            <th>Amount</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody> <!-- This is the table body where rows will be inserted -->
    </tbody>
</table>


                <div class="pagination">
                    <span class="pagination-info">Showing 1 to 3 of 3 entries</span>
                    <div class="pagination-controls">
                        <button class="btn btn-pagination">Previous</button>
                        <span class="page-number active">1</span>
                        <button class="btn btn-pagination">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="footer-placeholder"></div>

    <!-- Modals -->
    <div id="add-deduction-modal" class="modal">
        <div class="modal-content">
            <h2>Add Deduction</h2>
            <form id="add-deduction-form">
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" required>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" id="amount" name="amount" required>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" id="close-modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <div id="edit-deduction-modal" class="modal">
    <div class="modal-content">
        <h2>Update Deduction</h2>
        <form id="edit-deduction-form">
            <div class="form-group">
                <label for="edit-description">Description</label>
                <input type="text" id="edit-description" name="description" required>
            </div>
            <div class="form-group">
                <label for="edit-amount">Amount</label>
                <input type="number" id="edit-amount" name="amount" required>
            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-secondary" id="close-edit-modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Deduction Modal -->
<div id="delete-deduction-modal" class="modal">
    <div class="modal-content">
        <h2>Deleting...</h2>
        <div class="deduction-info">
            <p id="delete-deduction-title">DELETE DEDUCTION</p>
            <p id="delete-deduction-data"></p>
        </div>
        <div class="form-actions">
            <button type="button" class="btn btn-secondary" id="close-delete-modal">Close</button>
            <button type="button" class="btn btn-danger" id="confirm-delete">Delete</button>
        </div>
    </div>
</div>
    <script src="../js/deduction.js"></script>    
    <script src="../js/header.js"></script>
    <script src="../js/footer.js"></script>
</body>
</html>