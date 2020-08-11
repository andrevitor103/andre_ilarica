
CREATE TABLE usuarios(
id int not null primary key auto_increment,
email varchar(100) not null,
senha varchar(32) not null,
permissoes text
)
;