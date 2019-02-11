drop table if exists noticia;
create table noticia(
	id int AUTO_INCREMENT,
	titulo varchar(2048) not null,
	texto varchar(2048) not null,
	fecha date not null,
	PRIMARY KEY (id)
);