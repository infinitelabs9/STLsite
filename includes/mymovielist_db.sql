-- Create the database
CREATE DATABASE IF NOT EXISTS movie_database;

-- Select the database
USE movie_database;

-- Create the movies table
CREATE TABLE IF NOT EXISTS movies (
    movieId INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    synopsis TEXT,
    imagePath VARCHAR(255),
    rating VARCHAR(50),
    genres VARCHAR(255),
    duration INT,
    year INT,
    ageRating VARCHAR(50)
);

-- Create the genres table
CREATE TABLE IF NOT EXISTS genres (
    genreId INT AUTO_INCREMENT PRIMARY KEY,
    genre VARCHAR(100)
);

-- Insert the movie data (Interstellar)
INSERT INTO movies (title, synopsis, imagePath, rating, genres, duration, year, ageRating)
VALUES ('Interstellar', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.', 'path_to_image/interstellar.jpg', 'PG-13', 'Sci-Fi, Drama', 169, 2014, 'PG-13');

-- Insert the movie data (The Hangover)
INSERT INTO movies (title, synopsis, imagePath, rating, genres, duration, year, ageRating)
VALUES ('The Hangover', 'Three friends wake up from a bachelor party in Las Vegas with no memory of the previous night and the bachelor missing.', 'path_to_image/hangover.jpg', 'R', 'Comedy', 100, 2009, 'R');

-- You can also insert genres like this, assuming the genres are stored separately
INSERT INTO genres (genre) VALUES ('Sci-Fi'), ('Drama'), ('Comedy');
