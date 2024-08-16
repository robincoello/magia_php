<?php

################################################################################

class Addresses {

    public $_id;
    public $_contact_id;
    public $_name;
    public $_address;
    public $_number;
    public $_postcode;
    public $_barrio;
    public $_sector;
    public $_ref;
    public $_city;
    public $_province;
    public $_region;
    public $_country;
    public $_code;
    //
    public $_status;
    public $_transport = array();
    public $_redi = 1;
    public $_redi_val;
    public $_errors = array();

    function __construct() {
        
    }

################################################################################

    function getId() {
        return $this->_id;
    }

    function getContact_id() {
        return $this->_contact_id;
    }

    function getName() {
        return $this->_name;
    }

    function getAddress() {
        return ($this->_address);
    }

    function getNumber() {
        return $this->_number;
    }

    function getPostcode() {
        return $this->_postcode;
    }

    function getBarrio() {
        return $this->_barrio;
    }

    function getSector() {
        return $this->_sector;
    }

    function getRef() {
        return $this->_city;
    }

    function getCity() {
        return $this->_city;
    }

    function getProvince() {
        return $this->_city;
    }

    function getRegion() {
        return $this->_region;
    }

    function getCountry() {
        return $this->_country;
    }

    function getCode() {
        return $this->_code;
    }

    function getStatus() {
        return $this->_status;
    }

    function getTransport() {
        return $this->_transport;
    }

    function getRedi() {
        return $this->_redi;
    }

    function getRediVal() {
        return $this->_redi_val;
    }

    function getErrors() {
        return $this->_errors;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setContact_id($contact_id) {
        $this->_contact_id = $contact_id;
    }

    function setName($name) {
        $this->_name = $name;
    }

    function setAddress($address) {
        $this->_address = $address;
    }

    function setNumber($number) {
        $this->_number = $number;
    }

    function setPostcode($postcode) {
        $this->_postcode = $postcode;
    }

    function setBarrio($barrio) {
        $this->_barrio = $barrio;
    }

    function setSector($sector) {
        $this->_sector = $sector;
    }

    function setRef($ref) {
        $this->_ref = $ref;
    }

    function setCity($city) {
        $this->_city = $city;
    }

    function setProvince($province) {
        $this->_province = $province;
    }

    function setRegion($region) {
        $this->_region = $region;
    }

    function setCountry($country) {
        $this->_country = $country;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setAddresses($id) {

        if ($id) {
            $addresses = addresses_details($id);
            //
            $this->_id = $addresses["id"];
            $this->_contact_id = $addresses["contact_id"];
            $this->_name = $addresses["name"];
            $this->_address = $addresses["address"];
            $this->_number = $addresses["number"];
            $this->_postcode = $addresses["postcode"];
            $this->_barrio = $addresses["barrio"];
            $this->_sector = $addresses["sector"];
            $this->_ref = $addresses["ref"];
            $this->_city = $addresses["city"];
            $this->_province = $addresses["province"];
            $this->_region = $addresses["region"];
            $this->_country = $addresses["country"];
            $this->_code = $addresses["code"];
            $this->_status = $addresses["status"];
        }
    }

    function setTransport($addresses_id) {

        // solo puede tener un tipo de transporte por direccion 

        $code = (addresses_transport_search_by_addresses_id($addresses_id));

        if ($code) {

            $transport = new Transport();
            $transport->setTransport($code);

            array_push($this->_transport, $transport);
        }
    }

    function setRedi($redi) {
        $this->_redi = $redi;
    }

    function setRediVal($redi_val) {
        $this->_redi_val = $redi_val;
    }

    function format($type, $val) {

        switch ($type) {
            case 'id':
                $this->format_id($val);
                break;
            //
            case 'contact_id':
                // $this->format_id($val);
                break;
            case 'name': // billing o delivery
                // $this->format_id($val);
                break;
            case 'address': // texto de la direccion
                $this->format_street($val);
                break;
            case 'number': // tiene letras y numeros 
                // $this->format_id($val);
                break;
            case 'postcode': // letras y numeros 
                // $this->format_id($val);
                break;
            case 'barrio': // letras y numeros
                // $this->format_id($val);
                break;
            case 'sector': // letras y numeros
                // $this->format_id($val);
                break;
            case 'ref': // letras
                // $this->format_id($val);
                break;
            case 'city': // letras
                // $this->format_id($val);
                break;
            case 'province': // letras
                // $this->format_id($val);
                break;
            case 'region': // letras
                // $this->format_id($val);
                break;
            case 'country': // viene de ottra tabla
                // $this->format_id($val);
                break;
            case 'code': // unique()
                // $this->format_id($val);
                break;
            case 'status': // 0,1 
                // $this->format_id($val);
                break;

            default: // por defecto si no encuentra ninguno de estos pone en mayuscula
                break;
        }
    }

    function format_id($id) {
        return $id;
    }

    /**
     * Street format
     * @param type $address
     */
    function format_street($street) {

        $street = clean($street);
        $street = strtoupper($street);

        $this->_address = $street;
    }

    /**
     * Crea la direccion
     */
    function create($new_data) {
        /**
         * Formatear
         * chequear datos obligatorios
         * chequear si direccion ya existe
         * 
         */
    }

    /**
     * Lee o muestra la direccion
     */
    function read($id) {
        
    }

    /**
     * Actualiza la direccon
     */
    function update($id, $new_data) {
        
    }

    /**
     * Borra la direccion
     */
    function delete($id) {
        
    }

    function block() {
        global $u_rol;
        /**
         * Si el id es correcto
         * Si existe
         * Si no es billing
         * Si el usuario puede editar esa direccion 
         * Si la oficina no es mi oficina
         */
        if (!is_id($this->_id)) {
            array_push($this->_errors, '$address_id format error');
        }
        //
        if (strtolower(addresses_field_id('name', $this->_id)) == 'billing') {
            array_push($this->_errors, 'You cannot block a billing address');
        }
        //
        if (!permissions_has_permission(users_field_id('role', $u_id), "shop_addresses", "update")) {
            array_push($this->_errors, 'Your role does not allow you to edit addresses');
        }
        //Puede editar otras oficinas?
        // si la oficina no es mi oficina && no puedo editar otras oficinas
        if (($this->_id != contacts_field_id('owner_id', $u_id)) && !permissions_has_permission(users_field_id('role', $u_id), "shop_offices_others", "update")) {
            array_push($this->_errors, 'Your role does not allow you to edit addresses of other offices');
        }
        // 
        // si no hay errores
        if (!$this->_errors) {
            // puedo actualizar
            shop_address_block(
                    $address_id, $office_id
            );
        }
    }
}

################################################################################
