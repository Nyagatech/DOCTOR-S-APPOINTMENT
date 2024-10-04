<?php
include 'db.php'; // Include the database connection file
?>

 <?=include 'header.php';?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>Browse through our extensive list of trusted doctors.</p>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary">General physician</button>
                    <button class="btn btn-primary">Gynecologist</button>
                    <button class="btn btn-primary">Dermatologist</button>
                    <button class="btn btn-primary">Pediatricians</button>
                    <button class="btn btn-primary">Neurologist</button>
                    <button class="btn btn-primary">Gastroenterologist</button>
                </div>
                <div class="col-9">
                    <div class="row">
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
        </div>
    </section>

     <?=include"footer.php"?>
