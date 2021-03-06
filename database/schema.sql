CREATE table users (
	user_id SERIAL PRIMARY KEY,
	first_name VARCHAR (64) NOT NULL,
	last_name VARCHAR (64) NOT NULL,
	gender VARCHAR (8) NOT NULL,
	email VARCHAR (256) UNIQUE NOT NULL,
	phone CHARACTER (8) NOT NULL,
	password VARCHAR (64) NOT NULL CONSTRAINT too_short CHECK(char_length(password) >= 8),
	zipcode NUMERIC NOT NULL,
	is_admin BOOLEAN DEFAULT FALSE
);

CREATE table catalogue (
	name VARCHAR(128) PRIMARY KEY
);

CREATE table task (
	task_id SERIAL PRIMARY KEY,
	task_cost DECIMAL NOT NULL, 
	task_title VARCHAR (256) NOT NULL,
	task_description VARCHAR (500) NOT NULL,
	task_datetime_created TIMESTAMP NOT NULL,
	task_zipcode NUMERIC NOT NULL, 
	task_duration INTEGER NOT NULL,
	task_starttime TIMESTAMP NOT NULL,
	is_available BOOLEAN DEFAULT FALSE,
	task_owner INTEGER,
	task_catalogue VARCHAR(128),
	FOREIGN KEY (task_owner) REFERENCES users (user_id)
						ON UPDATE cascade
						ON DELETE cascade,
	FOREIGN KEY(task_catalogue) REFERENCES catalogue(name)
						ON UPDATE cascade
						ON DELETE cascade,
	CONSTRAINT check_start CHECK (task_starttime >= now())
);

CREATE table bid (
	bid_cost DECIMAL NOT NULL, 
	bid_datetime TIMESTAMP NOT NULL,
	bid_status INTEGER NOT NULL DEFAULT '1', /*1 refers to pending, 2 refers to accepted, 3 refers to rejected*/
	bid_userid INTEGER,
	bid_taskid INTEGER,
	PRIMARY KEY (bid_userid, bid_taskid), 
	FOREIGN KEY (bid_userid) REFERENCES users (user_id)
						ON UPDATE cascade
						ON DELETE cascade,
	FOREIGN KEY (bid_taskid) REFERENCES task (task_id)
						ON UPDATE cascade
						ON DELETE cascade
);