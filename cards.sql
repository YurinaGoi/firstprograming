select * from staff8;

drop table staff;
create table  staff(id int, name varchar(20),PRIMARY KEY (`id`));
select * from pastdata;
drop table pastdata;

drop table num_data;
create table pairlist(id int, pair1 varchar(20), pair2 varchar(20), pair3 varchar(20), pair4 carchar(20))
create table pastdata(id int,name1 varchar(20),name2 varchar(20),name3 varchar(20),primary key(id));
select * from num_data;
create table num_data(id int(100),name1 int,name2 int, name3 int,primary key(id));
select * from num_data;
UPDATE thankscard.num_data SET name1 =1 where id =1;
select name1 from pastdata;

create table syainmaster(id int auto_increment, syain_id int, syain_name varchar(20),primary key(id));

select * from syainmaster;
select * from rirekitable_num;
select * from rirekitable;
drop table rirekitable;

create table rirekitable(id int, syain_name1 varchar(20),syain_name2 varchar(20),syain_name3 varchar(20),primary key(id));

create table rirekitable_num(id int, syain_id1 int,syain_id2 int,syain_id3 int,primary key(id));

