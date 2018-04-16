<?php

namespace App;

use Exception;

// USE ONLY SERVER INVIRERMENT


//THIS PARAGRAPH FOR CONTROLLER
//////////////////////////////////////
//try {
//    $result = $this->EmailChecker->checkEmail($input['email']);
//
//    if ($result['Exception']) {
//        session()->put('error', $result['Exception']);
//        return back()->withInput();
//    }
//
//    if ($result) {
//        session()->put('success', "This email is valid");
//        return back()->withInput();
//    } else {
//        session()->put('error', "This email is not valid");
//        return back()->withInput();
//    }
//} catch (Exception $ex) {
//    session()->put('error', "Error produce in verification");
//    return back()->withInput();
//}

ini_set('max_execution_time', 0);
ini_set('memory_limit', '1288M');
set_time_limit(0);

class EmailChecker {

    public $domain = 'http://localhost/laravel_project_royal_shop/';
    public $mailfrom = 'ronglua83@gmail.com';
    public $rcptto;
    public $mx;
    public $ip;

    public function __construct() {
        $this->ip = '0.0.0.0';
    }

    public function checkEmail($email = null) {
        $this->rcptto = $email;
        $array = explode('@', $this->rcptto);
        $dom = $array[1];

        if (getmxrr($dom, $mx)) {
            if ($mx) {
                $this->mx = $mx[rand(0, count($mx) - 1)];
            }
            return $this->processRange($this->ip);
        }

        return FALSE;
    }

    private function asyncRead($sock) {
        $read_sock = array($sock);
        $write_sock = NULL;
        $except_sock = NULL;

        try {
            if (socket_select($read_sock, $write_sock, $except_sock, 5) != 1) {
                return FALSE;
            }

            $ret = socket_read($sock, 512);
            return $ret;
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    private function smtpConnect($mta, $scr_ip) {
        $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($sock == FALSE) {
            return array(FALSE, 'Unable to open Socket');
        }

        try {
            if (!socket_bind($sock, $scr_ip)) {
                return array(FALSE, 'Unable to bind to SRC IP');
            }
        } catch (Exception $ex) {
            return array('Exception' => 'Some errors Produce! Please try again!');
        }

        $timeout = array('sec' => 100, 'usec' => 0);
        socket_set_option($sock, SOL_SOCKET, SO_RCVTIMEO, $timeout);

        socket_set_nonblock($sock);

        @socket_connect($sock, $mta, 25);

        $ret = $this->asyncRead($sock);

        if ($ret === FALSE) {
            return array(FALSE, 'Inital read timed out');
        }

        if (!preg_match('/^220/', $ret)) {
            return array(FALSE, $ret);
        }

//        NOW do the HELLO
        socket_write($sock, "HELLO " . $this->domain . "\r\n");
        $ret = $this->asyncRead($sock);

        if ($ret === FALSE) {
            return array(FALSE, 'EHLO timed out');
        }

        if (!preg_match('/^250/', $ret)) {
            return array(FALSE, $ret);
        }

//        NOW MAIL FROM
        socket_write($sock, "MAIL FROM:<" . $this->mailfrom . ">\r\n");
        $ret = $this->asyncRead($sock);

        if ($ret === FALSE) {
            return array(FALSE, 'From timed out');
        }

        if (!preg_match('/^250/', $ret)) {
            return array(FALSE, $ret);
        }

//        NOW RCPT TO
        socket_write($sock, "RCPT TO:<" . $this->rcptto . ">\r\n");
        $ret = $this->asyncRead($sock);

        if ($ret === FALSE) {
            return array(FALSE, 'Rcpt to timed out');
        }

        if (!preg_match('/^250/', $ret)) {
            return array(FALSE, $ret);
        }

//        ALL GOOD
        socket_close($sock);
        return array(TRUE, $ret);
    }

    private function processRange($ip) {
        try {
            list($ret, $msg) = $this->smtpConnect($this->mx, $ip);
            $msg = trim($msg);
            return $ret;
        } catch (Exception $ex) {
            return array('Exception' => 'Some errors Produce! Please try again!');
        }
    }

}
