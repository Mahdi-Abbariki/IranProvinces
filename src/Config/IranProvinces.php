<?php

return [
    /**
     * The name of provinces and cities Table
     * you can change them if you wish
     * the desired data should be a string
     */
    "provinces_table_name" => "provinces",
    "cities_table_name" => "cities",


    /**
     * if it's set to FALSE there will be no cities table and relations,
     * change it as you need in your awesome project
     * TRUE is the most common option used
     * desired values : TRUE , FALSE
     */
    "cities" => true,

    /**
     * if it's set to True there will be two fields named
     * latitude and longitude in cities table
     * showing the lat long of each city
     */
    "cities_lat_long" => false,

    /**
     * if it's set to True the created_at and updated_at columns
     * will be present in both tables, otherwise they will be omitted
     * desired values : TRUE , FALSE
     */
    "timestamps" => false
];
