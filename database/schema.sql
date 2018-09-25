CREATE table users (
	user_id SERIAL PRIMARY KEY NOT NULL,
	first_name VARCHAR (64) NOT NULL,
	last_name VARCHAR (64) NOT NULL,
	email VARCHAR (256) NOT NULL,
	phone CHARACTER (8) NOT NULL,
	password VARCHAR (64) NOT NULL CONSTRAINT too_short CHECK(char_length(password) >= 8),
	zipcode NUMERIC NOT NULL,
	is_admin BOOLEAN DEFAULT FALSE
);

CREATE table bid (
	bid_id SERIAL PRIMARY KEY NOT NULL,
	bid_cost DECIMAL NOT NULL, 
	bid_datetime TIMESTAMP NOT NULL,
	bid_status INTEGER NOT NULL DEFAULT '1', /*1 refers to pending, 2 refers to accepted, 3 refers to rejected*/
	bid_userid INTEGER NOT NULL,
	FOREIGN KEY (bid_userid) REFERENCES users (user_id)
						ON UPDATE cascade
						ON DELETE cascade
	bid_taskid INTEGER REFERENCES task (task_id)
);

CREATE table task (
	task_id SERIAL PRIMARY KEY NOT NULL,
	task_cost DECIMAL NOT NULL, 
	task_title VARCHAR (256) NOT NULL,
	task_description VARCHAR (500) NOT NULL,
	task_datetime_created TIMESTAMP NOT NULL,
	task_zipcode NUMERIC NOT NULL, 
	task_duration INTEGER NOT NULL,
	task_starttime TIMESTAMP NOT NULL,
	is_available BOOLEAN DEFAULT FALSE,
	task_type VARCHAR(128) REFERENCES catalogue (name),
	task_winningbid_id INTEGER REFERENCES bid (bid_id),
	task_owner INTEGER NOT NULL,
	FOREIGN KEY (task_owner) REFERENCES users (user_id)
						ON UPDATE cascade
						ON DELETE cascade,
	CONSTRAINT check_task CHECK (task_endtime > task_starttime),
	CONSTRAINT check_start CHECK (task_starttime >= now())
);

CREATE table catalogue (
	catalogue_id SERIAL PRIMARY KEY NOT NULL,
	name VARCHAR(128) NOT NULL UNIQUE,
)