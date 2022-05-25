--
-- Скрипт сгенерирован Devart dbForge Studio 2019 for MySQL, Версия 8.1.22.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 25.05.2022 19:21:39
-- Версия сервера: 5.7.25
-- Версия клиента: 4.1
--

-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

--
-- Удалить представление `all_user_excursion`
--
DROP VIEW IF EXISTS all_user_excursion CASCADE;

--
-- Удалить процедуру `insert_user_excursion`
--
DROP PROCEDURE IF EXISTS insert_user_excursion;

--
-- Удалить процедуру `update_user_excursion`
--
DROP PROCEDURE IF EXISTS update_user_excursion;

--
-- Удалить функцию `is_user_excursion_exist`
--
DROP FUNCTION IF EXISTS is_user_excursion_exist;

--
-- Удалить функцию `occupied_places`
--
DROP FUNCTION IF EXISTS occupied_places;

--
-- Удалить таблицу `user_excursion`
--
DROP TABLE IF EXISTS user_excursion;

--
-- Удалить представление `all_user_info`
--
DROP VIEW IF EXISTS all_user_info CASCADE;

--
-- Удалить таблицу `user`
--
DROP TABLE IF EXISTS user;

--
-- Удалить таблицу `gender`
--
DROP TABLE IF EXISTS gender;

--
-- Удалить таблицу `employee_specialization`
--
DROP TABLE IF EXISTS employee_specialization;

--
-- Удалить представление `all_admin_info`
--
DROP VIEW IF EXISTS all_admin_info CASCADE;

--
-- Удалить процедуру `all_excursion_in_location`
--
DROP PROCEDURE IF EXISTS all_excursion_in_location;

--
-- Удалить процедуру `all_users_table`
--
DROP PROCEDURE IF EXISTS all_users_table;

--
-- Удалить процедуру `delete_admin_by_admin`
--
DROP PROCEDURE IF EXISTS delete_admin_by_admin;

--
-- Удалить процедуру `delete_user_insert_admin`
--
DROP PROCEDURE IF EXISTS delete_user_insert_admin;

--
-- Удалить процедуру `edit_one_level_roles`
--
DROP PROCEDURE IF EXISTS edit_one_level_roles;

--
-- Удалить процедуру `update_registration_admin`
--
DROP PROCEDURE IF EXISTS update_registration_admin;

--
-- Удалить таблицу `employee`
--
DROP TABLE IF EXISTS employee;

--
-- Удалить представление `all_guide_excursion`
--
DROP VIEW IF EXISTS all_guide_excursion CASCADE;

--
-- Удалить процедуру `insert_excursion`
--
DROP PROCEDURE IF EXISTS insert_excursion;

--
-- Удалить таблицу `excursion`
--
DROP TABLE IF EXISTS excursion;

--
-- Удалить таблицу `level`
--
DROP TABLE IF EXISTS level;

--
-- Удалить процедуру `delete_registration_user`
--
DROP PROCEDURE IF EXISTS delete_registration_user;

--
-- Удалить процедуру `delete_user_by_admin`
--
DROP PROCEDURE IF EXISTS delete_user_by_admin;

--
-- Удалить процедуру `get_login`
--
DROP PROCEDURE IF EXISTS get_login;

--
-- Удалить процедуру `insert_registration_user`
--
DROP PROCEDURE IF EXISTS insert_registration_user;

--
-- Удалить процедуру `update_registration_user`
--
DROP PROCEDURE IF EXISTS update_registration_user;

--
-- Удалить функцию `check_user_login`
--
DROP FUNCTION IF EXISTS check_user_login;

--
-- Удалить функцию `get_role_id`
--
DROP FUNCTION IF EXISTS get_role_id;

--
-- Удалить функцию `is_login`
--
DROP FUNCTION IF EXISTS is_login;

--
-- Удалить таблицу `registration`
--
DROP TABLE IF EXISTS registration;

--
-- Удалить таблицу `role`
--
DROP TABLE IF EXISTS role;

--
-- Удалить процедуру `all_guide_excursion`
--
DROP PROCEDURE IF EXISTS all_guide_excursion;

--
-- Удалить процедуру `all_location_in_region`
--
DROP PROCEDURE IF EXISTS all_location_in_region;

--
-- Удалить процедуру `delete_location`
--
DROP PROCEDURE IF EXISTS delete_location;

--
-- Удалить процедуру `insert_location`
--
DROP PROCEDURE IF EXISTS insert_location;

--
-- Удалить процедуру `location_info`
--
DROP PROCEDURE IF EXISTS location_info;

--
-- Удалить таблицу `location`
--
DROP TABLE IF EXISTS location;

--
-- Удалить представление `all_regions`
--
DROP VIEW IF EXISTS all_regions CASCADE;

--
-- Удалить процедуру `delete_region`
--
DROP PROCEDURE IF EXISTS delete_region;

--
-- Удалить процедуру `get_region_name`
--
DROP PROCEDURE IF EXISTS get_region_name;

