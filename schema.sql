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
    assessed INT DEFAULT 0,
    in_story INT DEFAULT 0
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
    VALUES ('Seth', 'Howell', 'Sk8rSeth', '$2y$10$QXyUtwDOrinRLsEu3fUn9.3HNjQb72PgBDwLhC4MNWrQ4oI04I2XG', 's@h.com');
INSERT INTO user (first_name, last_name, username, password, email)
    VALUES ('Cap. Mal', 'Reynolds', 'Cap.MalReynolds', '$2y$10$/.N0EP1vKzW1WxXMvyqutOHnlmGiopecaI4NE/0xbJpKHnaw8BvGS', 'mal@reynolds.com');
INSERT INTO user (first_name, last_name, username, password, email)
    VALUES ('John', 'M.', 'John117', '$2y$10$QXyUtwDOrinRLsEu3fUn9.3HNjQb72PgBDwLhC4MNWrQ4oI04I2XG', 'spartan@halo.com');
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
INSERT INTO user (first_name, last_name, username, password, email)
    VALUES ('Chris', 'Norris', 'Mordecai15', '$2y$10$QXyUtwDOrinRLsEu3fUn9.3HNjQb72PgBDwLhC4MNWrQ4oI04I2XG', 'c@n.com');

-- genres
INSERT INTO genre (genre_description) VALUES ('SciFi');
INSERT INTO genre (genre_description) VALUES ('Mystery');
INSERT INTO genre (genre_description) VALUES ('Fantasy');
INSERT INTO genre (genre_description) VALUES ('Horror');
INSERT INTO genre (genre_description) VALUES ('Drama');

-- seeds
INSERT INTO seed (user_id, genre_id, times_used, title, seed_body) VALUES (1, 1, 1, "Passing Through", '"You’re a neutrino," he said, staring at the ground. He felt her head turn at his voice, eyes on him. He didn’t move.');
INSERT INTO seed (user_id, genre_id, times_used, title, seed_body) VALUES (2, 1, 1, "Salvage", 'She stepped wearily through the airlock and slammed the wall switch.');
INSERT INTO seed (user_id, genre_id, title, seed_body) VALUES (1, 4, "Just A Light", '"Break a leg," she said with a wry smile. "You’re going to do great."');
INSERT INTO seed (user_id, genre_id, title, seed_body) VALUES (2, 2, "Him", 'I bring him flowers every day, I hope that he will want to play! He never moves, he’s always there.');


-- comments

