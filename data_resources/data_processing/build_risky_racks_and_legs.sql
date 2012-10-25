----- This will help attribute the regional bike layer with occurances of bike/auto accidents
----- and
----- build a risky bike racks layer based on the frequency of bike thefts associated with that location
-----
----- Work in progress!  
-----
----- PostGIS 1.5 - 2.0 database
----- Basic Usage:
------- Either rename the geometry field in the base table (to geom_2232) or in the queries below (from geom_2232).


---------------------------------------Risky Bike Racks---------------------------------

------- These could be used to add needed fields to the bike_racks table if the table is replaced.
---- ALTER TABLE bike_racks ADD COLUMN theft_count INTEGER;
---- ALTER TABLE bike_racks ADD COLUMN theft_rank INTEGER;

DROP TABLE IF EXISTS bike_theft;
CREATE TABLE bike_theft AS SELECT offense_ty AS offense_type, offense_ca AS offense_category,reported_d AS day_reported, incident_a AS incident_address, 
district_i AS district, neighborho AS neighborhood, geom_4326, geom_2232  FROM denver_crime WHERE offense_ty = 'theft-bicycle';
ALTER TABLE bike_theft ADD COLUMN gid SERIAL;
CREATE INDEX "bike_theft_geom_2232_gist" ON bike_theft USING gist (geom_2232 );

DROP TABLE IF EXISTS bike_rack_theft_history;
CREATE TEMP TABLE bike_rack_theft_history AS
SELECT a.gid, count(*) FROM bike_racks a, bike_theft b 
WHERE ST_Dwithin(a.geom_2232, b.geom_2232, 25) GROUP BY a.gid;

UPDATE bike_racks a SET theft_count = b.count FROM bike_rack_theft_history b WHERE a.gid = b.gid; -- i think this join doesn't work
UPDATE bike_racks a SET theft_count = 0 WHERE theft_count IS NULL;
UPDATE bike_racks a SET theft_rank = 1 WHERE theft_count < 6;
UPDATE bike_racks a SET theft_rank = 2 WHERE theft_count > 5 and theft_count < 16;
UPDATE bike_racks a SET theft_rank = 3 WHERE theft_count > 15;
UPDATE bike_racks a SET theft_rank = 0 WHERE theft_count IS NULL;

DROP TABLE IF EXISTS bike_rack_theft_history;


-------------------------------------Risky Routes--------------------------------


DROP TABLE IF EXISTS risky_legs_temp;
CREATE TEMP TABLE risky_legs_temp AS
SELECT b.gid, count(*) FROM regional_crash_2006 a, bike_legs b
WHERE act1 = '13' AND ST_Dwithin(a.geom_2232, b.geom_2232, 10) group by b.gid order by count;
DROP TABLE IF EXISTS risky_bike_legs;
CREATE TABLE risky_bike_legs AS
SELECT b.gid, b.name, a.count, b.geom_2232 FROM risky_legs_temp a, bike_legs b WHERE a.gid = b.gid;
