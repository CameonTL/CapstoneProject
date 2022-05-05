DROP DATABASE IF EXISTS Scheduler;
CREATE DATABASE Scheduler;

 -- Create Scheduler Schema
 USE Scheduler;
 
 DROP TABLE IF EXISTS ALL_INFO;
 CREATE TABLE ALL_INFO (
 uname      varchar(100) not null,
 uemail     varchar(50) not null,
 upassword  varchar(50) not null,
 weekOf     date,
 monOpen    time,
 monClose   time, 
 tueOpen    time,
 tueClose   time, 
 wedOpen    time,
 wedClose   time,
 thuOpen    time,
 thuClose   time,
 friOpen    time,
 friClose   time,
 CONSTRAINT pk_all_info primary key (uemail)
 );
 
 -- Select statements to validate that all tables were created properly
 SELECT * FROM ALL_INFO;
