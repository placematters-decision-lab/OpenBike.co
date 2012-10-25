These queries are a work in progress but were used to process the existing OpenBike.co data.  Please feel free to use and improve them as you need.  Depending on the direction of the project these could be developed into a fully automated process for updating data from live feeds such as the recently released Denver Crime API.  In the mean time this is still a fairly manual process requiring strict table and field names.

These were develeloped on a PostGIS 2.0 database but could be run from older versions of PostGIS.


Hope this helps!




Data Sources:

Bike routes came from the DRCOG Regional Data Catalog who collected the data from local governments and then processing into a regional set. 
	- http://gis.drcog.org/datacatalog/content/bicycle-facility-inventory-february-2012

Crash data (used to calculate risky routes) came from the DRCOG Regional Data Catalog which originally was collected from the Colorado State Department of Transportation then geocoded and refined by DRCOG.
	- http://gis.drcog.org/datacatalog/content/drcog-crash-data-points-2006

Bike racks came from the City and County of Denver
	- http://data.denvergov.org/dataset/city-and-county-of-denver-bike-racks

Crime data (used to calculate risky bike racks) came from the City and County of Denver
	- http://data.denvergov.org/dataset/city-and-county-of-denver-crime
