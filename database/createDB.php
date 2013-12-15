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
# 	Insert first users into database
#
###################################################

INSERT INTO agent VALUES (null, 'Dutchess', 'Sterling', 'Archer', 'worldsGreatest@issis.gov', sha1('lamePassWord'));

INSERT INTO agent VALUES (007, 'James', 'James', 'Bond', 'superSpy@mi6.gov.uk', sha1('lamePassWord'));

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


