<?php
class ErrorProcessor {
    function ErrorProcessor() {}
    
    function generateError($params = null) {
        ErrorProcessor::printErrors($params);
    }

    function printErrors($params) {
        ?><html><head><title>NS - Fatal Error</title></head><body>
        <h1>Fatal Error</h1>
        <div><p><?php if(is_array($params)) {
            foreach($params as $k => $v) {
                print $v. "<br/>\n";
            }
        } else {
            print $params;
        } ?></p></div></body></html>
        <?
    }

        
}
?>
