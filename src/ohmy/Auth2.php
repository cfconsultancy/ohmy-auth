<?php namespace ohmy;

/*
 * Copyright (c) 2014, Yahoo! Inc. All rights reserved.
 * Copyrights licensed under the New BSD License.
 * See the accompanying LICENSE file for terms.
 */

use ohmy\Auth2\Flow\TwoLegged,
    ohmy\Auth2\Flow\ThreeLegged,
    ohmy\Http\Curl;

class Auth2 {

    public static function init($type) {

        $curl = new Curl;
        switch($type) {
            case 2:
                return new TwoLegged(function($resolve) {
                    $resolve(array());
                }, $curl);
                break;
            case 3:
                return new ThreeLegged(function($resolve) {
                    $resolve(array(
                        'client_id'     => '',
                        'client_secret' => '',
                        'redirect_ uri' => '',
                        'response_type' => 'code',
                        'code'          => isset($_REQUEST['code']) ? $_REQUEST['code'] : null,
                        'scope'         => ''
                    ));
                }, $curl);
                break;
            default:
        }
    }

}