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
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    remember_token varchar(255)
);
CREATE TABLE story (
    story_id INT AUTO_INCREMENT PRIMARY KEY,
    seed_id INT NOT NULL,
    story_body TEXT DEFAULT NULL,
    score INT DEFAULT 1,
    genre_id VARCHAR(255) DEFAULT 1,
    number_comments INT DEFAULT 0,
    is_alive INT DEFAULT 1
);

CREATE TABLE comment (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    story_id INT NOT NULL,
    comment_body TEXT NOT NULL,
    created_at TIMESTAMP,
    score INT DEFAULT 1,
    assessed INT DEFAULT 0
);

CREATE TABLE seed (
    seed_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title TEXT NOT NULL,
    seed_body TEXT NOT NULL,
    created_at TIMESTAMP,
    genre_id VARCHAR(255),
    score INT DEFAULT 1,
    times_used INT DEFAULT 0
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
    VALUES ('Cap. Mal', 'Reynolds', 'Cap.MalReynolds', '$2y$10$/.N0EP1vKzW1WxXMvyqutOHnlmGiopecaI4NE/0xbJpKHnaw8BvGS', 'mal@reynolds.com');
INSERT INTO user (first_name, last_name, username, password, email)
    VALUES ('John', 'M.', 'John117', '$2y$10$/.N0EP1vKzW1WxXMvyqutOHnlmGiopecaI4NE/0xbJpKHnaw8BvGS', 'spartan@halo.com');
INSERT INTO user (first_name, last_name, username, password, email)
    VALUES ('Buffy', 'Summers', 'TheSlayer', '$2y$10$/.N0EP1vKzW1WxXMvyqutOHnlmGiopecaI4NE/0xbJpKHnaw8BvGS', 'buffy@summers.com');
INSERT INTO user (first_name, last_name, username, password, email)
    VALUES ('Jon', 'Snow', 'LordCommander', '$2y$10$/.N0EP1vKzW1WxXMvyqutOHnlmGiopecaI4NE/0xbJpKHnaw8BvGS', 'j@s.com');
INSERT INTO user (first_name, last_name, username, password, email)
    VALUES ('Tyrion', 'Lannister', 'The_Imp', '$2y$10$/.N0EP1vKzW1WxXMvyqutOHnlmGiopecaI4NE/0xbJpKHnaw8BvGS', 't@l.com');
INSERT INTO user (first_name, last_name, username, password, email)
    VALUES ('Finn', 'TheHuman', 'Adventurer', '$2y$10$/.N0EP1vKzW1WxXMvyqutOHnlmGiopecaI4NE/0xbJpKHnaw8BvGS', 'finn@ooo.com');
INSERT INTO user (first_name, last_name, username, password, email)
    VALUES ('Sarah', 'Kerrigan', 'QueenOfBlades', '$2y$10$/.N0EP1vKzW1WxXMvyqutOHnlmGiopecaI4NE/0xbJpKHnaw8BvGS', 's@k.com');

-- genres
INSERT INTO genre (genre_description) VALUES ('SciFi');
INSERT INTO genre (genre_description) VALUES ('Mystery');
INSERT INTO genre (genre_description) VALUES ('Fantasy');
INSERT INTO genre (genre_description) VALUES ('Horror');
INSERT INTO genre (genre_description) VALUES ('Drama');

-- seeds
INSERT INTO seed (user_id, genre_id, times_used, title, seed_body) VALUES (1, 1, 1, "Passing Through", '"You’re a neutrino," he said, staring at the ground. He felt her head turn at his voice, eyes on him. He didn’t move.');
INSERT INTO seed (user_id, genre_id, title, seed_body) VALUES (1, 4, "Just A Light", '"Break a leg," she said with a wry smile. "You’re going to do great."');
INSERT INTO seed (user_id, genre_id, title, seed_body) VALUES (2, 2, "Him", 'I bring him flowers every day, I hope that he will want to play! He never moves, he’s always there.');


-- comments 
INSERT INTO comment (user_id, story_id, comment_body) VALUES (2, 1, '"What do you mean?" she asked. She shifted in her seat.');
INSERT INTO comment (user_id, story_id, comment_body) VALUES (3, 1, 'Book spines on the shelf in front of her read Sagan, Herbert, Wells. Anything was better than dealing with this, she thought.');
INSERT INTO comment (user_id, story_id, comment_body) VALUES (5, 1, 'He still examined the floor in front of him. “Neutrinos are lonely. They almost never interact with any other particle.”');
INSERT INTO comment (user_id, story_id, comment_body) VALUES (1, 1, 'He paused, looked at her shoes then back to the floor.');
INSERT INTO comment (user_id, story_id, comment_body) VALUES (5, 1, '“A neutrino could pass through a light-year of lead without hitting anything,” he said.');
INSERT INTO comment (user_id, story_id, comment_body) VALUES (2, 1, 'She clenched her jaw. She knew what she was supposed to do, maybe say she was sorry or explain just what was bothering her.');
INSERT INTO comment (user_id, story_id, comment_body) VALUES (3, 1, ' She said nothing.');
INSERT INTO comment (user_id, story_id, comment_body) VALUES (2, 1, '"You’re lonely," he said. "Passing through the world, trying so hard not to touch anything." Again, the floor stole his gaze.');
INSERT INTO comment (user_id, story_id, comment_body) VALUES (2, 1, 'She softened at the words. Crumbled. “But no matter how lonely,” she whispered, “something eventually touches them…”');
INSERT INTO comment (user_id, story_id, comment_body) VALUES (4, 1, 'Out of the corner, he could see her feet shuffle towards him.');


-- stories  
INSERT INTO story (seed_id, genre_id, number_comments, story_body) 
    VALUES (1, 1, 11,
        '"You’re a neutrino," he said, staring at the ground. He felt her head turn at his voice, eyes on him. He didn’t move.<br><br>
        "What do you mean?" she asked. She shifted in her seat. Book spines on the shelf in front of her read Sagan, Herbert, Wells. Anything was better than dealing with this, she thought.<br><br>
        He still examined the floor in front of him. “Neutrinos are lonely. They almost never interact with any other particle.” He paused, looked at her shoes then back to the floor. “A neutrino could pass through a light-year of lead without hitting anything,” he said.<br><br>
        She clenched her jaw. She knew what she was supposed to do, maybe say she was sorry or explain just what was bothering her. She said nothing.<br><br>
        "You’re lonely," he said. "Passing through the world, trying so hard not to touch anything." Again, the floor stole his gaze.<br><br>
        She softened at the words. Crumbled. “But no matter how lonely,” she whispered, “something eventually touches them…” Out of the corner, he could see her feet shuffle towards him.');
-- INSERT INTO 