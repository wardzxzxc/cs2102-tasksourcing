CREATE table users (
	user_id INTEGER PRIMARY KEY NOT NULL,
	first_name CHARACTER VARYING (64) NOT NULL,
	last_name CHARACTER VARYING (64) NOT NULL,
	email CHARACTER VARYING (256) NOT NULL,
	phone CHARACTER (8) NOT NULL,
	password CHARACTER VARYING (64) NOT NULL CONSTRAINT too_short CHECK(char_length(password) >= 8),
	zipcode NUMERIC NOT NULL,
	bid_point INTEGER NOT NULL,
	is_admin BOOLEAN DEFAULT FALSE
);