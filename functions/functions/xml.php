<?php

/*
 * Class to convert Class to XML
 */

/**
 * Description of ClassToXML
 *
 * @author tyrodeveloper
 */
class ClassToXML {

    private $xml = null;

    function Convert($object) {
        //Create DOMDocument
        $this->xml = new DOMDocument('1.0', "UTF-8");
        //Add the Class Element
        $xmlElement = $this->xml->createElement(get_class($object));
        //Add XSI
        $domAttribute = $this->xml->createAttribute('xmlns:xsi');
        $domAttribute->value = 'http://www.w3.org/2001/XMLSchema-instance';
        $xmlElement->appendChild($domAttribute);
        //Add the root Element
        $this->xml->appendChild($xmlElement);
        //Start Add elements
        $this->ReadProperty($xmlElement, $object);
        //Create the XML
        return $this->xml->saveXML();
    }

    private function ReadProperty($xmlElement, $object) {
        foreach ($object as $key => $value) {
            if ($value != null) {
                if (is_object($value)) {
                    $element = $this->xml->createElement($key);
                    $this->ReadProperty($element, $value);
                    $xmlElement->AppendChild($element);
                } elseif (is_array($value)) {
                    $this->ReadProperty($xmlElement, $value);
                } else {
                    $this->AddAttribute($xmlElement, $key, $value);
                }
            }
        }
    }

    private function AddAttribute($xmlElement, $key, $value) {
        $domAttribute = $this->xml->createAttribute($key);
        $domAttribute->value = $value;
        $xmlElement->appendChild($domAttribute);
    }
}
