<?php


// require_once BASE_PATH.'/models/connection.php';

class ApiKeyModel{


         public function processAPIModels($api_key){
                    
//primero verificamos si la api key existe
          $url="https://cloud.factux.org/index.php?c=api&a=api_exists_api_key&api_key=$api_key";

// Inicializar cURL
$ch = curl_init();

// Configurar opciones de cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // No verificar el certificado SSL (usar solo en desarrollo)

// Ejecutar cURL
$response = curl_exec($ch);

if ($response === false) {
    die('Error en cURL: ' . curl_error($ch));
}

// Cerrar cURL
curl_close($ch);

$data=$response;

         if ($data=="empty") {
           
            $error_api=array(
                'error'=>'-- error : APi key not found.',
            );
         return $error_api;
        }
//  ahora obtenemos todos los datos de la Api
$url="https://cloud.factux.org/index.php?c=api&a=api_details_key&api_key=$api_key";

// Inicializar cURL
$ch = curl_init();

// Configurar opciones de cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // No verificar el certificado SSL (usar solo en desarrollo)

// Ejecutar cURL
$response = curl_exec($ch);

if ($response === false) {
    die('Error en cURL: ' . curl_error($ch));
}

// Cerrar cURL
curl_close($ch);

// Convierte la cadena a un array línea por línea
$array = [];
$lines = explode("\n", $response);

// Omite la primera y última línea (Array y )
foreach (array_slice($lines, 1, -1) as $line) {
    // Elimina espacios y caracteres innecesarios
    $line = trim($line);
    if (empty($line) || $line == '(' || $line == ')') {
        continue;
    }

    // Divide la línea en clave y valor
    list($key, $value) = explode("=>", $line, 2);
    $key = trim($key, "[] ");
    $value = trim($value, " ");

    // Maneja valores vacíos
    if ($value === '') {
        $value = null;
    }

    // Agrega el par clave-valor al array
    $array[$key] = $value;
}

$existing_key=$array;
      
          //  vemos si cumple con los parametros establecidos
   date_default_timezone_set('America/New_York');
   $id=$existing_key['id'];
   $status=$existing_key['status'];
$last_update_date= new DateTime($existing_key['last_request']);
$limit_period=$existing_key['limit_period'];
$requests_limit=$existing_key['requests_limit'];
$requests_made=$existing_key['requests_made'];
$permission=$existing_key['crud'];


// se verifica si esta activada
if ($status!=1) {
    $error_api=array(
        'error'=>'-- error : APi key not activated.',
    );
    return $error_api;
}
 

// Obtener la fecha actual
$currentDate = new DateTime();



// Calcular la diferencia entre las dos fechas
$interval = $currentDate->diff($last_update_date);

// Convertir la diferencia a segundos
$seconds_passed = ($interval->days * 24 * 60 * 60) +
($interval->h * 60 * 60) +
($interval->i * 60) +
$interval->s;


//  calculamos para ver si ha pasado mas del periodo limite

if ($seconds_passed >= $limit_period) {

    //  si no ha pasado mas tiempo del periodo limite, se reinicia el contador del numero de 
    // solicitudes a "1"

   $new_data=1;
   api_update_requests_made($id,$new_data);
   $new_data=$currentDate->format('Y-m-d H:i:s');
   api_update_last_request($id,$new_data);
} 
    //  si no ha pasado mas tiempo del periodo limite, se verifica si la cantidad de solicitudes hechas
    // es menore a la cantidad de solicitudes permitidas , si es menor se agrega una unidad al contador, 
    // si no es menor , osea si ya alcanzo el numero de solicitudes, devuelve un "error"
else {
     
    if ($requests_made < $requests_limit) {
   
      $new_data=$requests_made+1;
      api_update_requests_made($id,$new_data);
$new_data=$currentDate->format('Y-m-d H:i:s');
      api_update_last_request($id,$new_data);

    }else {
                $error_api=array(
                    'error'=>'-- error : No more requests are allowed for now.',
                );
                 return $error_api;
    }
}
        return $existing_key;

         }





// ------------------------

}