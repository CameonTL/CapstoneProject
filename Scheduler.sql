DROP DATABASE IF EXISTS Scheduler;
CREATE DATABASE Scheduler;

 -- Create Scheduler Schema
 USE Scheduler;
 
 DROP TABLE IF EXISTS USER_LOGIN;
 CREATE TABLE USER_LOGIN (
 uname		varchar(40) not null,
 uemail		varchar(40) not null,
 upassword	varchar(25) not null,
 CONSTRAINT pk_userLogin primary key (uemail),
 CONSTRAINT uk_userlogin unique (uname)
 );
 
 DROP TABLE IF EXISTS USER_INFO;
 CREATE TABLE USER_INFO (
 uname		varchar(40) not null,
 uemail		varchar(40) not null,
 unumber	int(11) not null,
 uposition	varchar(15),
 ucompany	varchar(30) not null,
 CONSTRAINT pk_userInfo primary key (uemail),
 CONSTRAINT uk_userInfo unique (uname),
 CONSTRAINT fk_userInfo foreign key (uemail) references USER_LOGIN(uemail)
 );
 
 DROP TABLE IF EXISTS COMPANY_INFO;
 CREATE TABLE COMPANY_INFO (
 cname		varchar(30) not null,
 cnumber	int(11) not null,
 clocation	varchar(40) not null,
 CONSTRAINT pk_companyInfo primary key (cname)
 );
 
 DROP TABLE IF EXISTS AVAILABLE;
 CREATE TABLE AVAILABLE (
 uemail		varchar(40) not null,
 monOpen	time,
 monClose	time,
 tueOpen	time,
 tueClose	time,
 wedOpen	time,
 wedClose	time,
 thuOpen	time,
 thuClose	time,
 friOpen	time,
 friClose	time,
 CONSTRAINT fk_availabiltiy foreign key (uemail) references USER_LOGIN(uemail)
 );
 
  -- Select statements to validate that all tables were created properly
  SELECT * FROM USER_LOGIN;
  SELECT * FROM USER_INFO;
  SELECT * FROM COMPANY_INFO;
  SELECT * FROM AVAILABLE;
  
