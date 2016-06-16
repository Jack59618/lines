<?php

App::uses('AppModel', 'Model');

class Line extends AppModel {

    var $name = 'Line';
    var $actsAs = array(
    );

    function afterSave($created, $options = array()) {
        
    }

}
