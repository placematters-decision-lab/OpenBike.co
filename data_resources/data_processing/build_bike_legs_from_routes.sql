----- This will help process the regional bike layer from DRCOG into a format more suitable for OpenBike.co.
-----
----- Work in progress!  
-----
----- PostGIS 1.5 - 2.0 database
----- Basic Usage:
------- Either rename the geometry field in the base table (to geom_2232) or in the queries below (from geom_2232).

---- 1st union geometry 
DROP TABLE IF EXISTS bike_routes_union;
CREATE TABLE bike_routes_union AS
SELECT ST_Union(geom_2232) AS geom_2232, name FROM bike_routes_drcog_2012_feb GROUP BY name;

---- 2nd split lines into legs at intersections
DROP TABLE IF EXISTS bike_legs;
CREATE TABLE bike_legs AS
SELECT (st_dump(st_union(geom_2232))).geom AS geom_2232 FROM bike_routes_union; 

ALTER TABLE bike_legs ADD COLUMN gid serial;
ALTER TABLE bike_legs ADD CONSTRAINT bike_legs_pk PRIMARY KEY(gid );
CREATE INDEX "bike_legs_geom_2232_gist" ON bike_legs USING gist (geom_2232 );

---- 3rd buffer the original routes
DROP TABLE IF EXISTS routes_buff;
CREATE TABLE routes_buff AS SELECT st_buffer(geom_2232, 1) AS buff_geom, name, type_fx AS type, community FROM bike_routes_drcog_2012_feb;
CREATE INDEX "routes_buff_geom_2232_gist" ON routes_buff USING gist (buff_geom );

---- Attribute legs based if they fall completely within a route segments buffer area
ALTER TABLE bike_legs ADD COLUMN name CHARACTER VARYING (100);
UPDATE bike_legs b SET name = a.name FROM routes_buff a WHERE ST_Within(b.geom_2232, a.buff_geom);
UPDATE bike_legs SET name = 'unknown' WHERE name IS NULL;

ALTER TABLE bike_legs ADD COLUMN type CHARACTER VARYING (100);
UPDATE bike_legs b SET type = a.type FROM routes_buff a WHERE ST_Within(b.geom_2232, a.buff_geom);

ALTER TABLE bike_legs ADD COLUMN community CHARACTER VARYING (100);
UPDATE bike_legs b SET community = a.community FROM routes_buff a WHERE ST_Within(b.geom_2232, a.buff_geom);

ALTER TABLE bike_legs ADD COLUMN symbology CHARACTER VARYING (30);
UPDATE bike_legs SET symbology = '#003300';

ALTER TABLE bike_legs ADD COLUMN length INTEGER;
UPDATE bike_legs SET length = ST_Length(geom_2232);

ALTER TABLE bike_legs ADD COLUMN geom_4326 geometry;
UPDATE bike_legs SET geom_4326 = (SELECT ST_Transform(geom_2232, 4326)); 

---- This logic is what we can be most certain of.  Tweaking is possible.
ALTER TABLE bike_legs ADD COLUMN on_street CHARACTER VARYING (5);
UPDATE bike_legs SET on_street = 'Yes' WHERE type LIKE 'Shoulder%' OR type LIKE 'Shared%' OR type LIKE 'Bike_lane%' OR type LIKE 'Multi-Purpose%';
UPDATE bike_legs SET on_street = 'No' WHERE type NOT LIKE 'Shoulder%' OR type NOT LIKE 'Shared%' OR type NOT LIKE 'Bike_lane%' 
OR type NOT LIKE 'Multi-Purpose%';

---- This logic is what we can be most certain of.  Tweaking is possible.
ALTER TABLE bike_legs ADD COLUMN surface CHARACTER VARYING (30);
UPDATE bike_legs SET surface = 'Paved' WHERE type NOT LIKE 'Unpaved%';
UPDATE bike_legs SET surface = 'Unpaved' WHERE type LIKE 'Unpaved%';

---- Build the final formatted table for input to a Fusion Table
DROP TABLE IF EXISTS bike_legs_kml;
CREATE TABLE bike_legs_kml AS 
SELECT gid as legid, name as legname, type, on_street, surface, community, symbology, length as length_ft, ST_AsKML(geom_4326) as geom_kml 
FROM bike_legs;

DROP TABLE IF EXISTS bike_routes_union;



