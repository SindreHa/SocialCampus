-- -----------------------------------------------------
-- procedure newCat
-- -----------------------------------------------------

DELIMITER $$
USE `application`$$
DROP PROCEDURE IF EXISTS `newCat`$$
CREATE DEFINER=`root`@`%` PROCEDURE `newCat`(
	in p_username varchar(45),
	in p_description varchar(45)
)
begin
	insert into category (username, description)
    values (p_username, p_description);
end$$
DELIMITER ;

-- -----------------------------------------------------
-- procedure newUser
-- -----------------------------------------------------

DELIMITER $$
USE `application`$$
DROP PROCEDURE IF EXISTS `newUser`$$
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `newUser`(
in p_username varchar(50),
    in p_password varchar(255),
    in p_email varchar(245)
)
begin
    insert into user (username, password, email)
    values (p_username, p_password, p_email);
end$$
DELIMITER ;

-- -----------------------------------------------------
-- procedure showCat
-- -----------------------------------------------------

DELIMITER $$
USE `application`$$
DROP PROCEDURE IF EXISTS `showCat`$$
CREATE DEFINER=`root`@`%` PROCEDURE `showCat`()
begin
	select username, description
    from category;
end$$
DELIMITER ;

-- -----------------------------------------------------
-- procedure updateProfil
-- -----------------------------------------------------

DELIMITER $$
USE `application`$$
DROP PROCEDURE `updateProfil`$$
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `updateProfil`(
    in p_id int(11),
    in p_full_name varchar(255),
    in p_picture blob
)
begin
    update user
    set full_name = p_full_name,
        picture = p_picture
    where id = p_id;
end$$
DELIMITER ;



DELIMITER $$
drop procedure IF EXISTS `deleteCommentary`$$
CREATE PROCEDURE `deleteCommentary` (
    in p_id int (11)
)
begin
    delete from commentary
    where p_id = id;
end$$
DELIMITER ;


DELIMITER $$
drop procedure IF EXISTS `deletePost`$$
CREATE PROCEDURE `deletePost` (
    in p_id int (11)
)
begin
    DELETE FROM likes WHERE post_id = p_id:
    DELETE FROM commentary WHERE post_id = p_id;
    DELETE FROM post WHERE id = p_id;
end$$
DELIMITER ;