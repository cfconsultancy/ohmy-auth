<?php namespace ohmy\Auth2;

/*
 * Copyright (c) 2014, Yahoo! Inc. All rights reserved.
 * Copyrights licensed under the New BSD License.
 * See the accompanying LICENSE file for terms.
 */

use ohmy\Auth\Promise;

abstract class Flow extends Promise {
    public function set($key, $value) {
        switch($key) {
            case 'client_id':
            case 'id':
                $this->value['client_id'] = $value;
                break;
            case 'client_secret':
            case 'secret':
                $this->value['client_secret'] = $value;
                break;
            case 'callback':
            case 'redirect':
            case 'redirect_uri':
                $this->value['redirect_uri'] = $value;
                break;
            default:
                $this->value[$key] = $value;
        }
        return $this;
    }

    public abstract function access($token);
}
