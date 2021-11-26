CREATE DATABASE chat;

USE chat;

CREATE TABLE users(
  id int NOT NULL AUTO_INCREMENT,
  unique_id int,
  fname varchar(50),
  lname varchar(50),
  email varchar(70),
  pass varchar(70),
  img  varchar (100),
  status_ varchar (20),
  PRIMARY KEY(id)  
);

CREATE TABLE messages(
  id_msg int NOT NULL AUTO_INCREMENT,
  incoming_msg_id int,
  outgoing_msg_id int,
  message varchar(1000),
  PRIMARY KEY(id_msg)  
);
