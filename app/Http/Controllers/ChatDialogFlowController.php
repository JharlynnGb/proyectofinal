<?php

namespace App\Http\Controllers;


//paquetes de Google
use Google\ApiCore\ApiException;
use Google\Cloud\Dialogflow\V2\Intent;
use Google\Cloud\Dialogflow\V2\IntentView;
use Google\Cloud\Dialogflow\V2\IntentsClient;
use Google\Cloud\Dialogflow\V2\Intent_Message;
use Google\Cloud\Dialogflow\V2\Intent_Message_Text;
use Google\Cloud\Dialogflow\V2\Intent_TrainingPhrase;
use Google\Cloud\Dialogflow\V2\Intent_TrainingPhrase_Part;
use Google\Cloud\Dialogflow\V2\AgentsClient;
use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\QueryInput;
use Google\Cloud\Dialogflow\V2\TextInput;

use GuzzleHttp\Client;


use Illuminate\Http\Request;

class ChatDialogFlowController extends Controller
{



    public function interactWithChatbot(Request $request)
    {
        
        $userMessage = $request->input('message', 'Mensaje predeterminado si no se proporciona uno');


        // Lee las credenciales desde el archivo JSON
        $keyFilePath = storage_path('alfonso-ugarte-tvqm-7bc1f05c738e.json');
        $sessionsClient = new SessionsClient(['credentials' => $keyFilePath]);

        $session = $sessionsClient->sessionName('alfonso-ugarte-tvqm', uniqid());

        $textInput = new TextInput();
        $textInput->setText($userMessage); // Configura el texto del usuario
        $textInput->setLanguageCode('es'); // Cambia esto según tu idioma

        $queryInput = new QueryInput();
        $queryInput->setText($textInput);

        // Envía la solicitud a Dialogflow
        $response = $sessionsClient->detectIntent($session, $queryInput);

        // Accede a los resultados a través de getQueryResult()
        $queryResult = $response->getQueryResult();
        $botResponse = $queryResult->getFulfillmentText();

        $sessionsClient->close();

        // Devuelve la respuesta al usuario
        return response()->json(['message' => $botResponse]);
        
    }
}
