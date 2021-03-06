---- Run the following selection statements and export as text for import to Google Fusion Tables.

﻿
----- All bike legs
-- SELECT * FROM bike_legs_kml;

----- All bike racks including risk attribution
-- SELECT gid AS rack_id, theft_count, theft_rank, ST_AsKML(geom_4326) AS geom_kml FROM bike_racks;

----- Only bike legs with reported vehicle on bike accidents
-- SELECT gid AS legid, count AS accident_count, ST_AsKML(geom_4326) AS geom_kml FROM risky_bike_legs;

