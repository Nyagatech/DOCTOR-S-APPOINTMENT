<?=
include 'header.php';
?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <img src="img/appointment.jpg" alt="Doctor Appointment" class="img-fluid">
                </div>
                <div class="col-9" style="border: 1px solid; border-radius: 10px;">
                    <h2>Dr. Richard Hendricks <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill text-primary" viewBox="0 0 16 16">
                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
                      </svg></span></h2>
                    <p>MBBS - General Physician <span style="border: solid 1px black; padding: 5px; border-radius: 20px; font-size: small;"> 2 Years </span></p>
                    <p class="fw-bold mb-3">About <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-octagon-fill" viewBox="0 0 16 16">
                        <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                      </svg></span></p>
                    <p>Dr. Davis has a strong commitment to delivering comprehensive medical care, focusing on preventive medicine,
                    early diagnosis, and effective treatment strategies.</p>
                    <p>Appointment fee: <span class="fw-bold">$50</span></p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-3">
                    <h2 class="text-start mt-5 fw-bold"></h2>
                </div>
                <div class="col-9">
                    <p class="text-start fw-bold">Booking slots</p>
                    <div class="row">
                        <div class="col-md-3 gy-2">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">MON <br>10</p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3 gy-2">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">TUE <br>11</p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3 gy-2">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">WED <br>12</p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3 gy-2">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">THU <br>13</p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3 gy-2">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">FRI <br>14</p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3 gy-2">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">SAT <br>15</p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3 gy-2">
                         <div class="card">
                                <div class="card-body">
                                    <p class="card-title">SUN <br>16</p>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3 px-3" style="border-radius: 20px;" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Appointment</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal for Booking Appointment -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Book Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-3">
                            <label for="patientName" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="patientName" name="patient_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="patientEmail" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="patientEmail" name="patient_email" required>
                        </div>
                        <div class="mb-3">
                            <label for="appointmentDate" class="form-label">Appointment Date</label>
                            <input type="date" class="form-control" id="appointmentDate" name="appointment_date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirm Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Handling the form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $patientName = htmlspecialchars($_POST["patient_name"]);
        $patientEmail = htmlspecialchars($_POST["patient_email"]);
        $appointmentDate = htmlspecialchars($_POST["appointment_date"]);

        // You can add code to send the appointment details to your email or store it in a database
        $to = "davidnyaga114@gmail.com"; // Replace with your email
        $subject = "New Appointment from $patientName";
        $message = "Patient Name: $patientName\nEmail: $patientEmail\nDate of Appointment: $appointmentDate";
        $headers = "From: $patientEmail";

        // Using mail function to send email
        if (mail($to, $subject, $message, $headers)) {
            echo '<div class="alert alert-success mt-4" role="alert">Your appointment has been booked successfully!</div>';
        } else {
            echo '<div class="alert alert-danger mt-4" role="alert">There was a problem booking your appointment. Please try again later.</div>';
        }
    }
    ?>

    <section>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Related Doctors</h1>
                    <p>Simply browse through our extensive list of trusted doctors.</p>
                </div>
                <div class="row">
                    <!-- Example related doctors -->
                    <div class="col-md-3 g-2">
                        <div class="card">
                            <div class="card-body">
                                <img src="img/appointment-doc-img.png" class="img-fluid" alt="">
                                <h5 class="card-title">Dr. John Doe</h5>
                                <p class="card-text">General Physician</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 g-2">
                        <div class="card">
                            <div class="card-body">
                                <img src="img/appointment-doc-img.png" class="img-fluid" alt="">
                                <h5 class="card-title">Dr. Jane Doe</h5>
                                <p class="card-text">Gynecologist</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 g-2">
                        <div class="card">
                            <div class="card-body">
                                <img src="img/appointment-doc-img.png" class="img-fluid" alt="">
                                <h5 class="card-title">Dr. Sam Smith</h5>
                                <p class="card-text">Pediatrician</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 g-2">
                        <div class="card">
                            <div class="card-body">
                                <img src="img/appointment-doc-img.png" class="img-fluid" alt="">
                                <h5 class="card-title">Dr. Emily Clark</h5>
                                <p class="card-text">Dermatologist</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?=include('footer.php');?>
    