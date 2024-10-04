<?= include'header.php'; ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Contact <strong>Us</strong></h2>
                </div>
                <div class="col-6">
                    <img src="img/contact_image.png" alt="Contact Us Image" class="img-fluid" style="margin-top: 70px">
                </div>
                <div class="col-6">
                    <p class="fw-bold my-4">OUR OFFICE</p>
                    <p>514 S. Magnolia St. Orlando, FL 32806</p>
                
                    <p class="fw-bold my-1">CONTACT</p>
                    <p>+254 123 456 789</p>
                    <p>+254 123 456 789</p>
                
                    <p>davidnyaga114@gmail.com</p> <!-- Corrected email format -->
                    <br>
                    <p class="fw-bold my-2">CAREERS AT PRESCRIPTO</p>
                    <p>Learn more about our teams and job openings.</p>

                    <button class="btn btn-primary">Explore Jobs</button>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="text-center">Get in Touch</h3>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>

            <?php
            // PHP Script to handle form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = htmlspecialchars($_POST["name"]);
                $email = htmlspecialchars($_POST["email"]);
                $message = htmlspecialchars($_POST["message"]);

                // Here you could add code to send email or store the message in a database
                // Example simple mail sending:
                $to = "davidnyaga114@gmail.com"; // Replace with your email
                $subject = "Contact Us Form Submission from $name";
                $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
                $headers = "From: $email";

                if (mail($to, $subject, $body, $headers)) {
                    echo '<div class="alert alert-success mt-4" role="alert">Your message has been sent successfully!</div>';
                } else {
                    echo '<div class="alert alert-danger mt-4" role="alert">There was an error sending your message. Please try again later.</div>';
                }
            }
            ?>
        </div>
    </section>
<?= include'footer.php'; ?>