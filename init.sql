CREATE TABLE users (
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username varchar(50),
    password text,
    role_id int(11),
    created_at datetime,
    updated_at datetime
);

CREATE INDEX users_id_idx ON users (id);
CREATE INDEX users_role_id_idx ON users (role_id);

CREATE TABLE role (
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50),
    created_at datetime,
    updated_at datetime
);

CREATE INDEX role_id_idx ON role (id);

CREATE TABLE template (
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(100),
	path text,
	song text,
    created_at datetime,
    updated_at datetime
);

CREATE TABLE customer (
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    u_key varchar(10),
    name varchar(255),
    user_id int(11),
    template_id int(11),
    created_at datetime,
    updated_at datetime
);

CREATE INDEX customer_id_idx ON customer (id);
CREATE INDEX customer_user_id_idx ON customer (user_id);
CREATE INDEX template_id_idx ON customer (template_id);

CREATE TABLE wedding (
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    customer_id int(11),
    bride_w json,
    bride_m json,
    events json,
	event_date datetime,
	event_end datetime,
    created_at datetime,
    updated_at datetime
);

CREATE INDEX wedding_id_idx ON wedding (id);
CREATE INDEX wedding_customer_id ON wedding (customer_id);

CREATE TABLE recipient (
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	r_key varchar(10),
    customer_id int(11),
    name varchar(255),
    phone varchar(20),
    created_at datetime,
    updated_at datetime
);

CREATE INDEX recipient_id_idx ON recipient (id);
CREATE INDEX recipient_customer_id_idx ON recipient (customer_id);

CREATE TABLE absent (
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    recipient_id int(11),
    status tinyint(1),
	total_person tinyint(1),
    created_at datetime,
    updated_at datetime
);

CREATE INDEX absent_id_idx ON absent (id);
CREATE INDEX absent_recipient_id_idx ON absent (recipient_id);

CREATE TABLE comment (
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	customer_id int(11),
    recipient_id int(11),
    comment_text text,
    created_at datetime
);

CREATE INDEX comment_id_idx ON comment (id);
CREATE INDEX comment_recipient_id_idx ON comment (recipient_id);

INSERT INTO role (name, created_at, updated_at) 
VALUES
('Administrator', NOW(), NOW()),
('Customer', NOW(), NOW());

INSERT INTO users (username, password, role_id, created_at, updated_at)
VALUES
('admin', MD5(MD5('sayaadmin')), 1, NOW(), NOW());

INSERT INTO users (username, password, role_id, created_at, updated_at)
VALUES
('tikadansatria', MD5(MD5('customer123')), 1, NOW(), NOW());

INSERT INTO template (name, path, song, created_at, updated_at)
VALUES
('Template 1', 'template/template-1', 'Beautiful-In-White-Sha-auda.mp3', NOW(), NOW());

INSERT INTO customer (name, u_key, user_id, template_id, created_at, updated_at)
VALUES
('Tika & Satria', LEFT(MD5(RAND()), 8), 2, 1, NOW(), NOW());

INSERT INTO wedding (customer_id, event_date, event_to, created_at, updated_at)
VALUES 
(1, '2021-12-19 11:00:00', '2021-12-19 13:00:00', NOW(), NOW());

INSERT INTO recipient (customer_id, r_key, name, phone, created_at, updated_at)
VALUES
(1, LEFT(MD5(RAND()), 6), 'Regina Ayutiara Anmar', '+6281331326173', NOW(), NOW());

/*
{
	"fullname" : "Tasia Wardantika",
	"nickname" : "Tika",
	"ig" : "tikatasia",
	"parent" : "Bapak Warsito dan Ibu Atik Kusmiati"
}

{
	"fullname" : "Amanda Budi Ksatria",
	"nickname" : "Satria",
	"ig": "amandaksatria",
	"parent": "Bapak Budiarjo (Alm) dan Ibu Ninik Mursini"
}

{
	"akad" : {
        "day" : "Ahad",
        "date" : "2021-12-19",
        "time" : "09:00 - selesai",
        "place" : "Notosuman Restaurant",
        "address" : "Jl. Raya Ngawi - Solo No.Km4, Gemarang Timur, Watualang, Kec. Ngawi, Kabupaten Ngawi, Jawa Timur 63218",
        "loc": "https://www.google.co.id/maps/place/Notosuman+Restaurant/@-7.4031099,111.4112886,17z/"
    },
	"resepsi" : {
        "day" : "Ahad",
        "date" : "2021-12-19",
        "time" : "09:00 - selesai",
        "place" : "Notosuman Restaurant",
        "address" : "Jl. Raya Ngawi - Solo No.Km4, Gemarang Timur, Watualang, Kec. Ngawi, Kabupaten Ngawi, Jawa Timur 63218",
        "loc": "https://www.google.co.id/maps/place/Notosuman+Restaurant/@-7.4031099,111.4112886,17z/"
    }
}
*/



