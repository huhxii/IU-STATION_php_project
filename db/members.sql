create table members(
    num int not null auto_increase,
    id char(15) not null,
    password char(25) not null,
    name char(15) not null,
    nick char(30) not null,
    email char(50),
    regist_day char(20),
    level int,
    primary key(num)
);