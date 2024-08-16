<?php

// countries
// Date: 2023-08-04    
################################################################################

class Countries {

    /**
     * id
     */
    public $_id;

    /**
     * eu
     */
    public $_eu;

    /**
     * countryCode
     */
    public $_countryCode;

    /**
     * countryName
     */
    public $_countryName;

    /**
     * currencyCode
     */
    public $_currencyCode;

    /**
     * fipsCode
     */
    public $_fipsCode;

    /**
     * isoNumeric
     */
    public $_isoNumeric;

    /**
     * north
     */
    public $_north;

    /**
     * south
     */
    public $_south;

    /**
     * east
     */
    public $_east;

    /**
     * west
     */
    public $_west;

    /**
     * capital
     */
    public $_capital;

    /**
     * continentName
     */
    public $_continentName;

    /**
     * continent
     */
    public $_continent;

    /**
     * languages
     */
    public $_languages;

    /**
     * isoAlpha3
     */
    public $_isoAlpha3;

    /**
     * geonameId
     */
    public $_geonameId;

    function __construct() {
        //
    }

################################################################################

    function getId() {
        return $this->_id;
    }

    function getEu() {
        return $this->_eu;
    }

    function getCountryCode() {
        return $this->_countryCode;
    }

    function getCountryName() {
        return $this->_countryName;
    }

    function getCurrencyCode() {
        return $this->_currencyCode;
    }

    function getFipsCode() {
        return $this->_fipsCode;
    }

    function getIsoNumeric() {
        return $this->_isoNumeric;
    }

    function getNorth() {
        return $this->_north;
    }

    function getSouth() {
        return $this->_south;
    }

    function getEast() {
        return $this->_east;
    }

    function getWest() {
        return $this->_west;
    }

    function getCapital() {
        return $this->_capital;
    }

    function getContinentName() {
        return $this->_continentName;
    }

    function getContinent() {
        return $this->_continent;
    }

    function getLanguages() {
        return $this->_languages;
    }

    function getIsoAlpha3() {
        return $this->_isoAlpha3;
    }

    function getGeonameId() {
        return $this->_geonameId;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setEu($eu) {
        $this->_eu = $eu;
    }

    function setCountryCode($countryCode) {
        $this->_countryCode = $countryCode;
    }

    function setCountryName($countryName) {
        $this->_countryName = $countryName;
    }

    function setCurrencyCode($currencyCode) {
        $this->_currencyCode = $currencyCode;
    }

    function setFipsCode($fipsCode) {
        $this->_fipsCode = $fipsCode;
    }

    function setIsoNumeric($isoNumeric) {
        $this->_isoNumeric = $isoNumeric;
    }

    function setNorth($north) {
        $this->_north = $north;
    }

    function setSouth($south) {
        $this->_south = $south;
    }

    function setEast($east) {
        $this->_east = $east;
    }

    function setWest($west) {
        $this->_west = $west;
    }

    function setCapital($capital) {
        $this->_capital = $capital;
    }

    function setContinentName($continentName) {
        $this->_continentName = $continentName;
    }

    function setContinent($continent) {
        $this->_continent = $continent;
    }

    function setLanguages($languages) {
        $this->_languages = $languages;
    }

    function setIsoAlpha3($isoAlpha3) {
        $this->_isoAlpha3 = $isoAlpha3;
    }

    function setGeonameId($geonameId) {
        $this->_geonameId = $geonameId;
    }

    function setCountries($id) {
        $countries = countries_details($id);
        //
        $this->_id = $countries["id"];
        $this->_eu = $countries["eu"];
        $this->_countryCode = $countries["countryCode"];
        $this->_countryName = $countries["countryName"];
        $this->_currencyCode = $countries["currencyCode"];
        $this->_fipsCode = $countries["fipsCode"];
        $this->_isoNumeric = $countries["isoNumeric"];
        $this->_north = $countries["north"];
        $this->_south = $countries["south"];
        $this->_east = $countries["east"];
        $this->_west = $countries["west"];
        $this->_capital = $countries["capital"];
        $this->_continentName = $countries["continentName"];
        $this->_continent = $countries["continent"];
        $this->_languages = $countries["languages"];
        $this->_isoAlpha3 = $countries["isoAlpha3"];
        $this->_geonameId = $countries["geonameId"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return countries_field_id($field, $id);
    }

    function field_code($field, $code) {
        return countries_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return countries_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return countries_list($start, $limit);
    }

    function details($id) {
        return countries_details($id);
    }

    function delete($id) {
        return countries_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return countries_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return countries_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return countries_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return countries_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return countries_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return countries_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return countries_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return countries_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return countries_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return countries_is_id($id);
    }

    function is_eu($eu) {
        return countries_is_eu($eu);
    }

    function is_countryCode($countryCode) {
        return countries_is_countryCode($countryCode);
    }

    function is_countryName($countryName) {
        return countries_is_countryName($countryName);
    }

    function is_currencyCode($currencyCode) {
        return countries_is_currencyCode($currencyCode);
    }

    function is_fipsCode($fipsCode) {
        return countries_is_fipsCode($fipsCode);
    }

    function is_isoNumeric($isoNumeric) {
        return countries_is_isoNumeric($isoNumeric);
    }

    function is_north($north) {
        return countries_is_north($north);
    }

    function is_south($south) {
        return countries_is_south($south);
    }

    function is_east($east) {
        return countries_is_east($east);
    }

    function is_west($west) {
        return countries_is_west($west);
    }

    function is_capital($capital) {
        return countries_is_capital($capital);
    }

    function is_continentName($continentName) {
        return countries_is_continentName($continentName);
    }

    function is_continent($continent) {
        return countries_is_continent($continent);
    }

    function is_languages($languages) {
        return countries_is_languages($languages);
    }

    function is_isoAlpha3($isoAlpha3) {
        return countries_is_isoAlpha3($isoAlpha3);
    }

    function is_geonameId($geonameId) {
        return countries_is_geonameId($geonameId);
    }
}
