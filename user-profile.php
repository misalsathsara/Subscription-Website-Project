<?php
session_start();
include 'dbase.php';

// Check if the user is logged in
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    include('header2.php');
} else {
    header('Location: index.php');
    exit();
}

// Fetch user details from the database using the logged-in username
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT c_id, c_name, c_email, c_tel, c_address FROM customers WHERE c_uname = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($c_id, $c_name, $c_email, $c_tel, $c_address);
$stmt->fetch();

$stmt->close();
$conn->close();
?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<style>
    .profile-card {
        max-width: 600px;
        margin: 50px auto;
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }
    .profile-header {
        background: linear-gradient(135deg, #007bff, #00c6ff);
        color: #fff;
        padding: 40px;
        text-align: center;
    }
    .profile-header img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 3px solid #fff;
        margin-bottom: 10px;
    }
    .profile-header h2 {
        font-weight: bold;
        font-size: 1.75rem;
    }
    .info-item input {
        background-color: #f8f9fa;
        border: none;
        border-radius: 5px;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    .btn-custom {
        width: 120px;
        border-radius: 50px;
    }

    label{
        font-weight: bold;
    }
</style>

<form action="update_profile.php" method="post" class="profile-card p-4">
    <div class="profile-header">
        <h2>Welcome, <?php echo htmlspecialchars($c_name); ?>!</h2>
        <p class="mb-0">Edit Your Profile Information</p>
    </div>
    <div class="profile-body p-3">
        <div class="mb-3">
            <label for="userId" class="form-label">User ID</label>
            <p class="form-control-plaintext" id="userId"><?php echo htmlspecialchars($c_id); ?></p>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <p class="form-control-plaintext" id="username"><?php echo htmlspecialchars($username); ?></p>
        </div>
        <div class="mb-3">
            <label for="c_name" class="form-label">Full Name</label>
            <input type="text" name="c_name" value="<?php echo htmlspecialchars($c_name); ?>" class="form-control" id="c_name" required>
        </div>
        <div class="mb-3">
            <label for="c_email" class="form-label">Email</label>
            <input type="email" name="c_email" value="<?php echo htmlspecialchars($c_email); ?>" class="form-control" id="c_email" required>
        </div>
        <div class="mb-3">
            <label for="c_tel" class="form-label">Phone Number</label>
            <input type="tel" name="c_tel" value="<?php echo htmlspecialchars($c_tel); ?>" class="form-control" id="c_tel">
        </div>
        <div class="mb-3">
            <label for="c_address" class="form-label">Address</label>
            <input type="text" name="c_address" value="<?php echo htmlspecialchars($c_address); ?>" class="form-control" id="c_address">
        </div>
    </div>
    <div class="card-footer text-center p-3">
        <button type="submit" class="btn btn-primary btn-custom me-2">Update</button>
        <a href="index.php" class="btn btn-secondary btn-custom">Cancel</a>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
include 'footer.php';
?>
