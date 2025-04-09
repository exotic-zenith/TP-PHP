<?php
class SessionManager {
    private static $instance = null;
    private $sessionStarted = false;
    private const VISIT_COUNT_KEY = 'visit_count';
    private const FIRST_VISIT_KEY = 'first_visit';
    private function __construct() {
        $this->startSession();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function startSession() {
        if (!$this->sessionStarted) {
            session_start();
            $this->sessionStarted = true;
            $this->initializeSession();
        }
    }

    private function initializeSession() {
        if (!isset($_SESSION[self::VISIT_COUNT_KEY])) {
            $_SESSION[self::VISIT_COUNT_KEY] = 0;
        }
        if (!isset($_SESSION[self::FIRST_VISIT_KEY])) {
            $_SESSION[self::FIRST_VISIT_KEY] = date('Y-m-d H:i:s');
        }
    }

    public function incrementVisitCount() {
        $_SESSION[self::VISIT_COUNT_KEY]++;
    }

    public function getVisitCount() {
        return $_SESSION[self::VISIT_COUNT_KEY];
    }

    public function getFirstVisitDate() {
        return $_SESSION[self::FIRST_VISIT_KEY];
    }

    public function resetSession() {
        $_SESSION[self::VISIT_COUNT_KEY] = 0;
        $_SESSION[self::FIRST_VISIT_KEY] = date('Y-m-d H:i:s');
    }

    public function destroySession() {
        session_unset();
        session_destroy();
        $this->sessionStarted = false;
    }
}
?>