<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400|Roboto+Mono&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <link rel="stylesheet" href="fonts/icomoon/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Contact Form </title>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
         
          <div class="row justify-content-center">
            <div class="col-md-12">
              
              <h3 class="thin-heading mb-4">Fill the form</h3>

              <form class="mb-5" method="post" id="userForm" name="contactForm">

                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username"><br>
               
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email"><br><br>
                <input type="submit" value="Submit">
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  
  <script>
    $(document).ready(function() {
        $('#userForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'submit.php',
                data: $(this).serialize(),
                success: function(response) {
                    alert('Form submitted successfully.');
                },
                error: function() {
                    alert('Error submitting form.');
                }
            });
        });
    });
</script>
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>