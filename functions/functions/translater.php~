<?php

// https://language-tools.ec.europa.eu/#documentation
// //
// //
// //
// https://commission.europa.eu/resources-partners/etranslation_fr
// https://commission.europa.eu/system/files/2023-04/eTranslation-Flyer-en.pdf
// https://language-tools.ec.europa.eu/
// https://cef-at-service-catalogue.eu/catalogue/search/?q=&selected_facets=service_ownership_status_filter_exact!External
// https://cef-at-service-catalogue.eu/catalogue/browse/c4fbb39f-e441-4bfe-abca-e39a2a0238ba/
// https://cef-at-service-catalogue.eu/
// https://commission.europa.eu/resources-partners/etranslation_en
// https://mail.google.com/mail/u/0/#inbox/FMfcgzGwJmMSKLFxtZLMtzNrtwZSMCpj
// 
// Cache
// https://stackoverflow.com/questions/58353028/is-there-a-way-to-cache-json-on-client-side-for-limited-time-in-order-to-avoid-m
// 
// 
//require('vendor/autoload.php');
//use Jefs42\LibreTranslate;
// <br /><b>Warning</b>:  
// Invalid argument supplied for foreach() in <b>
// /var/www/html/factux_44/vendor/jefs42/libretranslate/src/LibreTranslate.php</b> 
// on line <b>119</b><br />Home
//
//    $translator = new LibreTranslate();
//
//// specify server with alternate port
////    $translator = new LibreTranslate("https://libretranslate", 5042);
//    $translator = new LibreTranslate("http://127.0.0.1", 5000);
//
//// use localhost, default port, but override default languages used in translations
//    $translator = new LibreTranslate(null, null, 'de', 'it');
//    
//    vardump($translator);

function _ttt($frase) {

    if ($frase == '' || $frase == null || $frase == "null") {
        return $frase;
    }

    // Esto me causo que mi disco duro se llene 
    // 
    // use locally installed LibreTranslate server on port 5000 with default language settings
#    $translator = new LibreTranslate();
// specify server with alternate port
//    $translator = new LibreTranslate("https://libretranslate", 5042);
//    $translator = new LibreTranslate("http://127.0.0.1", 5000, "en", "fr");
#    $translator = new LibreTranslate("http://192.168.0.2", 5000, "en", "fr");
// use localhost, default port, but override default languages used in translations
//    $translator = new LibreTranslate(null, null, 'en', 'es');
    // translate text using current default source/target languages
//    $translatedText = $translator->translate("My name is home");
// specifally request languages to use in translation.
// eg. from English to German
//    $translatedText = $translator->translate('Home');
#    $translatedText = $translator->translate($frase);
// translate multiple texts in one call
// returns array of translated texts
//    $translatedText = $translator->translate(["My name is jefs42", "Where is the bathroom?"]);
#    return $translatedText;
}

/**
 * Translations
 * https://www.php.net/manual/en/book.gettext.php
 * https://www.mclibre.org/consultar/php/lecciones/php-gettext.html
 * 
 * https://translation2.paralink.com/
 * https://www.translator.eu/
 * ne
 * https://libretranslate.com/

 */
//http://www.gnu.org/server/standards/translations/es/guias.html#convertir-po
// https://www.php.net/manual/fr/book.gettext.php
//https://mlocati.github.io/
//https://translationproject.org/team/es.html
//https://translationproject.org/domain/index.html
//https://www.freetranslations.org/
//https://userbase.kde.org/Lokalize
//https://poedit.net/
//
//https://pubs.opengroup.org/onlinepubs/9699919799/
//
//     // https://github.com/lecto-ai/docs/blob/main/examples/php/guzzle.php
//


