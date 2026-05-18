sql

create database lib;
use lib
create table users(fn varchar(20) ,usern varchar (20) , email varchar (20) , pno int (15) , pass varchar (255) );
select * from users;
desc users;	 
create table bookrec( bookid int(50) , booktitle varchar(50) ,authorname varchar(50) , genre varchar(20) , availablecopies int(50) );
select * from bookrec;
