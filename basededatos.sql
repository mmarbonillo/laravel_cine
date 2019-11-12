DROP DATABASE IF EXISTS web;
CREATE DATABASE web CHAR SET utf8mb4;
USE web;

CREATE TABLE users (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(150) NOT NULL,
    `name` VARCHAR(150) NOT NULL,
    surname VARCHAR(150) NOT NULL,
    `password` VARCHAR(200) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    `type` BOOLEAN NOT NULL,
    updated_at DATETIME,
    created_at DATETIME
);

CREATE TABLE movies (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(150) UNIQUE NOT NULL,
    `year` INT(4) UNSIGNED NOT NULL,
    duration INT(3) UNSIGNED NOT NULL,
    rating INT UNSIGNED NOT NULL,
    cover VARCHAR(100),
    filepath VARCHAR(150) NOT NULL,
    filename VARCHAR(100) NOT NULL,
    external_url VARCHAR(150),
    updated_at DATETIME,
    created_at DATETIME
);


INSERT INTO users VALUES (NULL, 'mmarbonillo', 'Maria del Mar', 'Fernandez Bonillo', 'mmarbonillo', 'maria@gmail.com', 0, null, null);
INSERT INTO users VALUES (2, 'peri', 'Perico', 'Lopez Lopez', 'peri', 'perico@gmail.com', 1, null, null);
INSERT INTO users VALUES (3, 'algarabia', 'Alba', 'Gimenez Martinez', 'algarabia', 'alba@gmail.com', 1, null, null);
INSERT INTO users VALUES (NULL, 'jose', 'Jose', 'Bousfanj', 'jose', 'jose@gmail.com', 1, null, null);

INSERT INTO movies VALUES (NULL, 'El Club De La Lucha', 1997, 139, 8, 'elclubdelalucha.jpg', 'films/', 'el_club_de_la_lucha.mkv', 'https://es.wikipedia.org/wiki/Fight_Club', null, null);
INSERT INTO movies VALUES (NULL, 'Piratas Del Caribe: La Maldición De La Perla Negra', 2003, 143, 7, 'piratasdelcaribe1.jpg', 'films/', 'piratas_del_caribe_1.mkv', 'https://es.wikipedia.org/wiki/Pirates_of_the_Caribbean:_The_Curse_of_the_Black_Pearl', null, null);
INSERT INTO movies VALUES (NULL, 'Piratas Del Caribe: El Cofre Del Hombre Muerto', 2006, 151, 6, 'piratasdelcaribe2.jpg', 'films/', 'piratas_del_caribe_2.mkv', 'https://es.wikipedia.org/wiki/Pirates_of_the_Caribbean:_Dead_Man%27s_Chest', null, null);
INSERT INTO movies VALUES (NULL, 'Sweeney Todd, el barbero demoníaco de la calle Fleet', 2007, 117, 7, 'sweeneytood.jpg', 'films/', 'swenneytood.mkv', 'https://es.wikipedia.org/wiki/Sweeney_Todd:_The_Demon_Barber_of_Fleet_Street', null, null);
