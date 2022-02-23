DROP DATABASE IF EXISTS Scheduler;
CREATE DATABASE Scheduler;

 -- Create Scheduler Schema
 USE Scheduler;
 
 DROP TABLE IF EXISTS USER_LOGIN;
 CREATE TABLE USER_LOGIN (
 uname		varchar(40) not null,
 username	varchar(15) not null,
 upassword	varchar(25) not null,
 CONSTRAINT pk_userLogin primary key (username),
 CONSTRAINT uk_userLogin unique (username)
 );
 
 DROP TABLE IF EXISTS AVAILABLE;
 CREATE TABLE AVAILABLE (
 uname		varchar(40) not null,
 monAble	time,
 tueAble	time,
 wedAble	time,
 thuAble	time,
 friAble	time,
 CONSTRAINT pk_availabiltiy primary key (uname),
 CONSTRAINT fk_availabiltiy foreign key (uname) references USER_LOGIN(username)
 );
 
  -- Select statements to validate that all tables were created properly
  SELECT * FROM USER_LOGIN;
  SELECT * FROM AVAILABLE;
  