<style>
  /* modal */
  /* Modal Background */
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);

  }

  /* Modal Content */
  .modal-content {
    background-color: white;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
  }

  /* Close Button */
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

  /* Form Elements */
  form div {
    margin-bottom: 15px;
  }

  label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
  }

  input[type="text"],
  textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
  }

  textarea {
    height: 150px;
    resize: vertical;
  }

  /* Button */
  button {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
  }

  button:hover {
    background-color: #45a049;
  }

  button:disabled {
    background-color: #cccccc;
    cursor: not-allowed;
    cursor: auto;
  }
</style>

<?php
include '../dbase.php';

// get message from db
$sql = "SELECT * FROM contact ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!-- search option in data table -->
<input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for email, subject or message..."
  style="width: 250px; padding: 8px 12px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px; 
       outline: none; transition: border-color 0.3s ease;"
  onfocus="this.style.borderColor='#007bff';" onblur="this.style.borderColor='#ccc';">



<!-- data Table-->
<table id="messagesTable" style="width: 100%; border-collapse: collapse; margin-top: 10px;">
  <!-- Table Header -->
  <thead>
    <tr style="background-color: #f4f4f4; text-align: left;">
      <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
      <th style="padding: 10px; border: 1px solid #ddd;">Email</th>
      <th style="padding: 10px; border: 1px solid #ddd;">Subject</th>
      <th style="padding: 10px; border: 1px solid #ddd;">Message</th>
      <th style="padding: 10px; border: 1px solid #ddd;">Status</th>
      <th style="padding: 10px; border: 1px solid #ddd;">Actions</th>
    </tr>
  </thead>

  <tbody>
    <?php
    if ($result->num_rows > 0) {
      $rowNumber = 1;
      while ($row = $result->fetch_assoc()) {
        $status = $row['seen'] ? "Seen" : "Unseen";
        $buttonDisabled = $row['seen'] ? "" : "disabled";
        $buttonOpacity = $row['seen'] ? "1" : "0.6";

        echo "<tr>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$rowNumber}</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$row['email']}</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$row['subject']}</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$row['message']}</td>";

        // Status button
        echo "<td style='padding: 10px; border: 1px solid #ddd; text-align: center;'>
                <button class='toggle-btn' data-id='{$row['id']}' data-seen='{$row['seen']}' style='
                    padding: 8px 16px;
                    font-size: 14px;
                    color: #fff;
                    background-color: " . ($row['seen'] ? '#007bff' : '#4caf50') . ";
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    min-width: 80px;
                    height: 36px;
                    display: inline-block;
                    transition: background-color 0.3s ease;'>
                    " . ($row['seen'] ? 'Seen' : 'Unseen') . "
                </button>
              </td>";

        //  Send Email button
        echo "<td style='padding: 10px; border: 1px solid #ddd; text-align: center;'>";

        // Send Email button (disabled based on seen status)
        echo "<button class='send-email-btn' 
            data-email='" . htmlspecialchars($row['email']) . "' 
            data-subject='" . htmlspecialchars($row['subject']) . "' 
            data-message='" . htmlspecialchars($row['message']) . "' 
            style='
                padding: 8px 12px;
                font-size: 14px;
                color: #fff;
                background-color: #008CBA;
                border: none;
                border-radius: 5px;
                margin-right: 5px;
                transition: background-color 0.3s ease;
                opacity: {$buttonOpacity};'
            {$buttonDisabled}>
            Send Email
        </button>";

        // Delete button
        echo "<button class='delete-btn' data-id='{$row['id']}' style='
            padding: 8px 12px;
            font-size: 14px;
            color: #fff;
            background-color: #f44336;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;'
            onmouseover=\"this.style.backgroundColor='#d32f2f';\"
            onmouseout=\"this.style.backgroundColor='#f44336';\">
            Delete
        </button>";

        echo "</td>";
        echo "</tr>";
        $rowNumber++;
      }
    } else {
      echo "<tr><td colspan='6' style='text-align: center; padding: 10px;'>No messages found</td></tr>";
    }
    $conn->close();
    ?>
  </tbody>
</table>

<!-- Admin message Modal -->
<div id="responseModal" class="modal" style="display:none;">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h3>Send Admin Response</h3>
    <form id="adminResponseForm">
      <input type="hidden" name="email" id="recipientEmail" />
      <div>
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" placeholder="Subject" required />
      </div>
      <div>
        <label for="message">Original Message:</label>
        <textarea id="message" name="message" readonly></textarea>
      </div>
      <div>
        <label for="adminMessage">Admin's Response:</label>
        <textarea id="adminMessage" name="admin_message" placeholder="Type your response here..." required></textarea>
      </div>
      <button type="submit">Send Response</button>
    </form>
  </div>
</div>




<script>
  // Search function 
  function searchTable() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    table = document.getElementById("messagesTable");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td");
      let found = false;

      for (j = 1; j < td.length - 1; j++) {
        if (td[j]) {
          txtValue = td[j].textContent || td[j].innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            found = true;
            break;
          }
        }
      }

      if (found) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }

  // seen unseen

  // Select all toggle buttons
  const toggleButtons = document.querySelectorAll('.toggle-btn');

  toggleButtons.forEach(button => {
    button.addEventListener('click', function() {
      const messageId = this.dataset.id;
      const seenStatus = this.dataset.seen;


      fetch('update_seen.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            id: messageId,
            seen: seenStatus
          })
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {

            const newSeenStatus = seenStatus == 1 ? 0 : 1;
            this.textContent = newSeenStatus == 1 ? 'Seen' : 'Unseen';
            this.dataset.seen = newSeenStatus;

            // Update the button color
            this.style.backgroundColor = newSeenStatus == 1 ? '#007bff' : '#4caf50';

            // Enable or disable 
            const sendEmailButton = this.closest('tr').querySelector('.send-email-btn');
            if (newSeenStatus == 1) {
              sendEmailButton.disabled = false;
              sendEmailButton.style.opacity = '1';
            } else {
              sendEmailButton.disabled = true;
              sendEmailButton.style.opacity = '0.6';
            }
          } else {
            alert('Failed to update status.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('An error occurred.');
        });
    });
  });

  // send email

  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('responseModal');
    const closeBtn = document.querySelector('.close');
    const adminResponseForm = document.getElementById('adminResponseForm');

    // open modal
    const openModal = (email, message) => {
      document.getElementById('recipientEmail').value = email;
      document.getElementById('message').value = message;
      modal.style.display = 'block';
    };

    //  close modal
    closeBtn.addEventListener('click', () => {
      modal.style.display = 'none';
    });

    // Hide modal when clicking outside 
    window.addEventListener('click', (event) => {
      if (event.target === modal) {
        modal.style.display = 'none';
      }
    });

    //  "Send Email" buttons
    const sendEmailButtons = document.querySelectorAll('.send-email-btn');
    sendEmailButtons.forEach((button) => {
      button.addEventListener('click', function() {
        const email = this.dataset.email;
        const message = this.dataset.message;
        openModal(email, message);
      });
    });

    // form submission
    adminResponseForm.addEventListener('submit', (e) => {
      e.preventDefault();

      // Collect form data
      const formData = new FormData(adminResponseForm);

      // Send the data
      fetch('admin_send_email.php', {
          method: 'POST',
          body: formData,
        })
        .then((response) => response.json())
        .then((data) => {
          if (data.status === 'success') {
            alert('Email sent successfully!');
            modal.style.display = 'none';
          } else {
            alert('Failed to send email: ' + data.message);
          }
        })
        .catch((error) => {
          console.error('Error:', error);
          alert('An error occurred while sending the email.');
        });
    });
  });
</script>