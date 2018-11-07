-- Create User StoredProcedure
CREATE OR REPLACE FUNCTION createUser(first_name VARCHAR(64), last_name VARCHAR(64), gender VARCHAR(8), email VARCHAR(256), 
    phone CHAR(8), password VARCHAR(64), zipcode NUMERIC, is_admin BOOLEAN)
	RETURNS void AS $$
	BEGIN
	  INSERT INTO users (first_name, last_name, gender, email, phone, password, zipcode, is_admin)
	  VALUES (first_name, last_name, gender, email, phone, password, zipcode, is_admin);
	END;
	$$ LANGUAGE plpgsql;