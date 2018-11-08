-- Create Bid Stored Procedure
CREATE OR REPLACE FUNCTION create_bid(bid_cost NUMERIC, bid_datetime TIMESTAMP, bid_status INTEGER, bid_userid INTEGER, bid_taskid INTEGER)
	RETURNS void AS $$
	BEGIN
	  INSERT INTO bid (bid_cost, bid_datetime, bid_status, bid_userid, bid_taskid)
	  VALUES (bid_cost, bid_datetime, bid_status, bid_userid, bid_taskid);
	END;
	$$ LANGUAGE plpgsql;

-- Create Catalogue Stored Procedure
CREATE OR REPLACE FUNCTION create_catalogue(name VARCHAR(128))
	RETURNS void AS $$
	BEGIN
	  INSERT INTO catalogue (name)
	  VALUES (name);
	END;
	$$ LANGUAGE plpgsql;
	
-- Create Task Stored Procedure
CREATE OR REPLACE FUNCTION create_task(task_cost NUMERIC, task_title VARCHAR(256), task_description VARCHAR(500), task_datetime_created TIMESTAMP,
    task_zipcode NUMERIC, task_duration INTEGER, task_starttime TIMESTAMP, is_available BOOLEAN, task_owner INTEGER, task_catalogue VARCHAR(128))
	RETURNS void AS $$
	BEGIN
	  INSERT INTO task (task_cost, task_title, task_description, task_datetime_created, task_zipcode, 
      task_duration, task_starttime, is_available, task_owner, task_catalogue)
	  VALUES (task_cost, task_title, task_description, task_datetime_created, task_zipcode, 
      task_duration, task_starttime, is_available, task_owner, task_catalogue);
	END;
	$$ LANGUAGE plpgsql;
	
-- Create User Stored Procedure
CREATE OR REPLACE FUNCTION create_user(first_name VARCHAR(64), last_name VARCHAR(64), gender VARCHAR(8), email VARCHAR(256), 
    phone CHAR(8), password VARCHAR(64), zipcode NUMERIC, is_admin BOOLEAN)
	RETURNS void AS $$
	BEGIN
	  INSERT INTO users (first_name, last_name, gender, email, phone, password, zipcode, is_admin)
	  VALUES (first_name, last_name, gender, email, phone, password, zipcode, is_admin);
	END;
	$$ LANGUAGE plpgsql;

-- Update Bid Status Stored Procedure
CREATE OR REPLACE FUNCTION update_bid_status()
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
CREATE TRIGGER update_other_bids
    AFTER UPDATE
    ON bid
    FOR EACH ROW
    EXECUTE PROCEDURE updateBidStatus();
