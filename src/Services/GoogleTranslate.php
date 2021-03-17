<?php

namespace Konwersatorium\Services;

//use Google\Cloud\Translate\TranslateClient;
use Google\Cloud\Translate\V2\TranslateClient;
use Konwersatorium\Core\Config;

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

    private $config = [];

    public function __construct() {
        $this->config = [
            'keyFilePath' => __DIR__ . '/../../config/config-google-translate.json',
            'projectId' => Config::getConfig()->get('googleTransProjectId'),
        ];
    }

    function translate($text, $target_language) {
        $translate = new TranslateClient($this->config);
        $result = $translate->translate($text, [
            'target' => $target_language
        ]);
    return $result['text'];
    }

}