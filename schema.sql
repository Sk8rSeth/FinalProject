DROP DATABASE IF EXISTS Stori;
CREATE DATABASE Stori;
USE Stori;
CREATE TABLE user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(64) NOT NULL,
    email VARCHAR(255) NOT NULL,
    score INT DEFAULT 1,
    remember_token varchar(255),
    created_at datetime,
    updated_at datetime
);
CREATE TABLE story (
    story_id INT AUTO_INCREMENT PRIMARY KEY,
    seed_id INT NOT NULL,
    score INT DEFAULT 1,
    story_body TEXT DEFAULT NULL,
    genre VARCHAR(255) DEFAULT NULL
);

CREATE TABLE comment (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    comment_body TEXT NOT NULL,
    score INT DEFAULT 1,
    created_at TIMESTAMP,
    assessed INT DEFAULT 0
);

CREATE TABLE seed (
    seed_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    seed_body TEXT NOT NULL,
    score INT DEFAULT 1,
    genre VARCHAR(255),
    created_at TIMESTAMP
);

CREATE TABLE comment_vote (
    user_id INT NOT NULL,
    comment_id INT NOT NULL,
    vote VARCHAR(255)
);

CREATE TABLE story_vote (
    user_id INT NOT NULL,
    story_id INT NOT NULL,
    vote VARCHAR(255)
);

CREATE TABLE seed_vote (
    user_id INT NOT NULL,
    seed_id INT NOT NULL,
    vote VARCHAR(255)
);

CREATE TABLE story_comment (
    story_comment_id INT AUTO_INCREMENT PRIMARY KEY,
    story_id INT NOT NULL,
    comment_id INT NOT NULL
);

CREATE TABLE genre (
    genre_id INT AUTO_INCREMENT PRIMARY KEY,
    genre_description VARCHAR(255)
);

-- 
-- Insert sample data
-- 


-- users
INSERT INTO user (first_name, last_name, username, password, email)
    VALUES ('Seth', 'Howell', 'Sk8rSeth', '$2y$10$/.N0EP1vKzW1WxXMvyqutOHnlmGiopecaI4NE/0xbJpKHnaw8BvGS', 's@h.com');
INSERT INTO user (first_name, last_name, username, password, email)
    VALUES ('Minnie', 'Mouse', 'MinnieMouse', '$2y$10$/.N0EP1vKzW1WxXMvyqutOHnlmGiopecaI4NE/0xbJpKHnaw8BvGS', 'Minnie@Mouse.com');

-- genres
INSERT INTO genre (genre_description) VALUES ('SciFi');
INSERT INTO genre (genre_description) VALUES ('Mystery');
INSERT INTO genre (genre_description) VALUES ('Fantasy');
INSERT INTO genre (genre_description) VALUES ('Horror');
INSERT INTO genre (genre_description) VALUES ('Drama');

-- seeds
INSERT INTO seed (user_id, genre_id, seed_body) VALUES (1, 1, '"You’re a neutrino," he said, staring at the ground. He felt her head turn at his voice, eyes on him. He didn’t move.');
INSERT INTO seed (user_id, genre_id, seed_body) VALUES (1, 4, '"Break a leg," she said with a wry smile. "You’re going to do great."');
INSERT INTO seed (user_id, genre_id, seed_body) VALUES (2, 2, 'I bring him flowers every day, I hope that he will want to play! He never moves, he’s always there.');


-- comments 
-- INSERT INTO comment () VALUES ();


-- stories  
INSERT INTO story (seed_id, genre_id, story_body) 
    VALUES (1, 1, 
        '"You’re a neutrino," he said, staring at the ground. He felt her head turn at his voice, eyes on him. He didn’t move.
        "What do you mean?" she asked. She shifted in her seat. Book spines on the shelf in front of her read Sagan, Herbert, Wells. Anything was better than dealing with this, she thought.
        He still examined the floor in front of him. “Neutrinos are lonely. They almost never interact with any other particle.” He paused, looked at her shoes then back to the floor. “A neutrino could pass through a light-year of lead without hitting anything,” he said.
        She clenched her jaw. She knew what she was supposed to do, maybe say she was sorry or explain just what was bothering her. She said nothing.
        "You’re lonely," he said. "Passing through the world, trying so hard not to touch anything." Again, the floor stole his gaze.
        She softened at the words. Crumbled. “But no matter how lonely,” she whispered, “something eventually touches them…” Out of the corner, he could see her feet shuffle towards him.');
-- INSERT INTO 