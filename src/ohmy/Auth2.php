<?php namespace ohmy;

/*
 * Copyright (c) 2014, Yahoo! Inc. All rights reserved.
 * Copyrights licensed under the New BSD License.
 * See the accompanying LICENSE file for terms.
 */

use ohmy\Auth2\Flow\ThreeLegged,
    ohmy\Http\Curl\Request;

class Auth2 {

    public static function init($type) {

        $client = new Request;
        switch($type) {
            case 3:
                return new ThreeLegged(function($resolve) {
                    $resolve(array(
                        'client_id'     => '',
                        'client_secret' => '',
                        'redirect_uri'  => '',
                        'code'          => isset($_REQUEST['code']) ? $_REQUEST['code'] : null,
                        'scope'         => '',
                        'state'         => md5(mt_rand())
                    ));
                }, $client);
                break;
            default:
        }
    }

}
