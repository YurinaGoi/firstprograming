select * from staff;

drop table staff;
create table  staff(id int, name varchar(20),PRIMARY KEY (`id`));
select * from pastdata;
drop table pastdata;
drop table num_data;
create table pastdata(id int,name1 varchar(20),name2 varchar(20),name3 varchar(20),primary key(id));
select * from num_data;
create table num_data(id int(100),name1 int,name2 int, name3 int,primary key(id));
select * from num_data;
