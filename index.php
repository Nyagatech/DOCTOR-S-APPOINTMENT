<?php
include 'db.php'; // Include the database connection file
?>
<?=include 'header.php';?>
    <section>
        <div class="container ">
            <div class="row align-items-center">
                <div class="col-6 col-3sm">
                    <h1 class="text-start mt-5 fw-bold fs-2 text-sm-1">Book Appointment<br>With Trusted Doctors</h1>
                    <div class="container-fluid">
                        <div class="row">
                            <div class=""></div>
                            <div class=" text-sm-1">
                                <p>Simply browse through our extensive list of trusted doctors, schedule your appointment hassle-free.</p>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3 px-3" style="border-radius: 20px;">Book Appointment</button>
                </div>
                <div class="col-6">
                    <img src="img/doc-header-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    
    <section>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Find by Speciality</h2>
                </div>
                <div class="col-12 text-center">
                    <p>Simply browse through our extensive list of trusted doctors, schedule your appointment hassle-free.</p>
                </div>
                <div class="row" id="doctor-list">
                    <?php
                    // Fetch doctors from the database
                    $sql = "SELECT * FROM doctors";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '
                            <div class="col-md-3 g-2">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="' . $row["image"] . '" class="img-fluid" alt="">
                                        <h5 class="card-title">' . $row["name"] . '</h5>
                                        <p class="card-text">' . $row["specialty"] . '</p>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#bookingModal" data-doctor-id="' . $row["id"] . '" data-doctor-name="' . $row["name"] . '">Book Appointment</button>
                                    </div>
                                </div>
                            </div>';
                        }
                    } else {
                        echo "<p>No doctors found.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    
   <?=include 'footer.php';?>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Book Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="book_appointment.php" method="post">
                        <input type="hidden" name="doctor_id" id="doctor_id" value="">
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" name="user_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" class="form-control" name="time" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Book Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Set doctor ID in the modal when button is clicked
        var bookingModal = document.getElementById('bookingModal');
        bookingModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var doctorId = button.getAttribute('data-doctor-id');
            var doctorName = button.getAttribute('data-doctor-name');

            var modalTitle = bookingModal.querySelector('.modal-title');
            var modalBody = bookingModal.querySelector('.modal-body #doctor_id');

            modalTitle.textContent = 'Book Appointment with ' + doctorName;
            modalBody.value = doctorId;
        });
    </script>
</body>
</html>
