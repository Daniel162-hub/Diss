create table ticket(
    id int auto_increment primary key,
    username varchar(30),
	password varchar(100),
	email varchar(100),
	requestType varchar (15),
	request varchar (100)
    );