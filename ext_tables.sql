#
# Table structure for table 'tx_minishop_domain_model_booking'
#
CREATE TABLE tx_minishop_domain_model_booking (

	name varchar(255) DEFAULT '' NOT NULL,
	adress varchar(255) DEFAULT '' NOT NULL,
	zip varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	telephone varchar(255) DEFAULT '' NOT NULL,
	positions int(11) unsigned DEFAULT '0' NOT NULL,
	country int(11) unsigned DEFAULT '0'

);

#
# Table structure for table 'tx_minishop_domain_model_position'
#
CREATE TABLE tx_minishop_domain_model_position (

	booking int(11) unsigned DEFAULT '0' NOT NULL,

	quantity int(11) DEFAULT '0' NOT NULL,
	product int(11) unsigned DEFAULT '0'

);

#
# Table structure for table 'tx_minishop_domain_model_product'
#
CREATE TABLE tx_minishop_domain_model_product (

	title varchar(255) DEFAULT '' NOT NULL,
	teaser text,
	description text,
	images int(11) unsigned DEFAULT '0' NOT NULL,
	price double(11,2) DEFAULT '0.00' NOT NULL

);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder


#
CREATE TABLE tx_minishop_domain_model_product (

	slug varchar(2048)

);
