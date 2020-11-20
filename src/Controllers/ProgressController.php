<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\ProgressModel;
use Konwersatorium\Exceptions\NotFoundException;

class ProgressController extends AbstractController {

    public function getAll($lang) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get progress data
            $progressModel = new ProgressModel($this->conn);
            $progressMainArr = $progressModel->getProgressMain($lang);
            $progressStatArr = $progressModel->getProgressStat($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'progressMainArr' => $progressMainArr,
                'progressStatArr' => $progressStatArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        return $this->render('progress-details.twig', $properties);
    }

}

