create database shout;
use shout;
create table login (username varchar(20) primary key, password varchar(20), ip varchar(30));
insert into login values('varsha','var','NULL');
insert into login values('srihari','sri','NULL');
create table chat(operator varchar(20), participants varchar(120), filename varchar(40) primary key, no_of_participants integer, creation_date Date, modified_time Time);