-- story 1  1,
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (2, 1, 1, 1, '"What do you mean?" she asked. She shifted in her seat.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (3, 1, 1, 1, 'Book spines on the shelf in front of her read Sagan, Herbert, Wells. Anything was better than dealing with this, she thought.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (5, 1, 1, 1, 'He still examined the floor in front of him. “Neutrinos are lonely. They almost never interact with any other particle.”');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (1, 1, 1, 1, 'He paused, looked at her shoes then back to the floor.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (5, 1, 1, 1, '“A neutrino could pass through a light-year of lead without hitting anything,” he said.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (2, 1, 1, 1, 'She clenched her jaw. She knew what she was supposed to do, maybe say she was sorry or explain just what was bothering her.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (3, 1, 1, 1, ' She said nothing.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (2, 1, 1, 1, '"You’re lonely," he said. "Passing through the world, trying so hard not to touch anything." Again, the floor stole his gaze.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (2, 1, 1, 1, 'She softened at the words. Crumbled. “But no matter how lonely,” she whispered, “something eventually touches them…”');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (4, 1, 1, 1, 'Out of the corner, he could see her feet shuffle towards him.');

-- story 2
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (2,2, 1, 1, 'The immense door swung shut behind her, the rapid change in air pressure letting her know that it had sealed itself,');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (3,2, 1, 1, 'sucking the contaminated air from the tiny chamber as it did so. The UV lights flared on around her and her helmet’s filter automatically darkened.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (5,2, 1, 1, 'The familiar patter of the chemical shower beat down against her visor.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (3,2, 1, 1, 'After a few minutes, the yellow indicator light on the wall blinked a calming green, letting her know that she was cleared of contaminants.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (1,2, 1, 1, 'She felt the rush of the air press against her suit as the room re-pressurized itself.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (6,2, 1, 1, 'She unlatched her helmet with a tiny hiss, relieved to be free of the stale recycled air of her suit.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (7,2, 1, 1, 'The bunker’s air was recycled too, she knew, but somehow it felt less stifling.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (3,2, 1, 1, 'Funny how that feeling never got old, she thought, no matter how many times she’d been in and out of that stupid suit.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (5,2, 1, 1, 'And how many times had it been? She glanced at the date indicator on her arm and realized with a start, she knew exactly how many times.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (1,2, 1, 1, 'In the antechamber beyond the airlock, she released the airtight seals at her wrists and ankles');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (5,2, 1, 1, 'and stepped carefully out of the suit, placing it gently back in its storage chamber.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (1,2, 1, 1, 'She took the handle of the heavy wheeled chest that contained today’s salvage and started towards her lab.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (4,2, 1, 1, 'Normally she’d turn on some music while she worked to stave off the unending silence of the bunker,');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (4,2, 1, 1, 'vintage audio files that she’d pulled from previous salvages.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (2,2, 1, 1, '1980’s pop rock was her favorite, Bowie and Journey and Depeche Mode. But not today.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (1,2, 1, 1, 'She punched up a file on her viewscreen, and the monitor filled with the image of a handsome young man in a lab coat.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (5,2, 1, 1, '“Hi baby,” he said with a grin, clear blue eyes sparkling despite the pixelated image.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (6,2, 1, 1, '“Sorry, I think I have a bad connection-but you won’t believe it, babe. I figured it out. I found the answer.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (7,2, 1, 1, 'I can’t believe we’ve been missing it this whole time, when it was right in front of us.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (8,2, 1, 1, 'I spoke with the council, and they’re flying me out in about six hours to meet with the President. This could all be over by tomorrow.”');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (8,2, 1, 1, 'He continued to explain the details of his findings, and she smiled in spite of herself as she watched him gesturing excitedly,');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (7,2, 1, 1, 'only pausing momentarily to sweep his long hair back out of his eyes.');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (4,2, 1, 1, 'He went on for several minutes, until the transmission image began to crackle and waver,');
INSERT INTO comment (user_id, story_id, assessed, in_story, comment_body) VALUES (6,2, 1, 1, 'finally freezing on his childlike half-smile, the last image she would ever see of him. The date stamp read one year ago today."');

-- stories  
INSERT INTO story (seed_id, genre_id, number_comments, story_body) 
    VALUES (1, 1, 11,
        '"You’re a neutrino," he said, staring at the ground. He felt her head turn at his voice, eyes on him. He didn’t move.<br>
        "What do you mean?" she asked. She shifted in her seat. Book spines on the shelf in front of her read Sagan, Herbert, Wells. Anything was better than dealing with this, she thought.<br>
        He still examined the floor in front of him. “Neutrinos are lonely. They almost never interact with any other particle.” He paused, looked at her shoes then back to the floor. “A neutrino could pass through a light-year of lead without hitting anything,” he said.<br>
        She clenched her jaw. She knew what she was supposed to do, maybe say she was sorry or explain just what was bothering her. She said nothing.<br>
        "You’re lonely," he said. "Passing through the world, trying so hard not to touch anything." Again, the floor stole his gaze.<br>
        She softened at the words. Crumbled. “But no matter how lonely,” she whispered, “something eventually touches them…” Out of the corner, he could see her feet shuffle towards him.');
INSERT INTO story (seed_id, genre_id, number_comments, story_body) 
    VALUES (2, 1, 24, 
        "She stepped wearily through the airlock and slammed the wall switch. The immense door swung shut behind her, the rapid change in air pressure letting her know that it had sealed itself, sucking the contaminated air from the tiny chamber as it did so. The UV lights flared on around her and her helmet’s filter automatically darkened. 
        The familiar patter of the chemical shower beat down against her visor. After a few minutes, the yellow indicator light on the wall blinked a calming green, letting her know that she was cleared of contaminants. She felt the rush of the air press against her suit as the room re-pressurized itself.  
        She unlatched her helmet with a tiny hiss, relieved to be free of the stale recycled air of her suit. The bunker’s air was recycled too, she knew, but somehow it felt less stifling. Funny how that feeling never got old, she thought, no matter how many times she’d been in and out of that stupid suit. And how many times had it been? She glanced at the date indicator on her arm and realized with a start, she knew exactly how many times.
        In the antechamber beyond the airlock, she released the airtight seals at her wrists and ankles and stepped carefully out of the suit, placing it gently back in its storage chamber. She took the handle of the heavy wheeled chest that contained today’s salvage and started towards her lab.
        Normally she’d turn on some music while she worked to stave off the unending silence of the bunker, vintage audio files that she’d pulled from previous salvages. 1980’s pop rock was her favorite, Bowie and Journey and Depeche Mode. But not today. She punched up a file on her viewscreen, and the monitor filled with the image of a handsome young man in a lab coat.
        “Hi baby,” he said with a grin, clear blue eyes sparkling despite the pixelated image. “Sorry, I think I have a bad connection-but you won’t believe it, babe. I figured it out. I found the answer. I can’t believe we’ve been missing it this whole time, when it was right in front of us. I spoke with the council, and they’re flying me out in about six hours to meet with the President. This could all be over by tomorrow.”
        He continued to explain the details of his findings, and she smiled in spite of herself as she watched him gesturing excitedly, only pausing momentarily to sweep his long hair back out of his eyes. He went on for several minutes, until the transmission image began to crackle and waver, finally freezing on his childlike half-smile, the last image she would ever see of him. The date stamp read one year ago today.");