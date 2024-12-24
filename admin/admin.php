<?php 
$activePage = 'addadmin';
include('admin-header.php');
include '../dbase.php'; ?>
<div id="content">
  
    <main style="align-items: right; justify-content: right;">
        <div class="head-title">
            <div class="left">
                <h1>Admin Management</h1>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#" class="active">Admin Management</a></li>
                </ul>
            </div>
        </div>

        <!-- Table and Add Admin Button -->
        <div class="table-data">
            <div class="admin-table order">
                <div class="head">
                    <h3>Current Administrators</h3>
                    <button id="addAdminBtn" class="btn-download">Add New Admin</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="adminTableBody">
                        <!-- Data will be loaded dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>


<!-- Modal -->
<div id="addAdminModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Add New Admin</h2>
        <form id="addAdminForm">
    <input type="text" name="name" id="adminName" placeholder="Username" required>
    <input type="email" name="email" id="adminEmail" placeholder="Email" required>
    <input type="password" name="password" id="adminPassword" placeholder="Password" required>
    <button type="submit" class="btn-download">Add Admin</button>
</form>

    </div>
</div>

<script>


// Modal Controls
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('addAdminModal');
    const openBtn = document.getElementById('addAdminBtn');
    const closeBtn = document.querySelector('.close-btn');

    openBtn.addEventListener('click', () => {
        modal.classList.add('show');
    });

    closeBtn.addEventListener('click', () => {
        modal.classList.remove('show');
    });

    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.remove('show');
        }
    });
});

// Handle Add Admin Form
document.getElementById('addAdminForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    // Debug: Log form data to ensure it's being sent
    for (let [key, value] of formData.entries()) {
        console.log(key, value);
    }

    fetch('add-admin.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                fetchAdmins(); // Refresh admin table
                document.getElementById('addAdminModal').classList.remove('show');
                this.reset(); // Clear the form
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
});



</script>
<script>
// Fetch Admins
function fetchAdmins() {
    fetch('get-admins.php')
        .then(response => response.json())
        .then(data => {
            const adminTableBody = document.getElementById('adminTableBody');
            if (data.length === 0) {
                adminTableBody.innerHTML = `<tr><td colspan="4">No Admins Found</td></tr>`;
            } else {
                adminTableBody.innerHTML = data.map(admin => `
                    <tr>
                        <td>${admin.name}</td>
                        <td>${admin.email}</td>
                        <td>${admin.role}</td>
                        <td>
                            <button class="delete-btn" data-id="${admin.id}">Delete</button>
                        </td>
                    </tr>
                `).join('');
            }
        })
        .catch(error => console.error('Error fetching admins:', error));
}

// Handle Delete Admin
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('delete-btn')) {
        const adminId = e.target.getAttribute('data-id');
        console.log('Attempting to delete Admin ID:', adminId);

        if (confirm('Are you sure you want to delete this admin?')) {
            fetch('delete-admin.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: adminId }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Server Response:', data);
                if (data.success) {
                    alert(data.message);
                    fetchAdmins(); // Refresh admin table
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                alert('An error occurred. Please try again.');
            });
        }
    }
});

// Initial Load
fetchAdmins();
</script>


<?php include('admin-footer.php'); ?>

<style>
    /* Admin Table Section */
.admin-table {
    background: var(--light);
    border-radius: 20px;
    padding: 24px;
    overflow-x: auto;
}

.admin-table .head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

.admin-table .head h3 {
    font-size: 24px;
    font-weight: 600;
    color: var(--dark);
}

.btn-download {
    height: 36px;
    padding: 0 20px;
    border-radius: 36px;
    background: var(--blue);
    color: var(--light);
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border: none;
    transition: 0.3s;
}

.btn-download:hover {
    background: var(--dark-grey);
}

/* Modal */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 2000;
}
.modal.show {
    display: flex;
}
.modal-content {
    background: var(--light);
    padding: 20px;
    border-radius: 10px;
    width: 400px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
.close-btn {
    float: right;
    cursor: pointer;
    font-size: 20px;
}
.modal-content form {
    display: flex;
    flex-direction: column;
}
.modal-content form input {
    margin: 10px 0;
    padding: 10px;
    border: 1px solid var(--grey);
    border-radius: 5px;
}
.btn-download {
    padding: 10px;
    background: var(--blue);
    color: var(--light);
    border: none;
    cursor: pointer;
    text-align: center;
    border-radius: 5px;
    margin-top: 10px;
    transition: background 0.3s;
}
.btn-download:hover {
    background: var(--dark-grey);
}

.delete-btn {
    background: #ff4d4d;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 6px 10px;
    cursor: pointer;
    transition: background 0.3s;
}

.delete-btn:hover {
    background: #e60000;
}

</style>