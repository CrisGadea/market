CREATE DATABASE market_master;
use market_master;

CREATE TABLE users(
id        int(255) auto_increment not null,
name      varchar(100) not null,
surname   varchar(255),
email     varchar(255) not null,
password  varchar(255) not null,
role      varchar(20),
image     varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO users VALUES(NULL,'admin','admin','admin@admin.com','admin','admin',null);


CREATE TABLE categories(
id        int(255) auto_increment not null,
name      varchar(100) not null,
CONSTRAINT pk_categories PRIMARY KEY(id),
)ENGINE=InnoDb;

INSERT INTO categories VALUES(null, 'manga corta');
INSERT INTO categories VALUES(null, 'tirantes');
INSERT INTO categories VALUES(null, 'manga larga');
INSERT INTO categories VALUES(null, 'sudaderas');


CREATE TABLE products(
id            int(255) auto_increment not null,
categorie_id  int(255) not null,
name          varchar(100) not null,
description   text,
price         float(100,2) not null,
stock         int(255) not null,
offer		  varchar(2),
date_prod     date not null,
image         varchar(255),
CONSTRAINT pk_products PRIMARY KEY(id),
CONSTRAINT fk_product_categorie FOREIGN KEY(categorie_id) REFERENCES categories(id)
)ENGINE=InnoDb;

CREATE TABLE orders(
id            int(255) auto_increment not null,
user_id  	  int(255) not null,
province	  varchar(255) not null,
location	  varchar(100) not null,
address       varchar(255) not null,
price         float(200,2) not null,
status	      varchar(20) not null,
date_order    date,
our           time,
CONSTRAINT pk_orders PRIMARY KEY(id),
CONSTRAINT fk_order_user FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

CREATE TABLE order_lines(
id            int(255) auto_increment not null,
order_id      int(255) not null,
product_id    int(255) not null,
CONSTRAINT pk_order_lines PRIMARY KEY(id),
CONSTRAINT fk_order_line FOREIGN KEY(order_id) REFERENCES orders(id),
CONSTRAINT fk_product_line FOREIGN KEY(product_id) REFERENCES products(id)
)ENGINE=InnoDb;
