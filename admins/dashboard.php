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
   

    <script>
        function fetchUsers() {
            $.ajax({
                url: 'fetch_users.php',
                method: 'GET',
                success: function(data) {
                    $('#userTable').append(data);
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
                            location.reload();
                        },
                        error: function() {
                            alert('Error updating user.');
                        }
                    });
                }
            });
        });
    </script>

<?php
    require "footer.php";
?>