--
-- Удалить процедуру `insert_region`
--
DROP PROCEDURE IF EXISTS insert_region;

--
-- Удалить таблицу `region`
--
DROP TABLE IF EXISTS region;

--
-- Удалить таблицу `specialization`
--
DROP TABLE IF EXISTS specialization;

--
-- Создать таблицу `specialization`
--
CREATE TABLE specialization (
  id int(11) NOT NULL AUTO_INCREMENT,
  value varchar(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 3,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `value` для объекта типа таблица `specialization`
--
ALTER TABLE specialization
ADD UNIQUE INDEX value (value);

--
-- Создать таблицу `region`
--
CREATE TABLE region (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(150) NOT NULL,
  image varchar(500) NOT NULL,
  description varchar(600) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 8,
AVG_ROW_LENGTH = 4096,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `name` для объекта типа таблица `region`
--
ALTER TABLE region
ADD UNIQUE INDEX name (name);

DELIMITER $$

--
-- Создать процедуру `insert_region`
--
CREATE PROCEDURE insert_region (IN _name varchar(150), _image varchar(500), _description varchar(700))
BEGIN

  INSERT INTO region (name, image, description)
    VALUES (_name, _image, _description);

END
$$

--
-- Создать процедуру `get_region_name`
--
CREATE PROCEDURE get_region_name (IN _region_id int(11))
BEGIN

  SELECT
    name
  FROM region
  WHERE id = _region_id;

END
$$

--
-- Создать процедуру `delete_region`
--
CREATE PROCEDURE delete_region (IN _region_id int(11))
BEGIN

  DELETE
    FROM region
  WHERE id = _region_id;

END
$$

DELIMITER ;

--
-- Создать представление `all_regions`
--
CREATE
VIEW all_regions
AS
SELECT
  `region`.`id` AS `id`,
  `region`.`name` AS `name`,
  `region`.`image` AS `image`,
  `region`.`description` AS `description`
FROM `region`;

--
-- Создать таблицу `location`
--
CREATE TABLE location (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  region_id int(11) DEFAULT NULL,
  specialization_id int(11) NOT NULL,
  image varchar(500) NOT NULL,
  description varchar(8000) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 27,
AVG_ROW_LENGTH = 1820,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `name` для объекта типа таблица `location`
--
ALTER TABLE location
ADD UNIQUE INDEX name (name);

--
-- Создать внешний ключ
--
ALTER TABLE location
ADD CONSTRAINT FK_location_region_id FOREIGN KEY (region_id)
REFERENCES region (id) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Создать внешний ключ
--
ALTER TABLE location
ADD CONSTRAINT FK_location_specialization_id FOREIGN KEY (specialization_id)
REFERENCES specialization (id) ON DELETE NO ACTION ON UPDATE CASCADE;

DELIMITER $$

--
-- Создать процедуру `location_info`
--
CREATE PROCEDURE location_info (IN _location_id int(11))
BEGIN

  SELECT
    l.id,
    l.name,
    l.region_id,
    l.specialization_id,
    l.image,
    l.description,
    s.value specialization_value
  FROM location l
    JOIN specialization s
      ON l.specialization_id = s.id
  WHERE l.id = _location_id;

END
$$

--
-- Создать процедуру `insert_location`
--
CREATE PROCEDURE insert_location (IN _region_id int(11), _name varchar(150), _image varchar(500), _description varchar(700), _specialization_id int(11))
BEGIN

  INSERT INTO location (region_id, name, image, description, specialization_id)
    VALUES (_region_id, _name, _image, _description, _specialization_id);

END
$$

--
-- Создать процедуру `delete_location`
--
CREATE PROCEDURE delete_location (IN _location_id int(11))
BEGIN

  DELETE
    FROM location
  WHERE id = _location_id;

END
$$

--
-- Создать процедуру `all_location_in_region`
--
CREATE PROCEDURE all_location_in_region (IN _region_id int(11))
BEGIN

  SELECT
    l.id id,
    l.name name,
    l.specialization_id specialization_id,
    l.image image,
    l.description description,
    s.value specialization_value
  FROM location l
    JOIN specialization s
      ON (l.specialization_id = s.id)
  WHERE region_id = _region_id;

END
$$

--
-- Создать процедуру `all_guide_excursion`
--
CREATE PROCEDURE all_guide_excursion (IN _guide_id int(11))
BEGIN


  SELECT
    e.id excursion_id,
    e.location_id,
    l.name location_name,
    e.date
  FROM excursion e
    LEFT JOIN location l
      ON (e.location_id = l.id)
  WHERE e.guide_id = _guide_id
  ORDER BY e.date;

END
$$

DELIMITER ;

--
-- Создать таблицу `role`
--
CREATE TABLE role (
  id int(11) NOT NULL AUTO_INCREMENT,
  value varchar(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `value` для объекта типа таблица `role`
--
ALTER TABLE role
ADD UNIQUE INDEX value (value);

--
-- Создать таблицу `registration`
--
CREATE TABLE registration (
  id int(11) NOT NULL AUTO_INCREMENT,
  login varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  role_id int(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 49,
AVG_ROW_LENGTH = 1638,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `login` для объекта типа таблица `registration`
--
ALTER TABLE registration
ADD UNIQUE INDEX login (login);

--
-- Создать внешний ключ
--
ALTER TABLE registration
ADD CONSTRAINT FK_registration_role_id FOREIGN KEY (role_id)
REFERENCES role (id) ON DELETE NO ACTION ON UPDATE CASCADE;

DELIMITER $$

--
-- Создать функцию `is_login`
--
CREATE FUNCTION is_login (_login varchar(255))
RETURNS int(11)
BEGIN
  DECLARE is_exist int;
  SELECT
    COUNT(*) INTO is_exist
  FROM registration
  WHERE (login = _login);
  RETURN is_exist;
END
$$

--
-- Создать функцию `get_role_id`
--
CREATE FUNCTION get_role_id (_login varchar(255))
RETURNS int(11)
BEGIN
  DECLARE _role_id int;
  SELECT
    role_id INTO _role_id
  FROM registration
  WHERE (login = _login);
  RETURN _role_id;
END
$$

--
-- Создать функцию `check_user_login`
--
CREATE FUNCTION check_user_login (_login varchar(255), _password varchar(255))
RETURNS int(11)
BEGIN
  DECLARE is_exist int;
  SELECT
    COUNT(*) INTO is_exist
  FROM registration
  WHERE (login = _login)
  AND (password = _password);
  RETURN is_exist;
END
$$

--
-- Создать процедуру `update_registration_user`
--
CREATE PROCEDURE update_registration_user (IN
_login varchar(255),
_new_login varchar(255),
_last_name varchar(255),
_first_name varchar(255),
_level_id int(11),
_gender_id int(11),
_age int(11),
_phone varchar(255),
_avatar varchar(500))
BEGIN

  DECLARE _registration_id int;

  SELECT
    id INTO _registration_id
  FROM registration
  WHERE (login = _login);

  UPDATE registration
  SET login = _new_login
  WHERE (id = _registration_id);

  UPDATE user
  SET last_name = _last_name,
      first_name = _first_name,
      level_id = _level_id,
      gender_id = _gender_id,
      age = _age,
      phone = _phone,
      avatar = _avatar
  WHERE (registration_id = _registration_id);


END
$$

--
-- Создать процедуру `insert_registration_user`
--
CREATE PROCEDURE insert_registration_user (IN
_login varchar(255),
_password varchar(255),
_role_id int(11),
_last_name varchar(255),
_first_name varchar(255),
_level_id int(11),
_gender_id int(11),
_age int(11),
_phone varchar(255),
_avatar varchar(500))
BEGIN

  DECLARE _registration_id int;

  INSERT INTO registration (login, password, role_id)
    VALUES (_login, _password, _role_id);

  SELECT
    id INTO _registration_id
  FROM registration
  WHERE (login = _login);

  INSERT INTO user (registration_id, last_name, first_name, level_id, gender_id, age, phone, avatar)
    VALUES (_registration_id, _last_name, _first_name, _level_id, _gender_id, _age, _phone, _avatar);
END
$$

--
-- Создать процедуру `get_login`
--
CREATE PROCEDURE get_login (IN _registration_id int(11))
BEGIN

  SELECT
    login
  FROM registration
  WHERE (id = _registration_id);

END
$$

--
-- Создать процедуру `delete_user_by_admin`
--
CREATE PROCEDURE delete_user_by_admin (IN _registration_id int(11))
BEGIN

  DELETE
    FROM user
  WHERE (registration_id = _registration_id);
  DELETE
    FROM registration
  WHERE (id = _registration_id);

END
$$

--
-- Создать процедуру `delete_registration_user`
--
CREATE PROCEDURE delete_registration_user (IN _login varchar(255))
BEGIN
  DECLARE _registration_id int;

  SELECT
    id INTO _registration_id
  FROM registration
  WHERE (login = _login);
  DELETE
    FROM user
  WHERE (registration_id = _registration_id);
  DELETE
    FROM registration
  WHERE (id = _registration_id);

END
$$

DELIMITER ;

--
-- Создать таблицу `level`
--
CREATE TABLE level (
  id int(11) NOT NULL AUTO_INCREMENT,
  value varchar(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `value` для объекта типа таблица `level`
--
ALTER TABLE level
ADD UNIQUE INDEX value (value);

--
-- Создать таблицу `excursion`
--
CREATE TABLE excursion (
  id int(11) NOT NULL AUTO_INCREMENT,
  location_id int(11) DEFAULT NULL,
  level_id int(11) NOT NULL,
  price int(11) NOT NULL,
  guide_id int(11) NOT NULL,
  date datetime NOT NULL,
  comment varchar(400) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 20,
AVG_ROW_LENGTH = 2048,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `UK_excursion` для объекта типа таблица `excursion`
--
ALTER TABLE excursion
ADD UNIQUE INDEX UK_excursion (guide_id, date);

--
-- Создать внешний ключ
--
ALTER TABLE excursion
ADD CONSTRAINT FK_excursion_level_id FOREIGN KEY (level_id)
REFERENCES level (id) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Создать внешний ключ
--
ALTER TABLE excursion
ADD CONSTRAINT FK_excursion_location_id FOREIGN KEY (location_id)
REFERENCES location (id) ON DELETE SET NULL ON UPDATE CASCADE;

DELIMITER $$

--
-- Создать процедуру `insert_excursion`
--
CREATE PROCEDURE insert_excursion (IN _location_id int(11), _level_id int(11), _date datetime, _guide_id int(11), _comment varchar(400), _price int(11))
BEGIN

  INSERT INTO excursion (location_id, level_id, date, guide_id, comment, price)
    VALUES (_location_id, _level_id, _date, _guide_id, _comment, _price);

END
$$

DELIMITER ;

--
-- Создать представление `all_guide_excursion`
--
CREATE
VIEW all_guide_excursion
AS
SELECT
  `excursion`.`date` AS `date`,
  `location`.`name` AS `location_name`,
  `excursion`.`guide_id` AS `guide_id`,
  `location`.`id` AS `location_id`,
  `excursion`.`id` AS `excursion_id`
FROM (`excursion`
  LEFT JOIN `location`
    ON ((`excursion`.`location_id` = `location`.`id`)))
ORDER BY `excursion`.`date`;

--
-- Создать таблицу `employee`
--
CREATE TABLE employee (
  id int(11) NOT NULL AUTO_INCREMENT,
  registration_id int(11) NOT NULL,
  first_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  patronymic varchar(255) DEFAULT NULL,
  passport varchar(255) DEFAULT NULL,
  phone varchar(255) NOT NULL,
  level_id int(11) NOT NULL,
  avatar varchar(500) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 9,
AVG_ROW_LENGTH = 4096,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `passport` для объекта типа таблица `employee`
--
ALTER TABLE employee
ADD UNIQUE INDEX passport (passport);

--
-- Создать индекс `phone` для объекта типа таблица `employee`
--
ALTER TABLE employee
ADD UNIQUE INDEX phone (phone);

--
-- Создать внешний ключ
--
ALTER TABLE employee
ADD CONSTRAINT FK_employee_level_id FOREIGN KEY (level_id)
REFERENCES level (id) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Создать внешний ключ
--
ALTER TABLE employee
ADD CONSTRAINT FK_employee_registration_id FOREIGN KEY (registration_id)
REFERENCES registration (id) ON DELETE NO ACTION ON UPDATE CASCADE;

DELIMITER $$

--
-- Создать процедуру `update_registration_admin`
--
CREATE PROCEDURE update_registration_admin (IN
_login varchar(255),
_new_login varchar(255),
_last_name varchar(255),
_first_name varchar(255),
_patronymic varchar(255),
_level_id int(11),
_passport varchar(255),
_phone varchar(255),
_avatar varchar(500))
BEGIN
  DECLARE _registration_id int;

  SELECT
    id INTO _registration_id
  FROM registration
  WHERE (login = _login);

  UPDATE registration
  SET login = _new_login
  WHERE (id = _registration_id);

  UPDATE employee
  SET last_name = _last_name,
      first_name = _first_name,
      patronymic = IF(_patronymic = '', NULL, _patronymic),
      passport = IF(_passport = '', NULL, _passport),
      level_id = _level_id,
      phone = _phone,
      avatar = _avatar
  WHERE (registration_id = _registration_id);
END
$$

--
-- Создать процедуру `edit_one_level_roles`
--
CREATE PROCEDURE edit_one_level_roles (IN _registration_id int(11), _new_role_id int(11), _avatar varchar(500))
BEGIN

  UPDATE registration
  SET role_id = _new_role_id
  WHERE (id = _registration_id);
  UPDATE employee
  SET avatar = _avatar
  WHERE (registration_id = _registration_id);

END
$$

--
-- Создать процедуру `delete_user_insert_admin`
--
CREATE PROCEDURE delete_user_insert_admin (IN _registration_id int(11), _new_role_id int(11), _avatar varchar(255))
BEGIN

  INSERT INTO employee (registration_id, last_name, first_name, patronymic, level_id, phone, passport, avatar)
    SELECT
      registration_id,
      last_name,
      first_name,
      NULL,
      level_id,
      phone,
      NULL,
      _avatar
    FROM user
    WHERE registration_id = _registration_id;

  UPDATE registration
  SET role_id = _new_role_id
  WHERE ID = _registration_id;

  DELETE
    FROM user
  WHERE registration_id = _registration_id;

END
$$

--
-- Создать процедуру `delete_admin_by_admin`
--
CREATE PROCEDURE delete_admin_by_admin (IN _registration_id int(11))
BEGIN

  DELETE
    FROM employee
  WHERE (registration_id = _registration_id);
  DELETE
    FROM registration
  WHERE (id = _registration_id);

END
$$

--
-- Создать процедуру `all_users_table`
--
CREATE PROCEDURE all_users_table (IN _admin_login varchar(255))
BEGIN

  SELECT
    r.id registration_id,
    r.role_id role_id,
    role.value role,
    r.login email,
    IF(r.role_id = 3, u.last_name, e.last_name) last_name,
    IF(r.role_id = 3, u.first_name, e.first_name) first_name,
    IF(e.patronymic = '', NULL, e.patronymic) patronymic,
    IF(r.role_id = 3, u.phone, e.phone) phone,
    IF(e.passport = '', NULL, e.passport) passport,
    IF(r.role_id = 3, u.level_id, e.level_id) level_id,
    IF(r.role_id = 3, l_u.value, l_e.value) level,
    IF(r.role_id = 3, u.avatar, e.avatar) avatar
  FROM registration r
    LEFT JOIN user u
      ON (r.id = u.registration_id)
    LEFT JOIN employee e
      ON (r.id = e.registration_id)
    LEFT JOIN level l_u
      ON u.level_id = l_u.id
    LEFT JOIN level l_e
      ON e.level_id = l_e.id
    LEFT JOIN role
      ON r.role_id = role.id
  WHERE (r.login != _admin_login);

END
$$

--
-- Создать процедуру `all_excursion_in_location`
--
CREATE PROCEDURE all_excursion_in_location (IN _location_id int(11))
BEGIN

  SELECT
    ex.id excursion_id,
    ex.location_id,
    ex.level_id,
    ex.guide_id,
    ex.price,
    ex.date,
    em.first_name,
    em.last_name,
    em.patronymic,
    em.avatar,
    l.value level_value,
    ex.comment
  FROM excursion ex
    JOIN employee em
      ON ex.guide_id = em.id
    JOIN level l
      ON ex.level_id = l.id
  WHERE ex.location_id = _location_id
  ORDER BY ex.date;

END
$$

DELIMITER ;

--
-- Создать представление `all_admin_info`
--
CREATE
VIEW all_admin_info
AS
SELECT
  `employee`.`first_name` AS `first_name`,
  `employee`.`last_name` AS `last_name`,
  `employee`.`patronymic` AS `patronymic`,
  `employee`.`level_id` AS `level_id`,
  `level`.`value` AS `level_value`,
  `registration`.`login` AS `login`,
  `employee`.`passport` AS `passport`,
  `employee`.`phone` AS `phone`,
  `employee`.`avatar` AS `avatar`,
  `registration`.`role_id` AS `role_id`,
  `role`.`value` AS `role_value`,
  `registration`.`id` AS `registration_id`,
  `employee`.`id` AS `admin_id`
FROM (((`employee`
  JOIN `level`
    ON ((`employee`.`level_id` = `level`.`id`)))
  JOIN `registration`
    ON ((`employee`.`registration_id` = `registration`.`id`)))
  JOIN `role`
    ON ((`registration`.`role_id` = `role`.`id`)));

--
-- Создать таблицу `employee_specialization`
--
CREATE TABLE employee_specialization (
  id int(11) NOT NULL AUTO_INCREMENT,
  employee_id int(11) NOT NULL,
  specialization_id int(11) NOT NULL,
  salary int(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `UK_employee_specialization` для объекта типа таблица `employee_specialization`
--
ALTER TABLE employee_specialization
ADD UNIQUE INDEX UK_employee_specialization (employee_id, specialization_id);

--
-- Создать внешний ключ
--
ALTER TABLE employee_specialization
ADD CONSTRAINT FK_employee_specialization_employee_id FOREIGN KEY (employee_id)
REFERENCES employee (id) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Создать внешний ключ
--
ALTER TABLE employee_specialization
ADD CONSTRAINT FK_employee_specialization_specialization_id FOREIGN KEY (specialization_id)
REFERENCES specialization (id) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Создать таблицу `gender`
--
CREATE TABLE gender (
  id int(11) NOT NULL AUTO_INCREMENT,
  value varchar(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 3,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `value` для объекта типа таблица `gender`
--
ALTER TABLE gender
ADD UNIQUE INDEX value (value);

--
-- Создать таблицу `user`
--
CREATE TABLE user (
  id int(11) NOT NULL AUTO_INCREMENT,
  registration_id int(11) NOT NULL,
  last_name varchar(255) NOT NULL,
  first_name varchar(255) NOT NULL,
  level_id int(11) NOT NULL,
  gender_id int(11) NOT NULL,
  age int(11) DEFAULT NULL,
  phone varchar(255) NOT NULL,
  avatar varchar(500) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 9,
AVG_ROW_LENGTH = 3276,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать внешний ключ
--
ALTER TABLE user
ADD CONSTRAINT FK_user_gender_id FOREIGN KEY (gender_id)
REFERENCES gender (id) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Создать внешний ключ
--
ALTER TABLE user
ADD CONSTRAINT FK_user_level_id FOREIGN KEY (level_id)
REFERENCES level (id) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Создать внешний ключ
--
ALTER TABLE user
ADD CONSTRAINT FK_user_registration_id FOREIGN KEY (registration_id)
REFERENCES registration (id) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Создать представление `all_user_info`
--
CREATE
VIEW all_user_info
AS
SELECT
  `user`.`last_name` AS `last_name`,
  `user`.`first_name` AS `first_name`,
  `user`.`age` AS `age`,
  `user`.`gender_id` AS `gender_id`,
  `gender`.`value` AS `gender_value`,
  `user`.`level_id` AS `level_id`,
  `level`.`value` AS `level_value`,
  `registration`.`login` AS `login`,
  `user`.`phone` AS `phone`,
  `user`.`avatar` AS `avatar`,
  `registration`.`role_id` AS `role_id`,
  `role`.`value` AS `role_value`,
  `registration`.`id` AS `registration_id`,
  `user`.`id` AS `user_id`
FROM ((((`user`
  JOIN `registration`
    ON ((`user`.`registration_id` = `registration`.`id`)))
  JOIN `level`
    ON ((`user`.`level_id` = `level`.`id`)))
  JOIN `gender`
    ON ((`user`.`gender_id` = `gender`.`id`)))
  JOIN `role`
    ON ((`registration`.`role_id` = `role`.`id`)));

--
-- Создать таблицу `user_excursion`
--
CREATE TABLE user_excursion (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  excursion_id int(11) NOT NULL,
  user_count int(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 10,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `UK_user_excursion` для объекта типа таблица `user_excursion`
--
ALTER TABLE user_excursion
ADD UNIQUE INDEX UK_user_excursion (excursion_id, user_id);

--
-- Создать внешний ключ
--
ALTER TABLE user_excursion
ADD CONSTRAINT FK_user_excursion_excursion_id FOREIGN KEY (excursion_id)
REFERENCES excursion (id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Создать внешний ключ
--
ALTER TABLE user_excursion
ADD CONSTRAINT FK_user_excursion_user_id FOREIGN KEY (user_id)
REFERENCES user (id) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$

--
-- Создать функцию `occupied_places`
--
CREATE FUNCTION occupied_places (_excursion_id int(11))
RETURNS int(11)
BEGIN

  DECLARE _count_places int;
  SELECT
    IF(SUM(ue.user_count) IS NULL, 0, SUM(ue.user_count)) INTO _count_places
  FROM user_excursion ue
  WHERE ue.excursion_id = _excursion_id;
  RETURN _count_places;

END
$$

--
-- Создать функцию `is_user_excursion_exist`
--
CREATE FUNCTION is_user_excursion_exist (_user_id int(11), _excursion_id int(11))
RETURNS int(11)
BEGIN

  DECLARE _user_exist int;
  SELECT
    COUNT(user_id) INTO _user_exist
  FROM user_excursion ue
  WHERE (ue.user_id = _user_id
  AND ue.excursion_id = _excursion_id);
  RETURN _user_exist;

END
$$

--
-- Создать процедуру `update_user_excursion`
--
CREATE PROCEDURE update_user_excursion (IN _user_id int(11), _excursion_id int(11), _user_count int(11))
BEGIN

  UPDATE user_excursion
  SET user_count = _user_count
  WHERE (user_id = _user_id
  AND excursion_id = _excursion_id);

END
$$

--
-- Создать процедуру `insert_user_excursion`
--
CREATE PROCEDURE insert_user_excursion (IN _user_id int(11), _excursion_id int(11), _user_count int(11))
BEGIN

  INSERT INTO user_excursion (user_id, excursion_id, user_count)
    VALUES (_user_id, _excursion_id, _user_count);

END
$$

DELIMITER ;

--
-- Создать представление `all_user_excursion`
--
CREATE
VIEW all_user_excursion
AS
SELECT
  `user_excursion`.`user_id` AS `user_id`,
  `user_excursion`.`id` AS `user_excursion_id`,
  `excursion`.`id` AS `excursion_id`,
  `location`.`name` AS `location_name`,
  `location`.`id` AS `location_id`,
  `excursion`.`guide_id` AS `guide_id`,
  `excursion`.`date` AS `date`,
  `user_excursion`.`user_count` AS `user_count`
FROM ((`user_excursion`
  LEFT JOIN `excursion`
    ON ((`user_excursion`.`excursion_id` = `excursion`.`id`)))
  LEFT JOIN `location`
    ON ((`excursion`.`location_id` = `location`.`id`)));

-- 
-- Вывод данных для таблицы specialization
--
INSERT INTO specialization VALUES
(1, 'Городская'),
(2, 'Пригородная');

-- 
-- Вывод данных для таблицы region
--
INSERT INTO region VALUES
(1, 'Москва', 'uploads/moscow.png', 'Москва — столица и крупнейший город России. Сюда ведут многие пути и человеческие судьбы, с этим городом связано множество роковых и знаменательных событий истории, людских радостей и надежд, несчастий и разочарований и, разумеется, легенд, мифов и преданий. Москва — блистательный город, во всех отношениях достойный называться столицей. Здесь великолепные памятники архитектуры и живописные парки, самые лучшие магазины и высокие небоскребы, длинное метро и заполненные вокзалы. Москва никогда не спит, здесь трудятся с утра до поздней ночи, а затем веселятся до утра.'),
(2, 'Санкт-Петербург', 'uploads/spb.jpg', 'Санкт-Петербург – это настоящий рай для туриста, город, весь исторический центр которого включен в список Всемирного наследия ЮНЕСКО. Петербург – это такая же сокровищница мировой культуры, как Рим, Париж или Венеция… Его и называют «Северной Венецией», потому что город расположен на 42 островах, разделенных реками, каналами и протоками. В Петербурге около 580 мостов, 20 из которых – разводные, а такого количества музеев, памятников архитектуры и театров мало где можно найти.'),
(5, 'Республика Алтай', 'uploads/25.05.2022_03-12-51_pereval-chike-taman.jpg', 'Алтай называют «русской Швейцарией». Белоснежные шапки высоких гор, прозрачные озера, бурлящие водопады и широкие луга. Будто вы оказались в Альпах. Только это — наша Сибирь, куда не надо оформлять визу, как на европейские курорты, а природа потрясает не меньше. Здесь вы вдохнете свежий воздух, и то ли от него, то ли от окружающей красоты немного закружится голова.'),
(7, 'Ленинградская область', 'uploads/25.05.2022_03-19-02_466d84e0304e33bd2d97732e020c2e97.jpg', 'В Ленинградской области красивая природа. За пределами городов и сел находятся сосновые леса, речки, озера и Финский залив. Чтобы их увидеть, не обязательно идти в долгий поход, надевать резиновые сапоги и брать с собой спички, соль и котелок. В области есть маркированные эко-маршруты, по которым можно гулять весь день, а вечером вернуться домой. ');

-- 
-- Вывод данных для таблицы role
--
INSERT INTO role VALUES
(1, 'Администратор'),
(2, 'Гид'),
(3, 'Пользователь');

-- 
-- Вывод данных для таблицы gender
--
INSERT INTO gender VALUES
(2, 'Женский'),
(1, 'Мужской');

-- 
-- Вывод данных для таблицы location
--
INSERT INTO location VALUES
(18, 'Московский Кремль', 1, 1, 'uploads/25.05.2022_03-21-29_893w7b7qx0wskksw0kk0k0408.jpg', 'Московский Кремль — крепость в центре Москвы и древнейшая её часть, главный общественно-политический и историко-художественный комплекс города, официальная резиденция Президента Российской Федерации, вплоть до распада СССР в декабре 1991 года была официальной резиденцией Генерального секретаря ЦК КПСС.'),
(19, 'Государственная Третьяковская галерея', 1, 1, 'uploads/25.05.2022_03-22-43_755901329304668.jpg', 'Государственная Третьяковская галерея — московский художественный музей, основанный в 1856 году купцом Павлом Третьяковым. В 1867-м галерея была открыта для посещения, а в 1892 году передана в собственность Москве.'),
(20, 'Государственный Эрмитаж', 2, 1, 'uploads/25.05.2022_03-23-26_ert-minlkhbwpo.jpg', '«Государственный Эрмитаж» — музей изобразительного и декоративно-прикладного искусства, расположенный в городе Санкт-Петербурге Российской Федерации. Основан 7 декабря 1764 года. Является одним из крупнейших художественных музеев в мире.'),
(21, 'Кунсткамера', 2, 1, 'uploads/25.05.2022_03-26-18_kunstkamera.jpg', 'Кунсткамера — первый музей в России, учреждённый императором Петром I в Санкт-Петербурге. Обладает уникальной коллекцией предметов старины, раскрывающих историю и быт многих народов. Но многим этот музей известен своей «особенной» коллекцией анатомических редкостей и аномалий.'),
(22, 'Тайны древнего Алтая', 5, 2, 'uploads/25.05.2022_03-28-26_6210492_xlarge.jpg', 'Активно-познавательная экскурсия в горном Алтае «Тайны древнего Алтая» стартует с Чуйского тракта до поселка Усть-Сема, оттуда туристы на автобусе добираются до села Чемал и направляются в район села Еланда.\r\nМаксимально интересной и в то же время первой точкой маршрута станет водопад тысячи душ – так местное население именует ущелье Арья-Ярык. '),
(23, 'Каракольские озера', 5, 2, 'uploads/25.05.2022_03-29-20_Depositphotos_1596786_original.jpg', 'Если на возможность окунуться в удивительный мир Алтая у вас есть всего пара дней – делайте ставки на экскурсию на Каракольские озера. Оригинальный маршрут не только удивит своими красотами, но и позволит ощутить себя настоящим туристом, поскольку дорога будет действительно непростой.'),
(24, 'Конная экскурсия «Путь стрелы Сартакпая»', 5, 2, 'uploads/25.05.2022_03-30-41_put-strely-sartakpaja-thumbnail.jpg', 'Семичасовая конная экскурсия на Алтае с красивым названием «Путь стрелы Сартакпая» удивит даже самых искушенных туристов. Она актуальна круглый год для групп от 4-х человек, экскурсия проходит следующему маршруту: Аюлинский перевал – родник Идып – каменные ванны – переправа на катере'),
(25, 'Выборг', 7, 1, 'uploads/25.05.2022_03-32-13_XXXL.jpg', 'Выборг — город в России, административный центр Выборгского муниципального района Ленинградской области. Образует Выборгское городское поселение как единственный населённый пункт в его составе. Город расположен на берегу Выборгского залива, находящегося в северо-восточной части Финского залива.'),
(26, 'Гатчина', 7, 1, 'uploads/25.05.2022_03-39-22_photo9jpg.jpg', 'Гатчина — город в России, административный центр Гатчинского муниципального района Ленинградской области. Город воинской славы России. Находится в юго-западной части области, в 42 км от центра Санкт-Петербурга.');

-- 
-- Вывод данных для таблицы registration
--
INSERT INTO registration VALUES
(31, 'admin@mail.ru', '123', 1),
(37, 'misha@gmail.com', '123', 2),
(38, 'nosov@mail.ru', '123', 2),
(39, 'spectrumrrr@gmail.com', '123', 1),
(40, 'borisova@mail.ru', '123', 3),
(41, 'petrov@mail.ru', '123', 3),
(42, 'zaharova@mail.ru', '123', 2),
(45, 'Val.guru@mail.ru', '123', 3);

-- 
-- Вывод данных для таблицы level
--
INSERT INTO level VALUES
(2, 'Любитель'),
(1, 'Новичок'),
(3, 'Профессионал');

-- 
-- Вывод данных для таблицы user
--
INSERT INTO user VALUES
(1, 40, 'Борисова', 'Елена', 2, 2, 36, '26348', 'img/user_female.png'),
(2, 41, 'Петров', 'Иван', 2, 1, NULL, '254677', 'img/user_male.png'),
(5, 45, 'Гурина', 'Валентина', 3, 2, 20, '89221243851', 'img/user_female.png');

-- 
-- Вывод данных для таблицы excursion
--
INSERT INTO excursion VALUES
(12, 18, 1, 300, 8, '2022-05-28 12:00:00', 'Встречается у главных ворот. Убедительная просьба не опаздывать.'),
(13, 18, 2, 450, 8, '2022-06-08 14:45:00', 'Прошу приходить за 10 минут до начала.'),
(14, 22, 3, 4000, 8, '2022-06-02 06:30:00', 'Экскурсия достаточно продолжительная, собираемся пораньше'),
(15, 24, 2, 2500, 8, '2022-07-20 14:45:00', 'Вся экскурсия проходит на лошадях'),
(16, 18, 1, 370, 5, '2022-06-08 11:45:00', 'Будет интересно, приходите:)'),
(17, 20, 1, 300, 5, '2022-06-10 07:50:00', 'Очень рекомендую посетить Эрмитаж тем, кто там ни разу не был. Не пожалеете'),
(18, 23, 2, 750, 5, '2022-05-27 17:00:00', 'Встретим закат в самом живописном месте'),
(19, 24, 3, 1700, 5, '2022-06-03 10:10:00', 'Одна из моих любимых экскурсий! Всем рекомендую!');

-- 
-- Вывод данных для таблицы employee
--
INSERT INTO employee VALUES
(1, 31, 'Василий', 'Главный', 'Петрович', NULL, '3567', 3, 'uploads/22.05.2022_17-03-06_iStock-918704584-1.jpg'),
(5, 38, 'Константин', 'Носов', NULL, NULL, '6000', 2, 'img/guide.png'),
(6, 39, 'Ольга', 'Федорова', 'Михайловна', '324536', '40000', 2, 'img/admin.png'),
(7, 37, 'Михаил', 'Прокопиев', NULL, NULL, '90000', 1, 'img/guide.png'),
(8, 42, 'Алена', 'Захарова', 'Викторовна', NULL, '26474', 1, 'uploads/22.05.2022_16-52-54_7e0c9f945603c2eb5c1c8a82646b6c28.jpg');

-- 
-- Вывод данных для таблицы user_excursion
--
INSERT INTO user_excursion VALUES
(6, 5, 17, 2),
(7, 5, 15, 4),
(8, 5, 13, 1);

-- 
-- Вывод данных для таблицы employee_specialization
--
-- Таблица web_project.employee_specialization не содержит данных

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;