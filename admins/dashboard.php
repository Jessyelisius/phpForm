<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<?php
    require "header.php";
?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
echo "Welcome, " . $_SESSION['admin'];
echo "<br ><a style='color:black;' href='logout.php'>Logout</a>";
?>


    <!-- <title>Admin Dashboard</title>
</head>
<body> -->
    
  <div class="content">
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">

            <h2>Admin Panel</h2>
            <table border="1" id="userTable">
                <thead></thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <!-- User data will be populated here -->
                </tbody>
            </table>

    </div>
      </div>
    </div>

  </div>
  <audio id="newUserSound" src="bell.mp3" preload="auto"></audio>

   <!-- Interaction prompt -->
   <button id="enableSound">Enable Sound</button>
    <div id="soundStatus"></div>

<script>
    let lastUserId = 0;
    let soundEnabled = false;

    document.getElementById('enableSound').addEventListener('click', function() {
            soundEnabled = true;
            document.getElementById('soundStatus').innerText = "Sound enabled";
            this.style.display = 'none'; // Hide the button after enabling sound
        });


    function fetchUsers() {
        $.ajax({
            url: 'fetch_users.php',
            method: 'GET',
            success: function(data) {
                $('#userTable ').html(data);
            }
        });
    }
    $(document).on('click', '.delete-button', function() {
            const userId = $(this).data('id');
            if (confirm('Are you sure you want to delete this user?')) {
                $.ajax({
                    url: 'delete_user.php',
                    method: 'POST',
                    data: { id: userId },
                    success: function(response) {
                        fetchUsers();
                    }
                });
            }
        });

        $(document).ready(function() {
            fetchUsers();
        });

    function checkForNewUser() {
        $.ajax({
            url: 'latest_user.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.id > lastUserId) {
                    lastUserId = data.id;
                    $('#newUserSound')[0].play();
                    fetchUsers();
                }
            }
        });
    }

    $(document).ready(function() {
        fetchUsers();

        $(document).on('click', '.edit', function() {
            var id = $(this).data('id');
            var username = prompt('Enter new username:');
            var email = prompt('Enter new email:');
            if (username && email) {
                $.ajax({
                    url: 'update_user.php',
                    method: 'POST',
                    data: {id: id, username: username, email: email},
                    success: function(response) {
                        alert('User updated successfully.');
                        fetchUsers();
                    },
                    error: function() {
                        alert('Error updating user.');
                    }
                });
            }
        });

        // Initially fetch the last user ID
        $.ajax({
            url: 'latest_user.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data) {
                    lastUserId = data.id;
                }
            }
        });

        // Check for new users every 5 seconds
        setInterval(checkForNewUser, 5000);
    });
</script>




<?php
    require "footer.php";
?>


