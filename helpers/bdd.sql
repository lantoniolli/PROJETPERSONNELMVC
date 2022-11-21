CREATE TABLE meetings(
   Id_meetings INT AUTO_INCREMENT,
   event_date DATETIME,
   event_name VARCHAR(50) ,
   event_description VARCHAR(200) ,
   PRIMARY KEY(Id_meetings)
);

CREATE TABLE houses(
   Id_houses INT AUTO_INCREMENT,
   houses_name VARCHAR(50) ,
   PRIMARY KEY(Id_houses)
);

CREATE TABLE users(
   Id_users INT AUTO_INCREMENT,
   user_name VARCHAR(50) ,
   user_mail VARCHAR(125) ,
   user_password VARCHAR(255) ,
   created_at VARCHAR(50) ,
   validated_at VARCHAR(50) ,
   user_avatar INT,
   user_roles VARCHAR(50) ,
   Id_houses INT,
   PRIMARY KEY(Id_users),
   FOREIGN KEY(Id_houses) REFERENCES houses(Id_houses)
);

CREATE TABLE comments(
   Id_comments INT AUTO_INCREMENT,
   validated_at DATETIME,
   posted_at DATETIME,
   comment_description VARCHAR(500) ,
   Id_meetings INT NOT NULL,
   Id_users INT NOT NULL,
   PRIMARY KEY(Id_comments),
   FOREIGN KEY(Id_meetings) REFERENCES meetings(Id_meetings),
   FOREIGN KEY(Id_users) REFERENCES users(Id_users)
);

CREATE TABLE bookings(
   Id_bookings INT AUTO_INCREMENT,
   booking_place INT,
   Id_meetings INT NOT NULL,
   Id_users INT NOT NULL,
   PRIMARY KEY(Id_bookings),
   FOREIGN KEY(Id_meetings) REFERENCES meetings(Id_meetings),
   FOREIGN KEY(Id_users) REFERENCES users(Id_users)
);
