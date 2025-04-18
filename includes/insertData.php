<?php
function insertData() {
    require 'database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $rating = $_POST['age-rating'];
        $release_year = $_POST['release-year'];
        $synopsis = $_POST['synopsis'];
        $duration = $_POST['duration'];

        $base_dir = __DIR__ . '/../';
        $target_dir = $base_dir . "uploads/";

        if (!is_dir($target_dir)) {
            if (!mkdir($target_dir, 0755, true)) {
                die("Failed to create upload directory.");
            }
        }

        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            echo "File is not a valid image.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo "File already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["image"]["size"] > 5000000) {
            echo "File is too large. Limit is 5MB.";
            $uploadOk = 0;
        }

        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "File was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $relative_path = "uploads/" . basename($_FILES["image"]["name"]);

                $stmt = $db->prepare("INSERT INTO movies (title, year, synopsis, duration, rating, imagePath) VALUES (?, ?, ?, ?, ?, ?)");

                if (!$stmt) {
                    die("Prepare failed: (" . $db->errno . ") " . $db->error);
                }

                $stmt->bind_param("sssiss", $title, $release_year, $synopsis, $duration, $rating, $relative_path);

                if ($stmt->execute()) {
                    $movie_id = $db->insert_id;

                    $genres_array = explode(",", $genre);
                    foreach ($genres_array as $genre_name) {
                        $genre_name = trim($genre_name);
                        $stmt_genre = $db->prepare("INSERT INTO genres (movieId, genre) VALUES (?, ?)");

                        if ($stmt_genre) {
                            $stmt_genre->bind_param("is", $movie_id, $genre_name);
                            $stmt_genre->execute();
                            $stmt_genre->close();
                        } else {
                            echo "Error inserting genre: " . $db->error;
                        }
                    }

                    echo "Movie added successfully.";
                } else {
                    echo "Database insert failed: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error uploading file.";
            }
        }

        mysqli_close($db);
    }
}

insertData();
?>
