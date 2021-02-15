<?php
    namespace Konwersatorium\Exceptions;

    use Exception;

    /* 
    * NotFoundException is used if data were not found.
    * It may be used in such cases as throwing exception if data were not found in config file or DB returned an empty result set.
    */
    class LogicException extends Exception {
        
    }
?>