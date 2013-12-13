############################################
#
#	Create a database and tables:
#	
#
#
############################################


CREATE DATABASE bond;
USE bond;

CREATE TABLE agent (
user_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
username VARCHAR(120) NOT NULL,
first_name VARCHAR(40) NOT NULL,
last_name VARCHAR(80) NOT NULL,
email VARCHAR(120) NOT NULL, 
pass VARCHAR(40) NOT NULL,
PRIMARY KEY (user_id)
);

###################################################
#
#
#	Create user for this database
#		limit privillages to:
#		SELECT and INSERT
#
#
###################################################

GRANT SELECT, INSERT ON bond.* TO bondApp@localhost IDENTIFIED BY 'p4ssw0rd';