function _tr($frase, $lang = false, $contexto = null) {
    global $u_id, $u_rol, $c;

    if ($contexto === NULL) {
        $contexto = $c;
    }

    if ($frase == '') {
        return $frase;
    }


    // quito espacios al inicio y al final    
    $frase = trim($frase);

    // si es un numero no traducir 
    // si el usuario no tiene idioma definido, cojemos el idioma por defecto del sistema 
    if ($lang) {
        $language = $lang;
    } else {

        $language = (users_field_contact_id("language", $u_id)) ? users_field_contact_id("language", $u_id) : _options_option("config_system_lang_default");
    }

    /**
     * busco la frase en _content
     *      
     * si encuentro 
     *      - busco su traduccion en _traductions
     *          si hay traduccion
     *              - devuelvo la traducion
     *          sino
     *              si estoy en desarrollo
     *                  - registro la traduccion 
     *              sino
     *                 - muestro la frase como viene
     *              fin                          
     *          fin
     *  
     *  sino
     *      - registro en _content
     *          - si registro 
     *              - busco la brase en _content
     *          - sino
     *              - muestro la frase como viene
     *          - fin
     * 
     *  fin   
     * 
     * retur $traduction
     */
    // Busco la frase
    if (_content_by_frase($frase)) {

        // busco la traduccion
        if (_translations_by_content_language($frase, $language)) {
            $r = _translations_by_content_language($frase, $language);
        } else {

            // busco en el diccionario             
            //$tr_from_diccionario = _diccionario_search_translation_by_content_lang($frase , $language);    
            $tr_from_diccionario = false;

            // agrego la traduccion del diccionario a mis traducciones
            //if( $tr_from_diccionario ){
            //  _translations_add($frase , $language , $tr_from_diccionario); 
            //}else{
            // si no hay en el diccionario agrego la frase 
            // pero esto agrega la frase en ingles, hay q decidir si se quiere hacer eso o no
            //_translations_add($frase , $language , $frase)
            // }
            // si no hay en la tabla traducciones, busco en la tabla diccionario
            // _translations_add($frase , $language , $frase) ; 
            //$r = _translations_by_content_language($frase , $language) ;
            $r = "[$frase]";
        }
        // si no hallo, la registro
    } else {
        // agrego la frase
        $frase_id = _content_add($frase, $contexto);
        ############################################################################
        ############################################################################
        ############################################################################
        $level = 1; // 5 niveles: 1 bajo, 2 medio, 3 alto, 4 atencion, 5 critico
        $date = null;
        //$u_id
        //$u_rol , 
        $c = "_content";
        $a = "add";
        $w = null;
        $description = "Add frase [$frase] in _content";
        $doc_id = $frase_id;
        $crud = "create";
        $error = (isset($error)) ? json_encode($error) : null;
        $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
        $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
        $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
        $ip4 = get_user_ip();
        $ip6 = get_user_ip6();
        $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

        try {
            logs_add(
                    $level, $date, $u_id, $u_rol, $c, $a, $w,
                    $description, $doc_id, $crud, $error,
                    $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
            );
        } catch (Exception $exc) {
            $exc->getTraceAsString();
        }

        ############################################################################
        ############################################################################
        ############################################################################
        $r = "[" . _content_by_frase($frase) . "]";
    }

    $resp = str_replace('&amp;', '&', $r);

    return (config_system_lang_debug()) ? "-" : ($resp);

    // return (_options_option('debug_lang')) ? "--" : $r ;
}

function _t($frase, $lang = null) {
    global $c; // contexto o controller
    echo (config_system_lang_debug()) ? "-" : _tr($frase, $lang, $c);
}

/**
 * 
 * @param type $t
 * @param type $l
 * @return type
 */
function _trc($t, $l = null) {
    global $c;
    // https://www.php.net/manual/en/function.mb-detect-encoding.php
    // Detecta el chatset
    //$in_charset = mb_detect_encoding($t); 
//    $out_charset = "iso-8859-1";
    //return iconv($in_charset , $out_charset , $t);
    //return $in_charset;   
    return (DEBUG_LANG) ? "-" : (_tr($t, $l, $c));
//    return (DEBUG_LANG) ? "-" : (_tr($t, $l, $c));
}

function _trt($t, $l = null) {
    return $t;
}

function pdf_tr($text, $lang = false) {
    return (_tr($text, $lang));
}
