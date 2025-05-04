<?php
include '../database/database.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

// API handler (exit early if API call)
if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['action'])) {
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['description']) || !isset($data['amount'])) {
            echo json_encode(['success' => false, 'message' => 'Invalid input']);
            exit;
        }
        

        $description = mysqli_real_escape_string($conn, $data['description']);
        $amount = floatval($data['amount']);

        if (isset($data['id'])) {
            $sql = "UPDATE deductions SET Description = '$description', Amount = $amount WHERE DeductionID = ".(int)$data['id'];
        } else {
            $sql = "INSERT INTO deductions (Description, Amount) VALUES ('$description', $amount)";
        }

        echo mysqli_query($conn, $sql) 
            ? json_encode(['success' => true] + (!isset($data['id']) ? ['id' => mysqli_insert_id($conn)] : [])) 
            : json_encode(['success' => false, 'message' => 'Database error']);
        exit;
    }

    if ($_GET['action'] === 'get') {
        $result = mysqli_query($conn, "SELECT DeductionID, Description, Amount FROM deductions");
        echo json_encode(['success' => true, 'deductions' => mysqli_fetch_all($result, MYSQLI_ASSOC)]);
        exit;
    }

    if ($_GET['action'] === 'delete' && isset($_GET['id'])) {
        echo json_encode([
            'success' => mysqli_query($conn, "DELETE FROM deductions WHERE DeductionID = ".(int)$_GET['id']),
            'message' => 'Deleted'
        ]);
        exit;
    }

    echo json_encode(['success' => false, 'message' => 'Invalid action']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deductions</title>
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
                <button class="btn btn-primary" id="new-deduction-btn">+ New</button>
                </div>

                <div class="controls-group">
                    <label for="entries">Show <select id="entries"><option value="5">5</option><option value="10">10</option></select> entries</label>
                    <div class="search-container">
                        <label for="search-box">Search:</label>
                        <input type="text" id="search-box" class="search-box">
                    </div>
                </div>
                <table class="deductions-table">
                    <thead><tr><th>Description</th><th>Amount</th><th>Tools</th></tr></thead>
                    <tbody></tbody>
                </table>
                <div class="pagination">
                    <span>Showing 1 to 3 of 3 entries</span>
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
