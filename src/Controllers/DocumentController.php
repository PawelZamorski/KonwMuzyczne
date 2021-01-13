<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\OfferModel;
use Konwersatorium\Exceptions\NotFoundException;

class DocumentController extends AbstractController {

    public function getPrivacyPolicy($lang) {
        $this->getDocument($lang, 'privacypolicy.pdf');
    }

    public function getOnlinelearningPolicy($lang) {
        $this->getDocument($lang, 'onlinelearning.pdf');
    }

    // All documents must be kept in 'documents' folder and correct language subfolder
    private function getDocument($lang, $documentName) {
        try {
            // read file
            @$file = file_get_contents(__DIR__ . '/../../documents/' . $lang . '/' . $documentName); // file_get_contents returns 'false' if not found with warning
            if($file === false) throw new NotFoundException();
        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: document not found.');
        }

        header('Content-Type: application/pdf');
//        header('Content-Disposition: inline; filename="' . $filename . '"');
//        header('Content-Disposition: attachment'; filename="document_name");
//        header('Content-Transfer-Encoding: binary');
//        header('Accept-Ranges: bytes');
        echo $file;

    }


}

