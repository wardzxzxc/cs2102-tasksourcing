-- Create User StoredProcedure
CREATE OR REPLACE FUNCTION createUser(first_name VARCHAR(64), last_name VARCHAR(64), gender VARCHAR(8), email VARCHAR(256), 
    phone CHAR(8), password VARCHAR(64), zipcode NUMERIC, is_admin BOOLEAN)
	RETURNS void AS $$
	BEGIN
	  INSERT INTO users (first_name, last_name, gender, email, phone, password, zipcode, is_admin)
	  VALUES (first_name, last_name, gender, email, phone, password, zipcode, is_admin);
	END;
	$$ LANGUAGE plpgsql;

-- Create Task StoredProcedure
CREATE OR REPLACE FUNCTION createTask(task_cost NUMERIC, task_title VARCHAR(256), task_description VARCHAR(500), task_datetime_created TIMESTAMP,
    task_zipcode NUMERIC, task_duration INTEGER, task_starttime TIMESTAMP, is_available BOOLEAN, task_owner INTEGER, task_catalogue VARCHAR(128))
	RETURNS void AS $$
	BEGIN
	  INSERT INTO task (task_cost, task_title, task_description, task_datetime_created, task_zipcode, 
      task_duration, task_starttime, is_available, task_owner, task_catalogue)
	  VALUES (task_cost, task_title, task_description, task_datetime_created, task_zipcode, 
      task_duration, task_starttime, is_available, task_owner, task_catalogue);
	END;
	$$ LANGUAGE plpgsql;

-- Create Catalogue StoredProcedure
CREATE OR REPLACE FUNCTION createCatalogue(name VARCHAR(128))
	RETURNS void AS $$
	BEGIN
	  INSERT INTO catalogue (name)
	  VALUES (name);
	END;
	$$ LANGUAGE plpgsql;

-- Update Bid Status StoredProcedure
CREATE OR REPLACE FUNCTION updateBidStatus()
    RETURNS TRIGGER AS $bid_table$
    BEGIN
    IF NEW.bid_status = '2' THEN 
    UPDATE bid SET bid_status = '3' WHERE bid_status = '1' AND bid_taskid = NEW.bid_taskid;
    END IF;
    IF NEW.bid_status = '1' THEN
    UPDATE bid SET bid_status = '1' WHERE bid_status = '3' AND bid_taskid = NEW.bid_taskid ;
    END IF;
    RETURN NEW;
    END;
    $bid_table$ LANGUAGE plpgsql;

-- Update Bid Status Trigger
CREATE TRIGGER updateOtherBids
    AFTER UPDATE
    ON bid
    FOR EACH ROW
    EXECUTE PROCEDURE updateBidStatus();
