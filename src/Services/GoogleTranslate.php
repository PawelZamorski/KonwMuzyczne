<?php

namespace Konwersatorium\Services;

//use Google\Cloud\Translate\TranslateClient;
use Google\Cloud\Translate\V2\TranslateClient;


// Authentication by URL: https://www.googleapis.com/language/translate/v2/?key=insert_key&q=Dzie%C5%84%20dobry&source=pl&target=en

// TODO: handle error
class GoogleTranslate {
    /* Authenticating as a service account
    * Passing credentials using code:
    * If your application runs outside Google Cloud environments that provide a default service account, you need to manually create one. 
    * 
    */

    # Explicitly use service account credentials by specifying the private key file.
    // TODO move to config file
    private $config = [
        'keyFilePath' => 'C:\Users\MoioM\Desktop\WEBSITES\Bogna\GoogleTranslation\angular-ecommerce-57e73eb69482.json',
        'projectId' => 'angular-ecommerce-300621',
    ];

    function translate($text, $target_language) {
        $translate = new TranslateClient($this->config);
        $result = $translate->translate($text, [
            'target' => $target_language
        ]);

    return $result['text'];
    }

}