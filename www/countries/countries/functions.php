<?php

// plugin = countries
// creation date : 
// 
// 
function countries_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM countries WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function countries_country_by_country_code($country_code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT countryName FROM countries WHERE countryCode = ?");
    $req->execute(array($country_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function countries_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM countries WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function countries_list($start = 0, $limit = 999) {
    global $db;
    $sql = "SELECT * FROM countries ORDER BY countryName Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function countries_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM countries WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function countries_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM countries WHERE id=? ");
    $req->execute(array($id));
}

function countries_edit($id, $eu, $countryCode, $countryName, $currencyCode, $fipsCode, $isoNumeric, $north, $south, $east, $west, $capital, $continentName, $continent, $languages, $isoAlpha3, $geonameId) {

    global $db;
    $req = $db->prepare(" UPDATE countries SET "
            . "eu=:eu , "
            . "countryCode=:countryCode , "
            . "countryName=:countryName , "
            . "currencyCode=:currencyCode , "
            . "fipsCode=:fipsCode , "
            . "isoNumeric=:isoNumeric , "
            . "north=:north , "
            . "south=:south , "
            . "east=:east , "
            . "west=:west , "
            . "capital=:capital , "
            . "continentName=:continentName , "
            . "continent=:continent , "
            . "languages=:languages , "
            . "isoAlpha3=:isoAlpha3 , "
            . "geonameId=:geonameId  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "eu" => $eu,
        "countryCode" => $countryCode,
        "countryName" => $countryName,
        "currencyCode" => $currencyCode,
        "fipsCode" => $fipsCode,
        "isoNumeric" => $isoNumeric,
        "north" => $north,
        "south" => $south,
        "east" => $east,
        "west" => $west, "capital" => $capital, "continentName" => $continentName, "continent" => $continent, "languages" => $languages, "isoAlpha3" => $isoAlpha3, "geonameId" => $geonameId,
    ));
}

function countries_add($eu, $countryCode, $countryName, $currencyCode, $fipsCode, $isoNumeric, $north, $south, $east, $west, $capital, $continentName, $continent, $languages, $isoAlpha3, $geonameId) {
    global $db;
    $req = $db->prepare(" INSERT INTO `countries` ( `id` ,   `eu` , `countryCode` ,   `countryName` ,   `currencyCode` ,   `fipsCode` ,   `isoNumeric` ,   `north` ,   `south` ,   `east` ,   `west` ,   `capital` ,   `continentName` ,   `continent` ,   `languages` ,   `isoAlpha3` ,   `geonameId`   )
                                       VALUES  (:id ,  :eu , :countryCode ,  :countryName ,  :currencyCode ,  :fipsCode ,  :isoNumeric ,  :north ,  :south ,  :east ,  :west ,  :capital ,  :continentName ,  :continent ,  :languages ,  :isoAlpha3 ,  :geonameId   ) ");

    $req->execute(array(
        "id" => null,
        "eu" => $eu,
        "countryCode" => $countryCode,
        "countryName" => $countryName,
        "currencyCode" => $currencyCode,
        "fipsCode" => $fipsCode,
        "isoNumeric" => $isoNumeric,
        "north" => $north,
        "south" => $south,
        "east" => $east,
        "west" => $west,
        "capital" => $capital,
        "continentName" => $continentName,
        "continent" => $continent,
        "languages" => $languages,
        "isoAlpha3" => $isoAlpha3,
        "geonameId" => $geonameId
            )
    );

    return $db->lastInsertId();
}

function countries_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM countries 
    
WHERE id like :txt 
OR eu like :txt
OR countryCode like :txt
OR countryName like :txt
OR currencyCode like :txt
OR fipsCode like :txt
OR isoNumeric like :txt
OR north like :txt
OR south like :txt
OR east like :txt
OR west like :txt
OR capital like :txt
OR continentName like :txt
OR continent like :txt
OR languages like :txt
OR isoAlpha3 like :txt
OR geonameId like :txt
ORDER BY countryName 
Limit  :limit OFFSET :start 
";

    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function countries_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (countries_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function countries_is_id($id) {
    return true;
}

function countries_is_countryName($countryName) {
    return true;
}

function countries_is_currencyCode($currencyCode) {
    return true;
}

function countries_is_fipsCode($fipsCode) {
    return true;
}

function countries_is_isoNumeric($isoNumeric) {
    return true;
}

function countries_is_north($north) {
    return true;
}

function countries_is_south($south) {
    return true;
}

function countries_is_east($east) {
    return true;
}

function countries_is_west($west) {
    return true;
}

function countries_is_capital($capital) {
    return true;
}

function countries_is_continentName($continentName) {
    return true;
}

function countries_is_continent($continent) {
    return true;
}

function countries_is_languages($languages) {
    return true;
}

function countries_is_isoAlpha3($isoAlpha3) {
    return true;
}

function countries_is_geonameId($geonameId) {
    return true;
}

////////////////////////////////////////////////////////////////////////////////

function countries_continent_list() {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT DISTINCT(continent), continentName FROM countries ");
    $req->execute();
    $data = $req->fetchall();

    return (isset($data)) ? $data : false;
}

function countries_list_by_continent($continentName, $start = 0, $limit = 999) {
    global $db;
    $sql = "SELECT * FROM countries WHERE continentName like :continentName ORDER BY countryName Limit :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':continentName', "%$continentName%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return (isset($data)) ? $data : false;
}

//

function countries_economic_union_list() {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT DISTINCT(eu) FROM countries ");
    $req->execute();
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

//
function countries_list_by_economic_union($eu, $start = 0, $limit = 999) {
    global $db;
    $sql = "SELECT * FROM countries WHERE eu = :eu ORDER BY countryName  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':eu', $eu, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return (isset($data)) ? $data : false;
}

//
function countries_economic_union_by_country($countryCode) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT eu FROM countries WHERE countryCode = ?");
    $req->execute(array(
        $countryCode
    ));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}
