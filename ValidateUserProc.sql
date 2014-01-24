USE tk;
drop procedure if exists tk.ValidateUser;

/*DROP PROCEDURE ValidateUser;*/

DELIMITER $$
USE tk$$
CREATE PROCEDURE ValidateUser (
   in p_username varchar(50),
   in p_password varchar(50),
   out p_validUser int(11))
begin


  SELECT COUNT(*)
  FROM users
  WHERE username = p_username
    AND password = p_password
   INTO p_validUser;

end $$
DELIMITER;
