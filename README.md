# Event-Organizer

#CMSC389N Group Project

#Members: Sam Cheng, David Kanney, Aadit Patel

Create Database Tables: 

create table events (eventID integer, eventName varchar(50), date varchar(20), description varchar(200), picture longblob, email varchar(50));

create table users (firstname varchar(20), lastName varchar(20), email varchar(50), phone varchar(20), age integer, accountType enum('M','P'), password varchar(20));
