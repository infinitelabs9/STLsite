<?php
    $movies = [
        [
            'movieId' => 1,
            'title' => 'Inception',
            'rating' => '8.8',
            'genres' => 'Action, Sci-Fi',
            'duration' => '148',
            'year' => '2010',
            'imagePath' => 'uploads/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_.jpg'
        ],
        [
            'movieId' => 2,
            'title' => 'Interestellar',
            'rating' => '8.7',
            'genres' => 'Action, Sci-Fi',
            'duration' => '169',
            'year' => '2014',
            'imagePath' => 'uploads/MV5BYzdjMDAxZGItMjI2My00ODA1LTlkNzItOWFjMDU5ZDJlYWY3XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg'
        ],
        [
            'movieId' => 3,
            'title' => 'Matilda',
            'rating' => '7.0',
            'genres' => 'Family, Comedy',
            'duration' => '98',
            'year' => '1996',
            'imagePath' => 'uploads/MV5BYWE3ZDMzMmEtODgwNi00NzMxLThkYWItMTAzMWUyMzI1NDQ1XkEyXkFqcGc@._V1_.jpg'
        ],
        [
            'movieId' => 4,
            'title' => 'Wicked',
            'rating' => '7.5',
            'genres' => 'Fantasy, Musical',
            'duration' => '160',
            'year' => '2024',
            'imagePath' => 'uploads\81cmJpAKEVL._AC_UF894,1000_QL80_.jpg'
        ],
        [
            'movieId' => 5,
            'title' => 'The Wild Robot',
            'rating' => '8.2',
            'genres' => 'Animation, Sci-Fi',
            'duration' => '102',
            'year' => '2024',
            'imagePath' => 'uploads/The_Wild_Robot_poster.jpg'
        ],
        [
            'movieId' => 6,
            'title' => 'Sinners',
            'rating' => '8.2',
            'genres' => 'Action, Supernatural Horror',
            'duration' => '137',
            'year' => '2025',
            'imagePath' => 'uploads/Sinners_(2025_film)_poster.jpg'
        ],
        [
            'movieId' => 7,
            'title' => 'Companion',
            'rating' => '7.0',
            'genres' => 'Psychological Thriller, Sci-Fi',
            'duration' => '97',
            'year' => '2025',
            'imagePath' => 'uploads/Companion_film_poster.jpg'
        ],
        [
            'movieId' => 8,
            'title' => 'Mickey 17',
            'rating' => '6.9',
            'genres' => 'Dark Comedy, Sci-Fi',
            'duration' => '137',
            'year' => '2025',
            'imagePath' => 'uploads/Mickey_17_film_poster.png'
        ],
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMovieList</title>
    <link rel ="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,900;1,400;1,500;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="container wrapper">
    <header class="header">
        <div class="nav">
            <div class="logo">
                <a href="index.php"><span class="logo-color">Our</span>Project</a>
            
    </header>

    <?php if (isset($_GET['message'])): ?>
        <p class="success-message"><?php echo htmlspecialchars($_GET['message']); ?></p>
    <?php endif; ?>

    <main class="main">
        <h1 class="main-title"> Movies</h1>
        <a class="add-movie" href="pages/addmovie.php">Add Movie</a>
    </main>

    <div class="bar">
        <div class="genres">
            <a class="genre" href="#All">All</a>
            <a class="genre" href="#Action">Action</a>
            <a class="genre" href="#Animation">Animation</a>
            <a class="genre" href="#Comedy">Comedy</a>
            <a class="genre" href="#Drama">Drama</a>
            <a class="genre" href="#Horror">Horror</a>
            <a class="genre" href="#Mystery">Mystery</a>
            <a class="genre" href="#Thriller">Thriller</a>
        </div>

        <div class="search-bar">
            <input class="input-field" type="text" placeholder="Search...">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
            </svg>
        </div>
    </div>

    <div class="catalog-container">
        <div class="grid-container">
            <?php
            if (!empty($movies)) {
                foreach ($movies as $movie) {
            ?>
                <div class='movie-card'>
                    <div class="image-container">
                        <a href="pages/details.php?movieId=<?php echo $movie['movieId']?>" class="details">Details</a>
                        <img class="card-image" src="<?php echo $movie['imagePath']; ?>" alt="Movie Image">
                    </div>
                    <div class="movie-content">
                        <h3><?php echo $movie['title']; ?></h3>
                        <p><?php echo $movie['rating']; ?></p>
                    </div>
                    <ul class="tag">
                        <li class="tag-item"><?php echo $movie['genres']; ?></li>
                        <li class="tag-item"><?php echo $movie['duration']; ?> min</li>
                        <li class="tag-item"><?php echo $movie['year']; ?></li>
                    </ul>
                </div>
            <?php
                }
            } else {
                echo "<p class='error-message'>Error: Could not fetch movie data. Please try again later.</p>";
            }
            ?>
        </div>
    </div>

    <footer class="footer section">
        <p>&copy; 2025 All rights reserved.</p>
    </footer>

    <script src="js/modernizr.js"></script>
</body>
</html>
