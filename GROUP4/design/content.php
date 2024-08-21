<?php
if(isset($_SESSION['username'])){
  header("location: index.php");
}


// Check for error message in session
$errorMessage = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']); // Clear error message after displaying it
?>

<section class="vh-100" id="backgroundSection" style="position: relative; overflow: hidden;">
  <div class="background-image" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: cover; background-position: center; transition: opacity 1s ease-in-out, transform 4s ease-in-out; z-index: -1;"></div>
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="card shadow-sm" style="border-radius: 10px;">
          <div class="card-body p-4">
            <div class="text-center">
              <img src="design/logo.png" style="width: 150px;" alt="Logo">
              <h4 class="mt-3 mb-4 pb-1">Login</h4>
            </div>

            <!-- Display error message if exists -->
            <?php if (!empty($errorMessage)): ?>
              <div class="alert alert-danger text-center" role="alert">
                <?php echo $errorMessage; ?>
              </div>
            <?php endif; ?>

            <form action="config/data.php" method="POST">
              <div class="mb-3">
                <label class="form-label" for="username">Student Name</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter Name" style="border: 1px solid gray;">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" style="background-color: white; border: 1px solid gray;">
                <div class="form-check mt-2">
                  <input type="checkbox" class="form-check-input" id="showPassword">
                  <label class="form-check-label" for="showPassword">Show Password</label>
                </div>
              </div>
              <button type="submit" id="loginButton" class="btn btn-primary w-100">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
document.getElementById('showPassword').addEventListener('change', function() {
  const passwordInput = document.getElementById('password');
  if (this.checked) {
    passwordInput.type = 'text';
  } else {
    passwordInput.type = 'password';
  }
});
</script>


<style>
  .background-image {
    opacity: 1;
    transform: scale(0.5);
    transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    z-index: 1;
  }

  .zoom-in {
    animation: zoomIn 4s ease-in-out infinite;
  }

  @keyframes zoomIn {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.05);
    }
    100% {
      transform: scale(1);
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const images = [
      'design/back.jpg',
      'design/back2.webp',
      'design/back3.jpg'
    ];
    const backgroundImageDiv = document.querySelector('.background-image');
    let currentIndex = 0;

    function changeBackgroundImage() {
      backgroundImageDiv.style.opacity = 0;
      setTimeout(() => {
        backgroundImageDiv.style.backgroundImage = `url(${images[currentIndex]})`;
        backgroundImageDiv.style.opacity = 1;
        currentIndex = (currentIndex + 1) % images.length;
      }, 0); // Time to match the opacity transition
    }

    // Initialize with the first image
    backgroundImageDiv.style.backgroundImage = `url(${images[currentIndex]})`;

    // Apply the zoom-in effect
    backgroundImageDiv.classList.add('zoom-in');

    // Change image every 5 seconds (4s for image + 1s for transition)
    setInterval(changeBackgroundImage, 5000);

    // Show/Hide Password
    const passwordField = document.getElementById('password');
    const showPasswordCheckbox = document.getElementById('showPassword');

    showPasswordCheckbox.addEventListener('change', function () {
      passwordField.type = showPasswordCheckbox.checked ? 'text' : 'password';
    });
  });
</script>
