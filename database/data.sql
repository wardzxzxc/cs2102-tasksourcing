INSERT INTO users (first_name, last_name, gender, email, phone, password, zipcode, is_admin)
VALUES ('Admin', 'Inistrator', 'Male', 'admin@gmail.com', '12345678', 
	'password', '123456', 'true');
INSERT INTO users (first_name, last_name, gender, email, phone, password, zipcode, is_admin)
VALUES ('Deborah', 'Ruiz', 'Female', 'druiz0@drupal.org', '93729111', 
	'Deborah84', '184219', 'false');
INSERT INTO users (first_name, last_name, gender, email, phone, password, zipcode, is_admin)
VALUES ('Tammy', 'Lance', 'Female', 'tammy0@gmail.com', '83920122', 
	'Tammy123', '513611', 'false');
INSERT INTO users (first_name, last_name, gender, email, phone, password, zipcode, is_admin)
VALUES ('Ash', 'Reeds', 'Male', 'ash1567@gmail.com', '92148171', 
	'Ash1R567', '612311', 'false');
INSERT INTO users (first_name, last_name, gender, email, phone, password, zipcode, is_admin)
VALUES ('Walter', 'Leong', 'Male', 'wleong3@shop-pro.jp', '91247772', 
	'Walter83', '155890', 'false');
INSERT INTO users (first_name, last_name, gender, email, phone, password, zipcode, is_admin)
VALUES ('Kathy', 'Reid', 'Female', 'kreid7@cbsnews.com', '91123888', 
	'KathyR83', '664435', 'false');
INSERT INTO users (first_name, last_name, gender, email, phone, password, zipcode, is_admin)
VALUES ('Matthew', 'Vasquez', 'Male', 'mvasqueza@nymag.com', '91238889', 
	'Deborah84', '184219', 'false');
INSERT INTO users (first_name, last_name, gender, email, phone, password, zipcode, is_admin)
VALUES ('Carolyn', 'Patterson', 'Female', 'cpattersonc@liveinternet.ru', '93331123', 
	'Carolyn1999', '622111', 'false');
INSERT INTO users (first_name, last_name, gender, email, phone, password, zipcode, is_admin)
VALUES ('Wanda', 'Burns', 'Female', 'wburnsq@gnu.org', '98442277', 
	'Wanda871', '553311', 'false');
INSERT INTO users (first_name, last_name, gender, email, phone, password, zipcode, is_admin)
VALUES ('Alan', 'Johnson', 'Male', 'ajohnsonw@guardian.co.uk', '91183901', 
	'Alan1990', '521233', 'false');

INSERT INTO catalogue VALUES ('Homework');
INSERT INTO catalogue VALUES ('Repair');
INSERT INTO catalogue VALUES ('Cleaning');
INSERT INTO catalogue VALUES ('Maintenance');
INSERT INTO catalogue VALUES ('Electrical');
INSERT INTO catalogue VALUES ('Painting');
INSERT INTO catalogue VALUES ('Gardening');

INSERT INTO task (task_cost, task_title, task_description, task_datetime_created, 
	task_zipcode, task_duration, task_starttime, is_available, task_owner, task_catalogue) 
VALUES  ('200.00', 'Painting Job', 'Paint the fence along the road', '2018-10-06 13:45:00',
	'905532', '3', '2018-11-11 12:30:00', 'true', '6', 'Painting');
INSERT INTO task (task_cost, task_title, task_description, task_datetime_created, 
	task_zipcode, task_duration, task_starttime, is_available, task_owner, task_catalogue) 
VALUES  ('150.00', 'Printing Job', 'Print 50 sets of examination practice paper', '2018-09-30 15:43:00',
	'154467', '5', '2019-01-10 09:10:00', 'true', '7', 'Homework');
INSERT INTO task (task_cost, task_title, task_description, task_datetime_created, 
	task_zipcode, task_duration, task_starttime, is_available, task_owner, task_catalogue) 
VALUES  ('300.00', 'Clean toilets', '10 toilets to clean', '2018-10-01 18:23:00',
	'155306', '9', '2018-12-03 17:10:00', 'true', '9', 'Cleaning');
INSERT INTO task (task_cost, task_title, task_description, task_datetime_created, 
	task_zipcode, task_duration, task_starttime, is_available, task_owner, task_catalogue) 
VALUES  ('300.00', 'Clean toilets', '7 toilets to clean', '2018-10-01 18:54:00',
	'155306', '9', '2018-12-03 17:10:00', 'true', '10', 'Cleaning');
INSERT INTO task (task_cost, task_title, task_description, task_datetime_created, 
	task_zipcode, task_duration, task_starttime, is_available, task_owner, task_catalogue) 
VALUES  ('400.00', 'Printing Job', 'Print 100 sets of examination practice paper', '2018-09-30 15:43:00',
	'154467', '5', '2019-01-10 09:10:00', 'true', '7', 'Homework');
INSERT INTO task (task_cost, task_title, task_description, task_datetime_created, 
	task_zipcode, task_duration, task_starttime, is_available, task_owner, task_catalogue) 
VALUES  ('1200.00', 'Painting Job', 'Paint the walls of the school', '2018-10-06 13:45:00',
	'905532', '3', '2019-02-13 09:00:00', 'true', '7', 'Painting');
INSERT INTO task (task_cost, task_title, task_description, task_datetime_created, 
	task_zipcode, task_duration, task_starttime, is_available, task_owner, task_catalogue) 
VALUES  ('200.00', 'Printing Job', 'Print pamphlets', '2018-09-30 15:43:00',
	'154467', '5', '2019-01-10 09:10:00', 'true', '9', 'Homework');
INSERT INTO task (task_cost, task_title, task_description, task_datetime_created, 
	task_zipcode, task_duration, task_starttime, is_available, task_owner, task_catalogue) 
VALUES  ('700.00', 'Install lights', 'Install 50 lights in the building', '2018-09-30 18:00:00',
	'154467', '5', '2019-01-10 09:30:00', 'true', '5', 'Electrical');

INSERT INTO bid VALUES ('350', '2018-10-02 18:23:00', '1', '5', '5');
INSERT INTO bid VALUES ('325', '2018-10-04 12:11:00', '1', '7', '5');
INSERT INTO bid VALUES ('310', '2018-10-05 13:33:00', '1', '8', '5');
INSERT INTO bid VALUES ('380', '2018-10-05 11:11:00', '1', '8', '7');
INSERT INTO bid VALUES ('370', '2018-10-06 16:34:00', '1', '9', '7');
INSERT INTO bid VALUES ('350', '2018-10-07 10:13:00', '1', '5', '7');
INSERT INTO bid VALUES ('340', '2018-10-07 11:54:00', '1', '10', '7');
INSERT INTO bid VALUES ('1150', '2018-10-23 13:55:00', '1', '10', '8');
INSERT INTO bid VALUES ('1100', '2018-10-23 16:11:00', '1', '6', '8');
INSERT INTO bid VALUES ('1090', '2018-10-24 06:55:00', '1', '8', '8');
INSERT INTO bid VALUES ('185', '2018-10-27 08:22:00', '1', '8', '9');