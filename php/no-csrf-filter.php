<?php

// ruleid: no-csrf-filter
class UserStoreAction extends BaseController
{
    public function __construct($a, $b, $c)
    {
        $this->beforeFilter('admin');
    }

    public function action()
    {
        doSomething();
    }
}

// ok: no-csrf-filter
class SafeUserStoreAction extends BaseController  {
    public function __construct() {
        $this->beforeFilter('csrf');
    }
}

// ruleid: no-csrf-filter
class UserupdateAction extends BaseController  {

    private string $property;

    public function __construct() {
        $this->beforeFilter('csrffff');
    }
}

// ruleid: no-csrf-filter
class UserupdateYoAction extends BaseController  {

    private string $property;

    public function __construct() {
        $this->beforeFilter('csrffff');
    }
}

// ruleid: no-csrf-filter
class UpdateYoAction extends BaseController  {

    private string $property;

    public function __construct() {
        $this->beforeFilter('csrffff');
    }
}

// ok: no-csrf-filter
class SafeUserUpdateAction extends BaseController  {
    public function __construct() {
        $this->beforeFilter('csrf');
    }
}

// ruleid: no-csrf-filter
class UserDeleteAction extends BaseController  {
    public function __construct() {
        $this->beforeFilter('untrack');
    }
}

// ok: no-csrf-filter
class SafeDeleteAction extends BaseController  {
    public function __construct() {
        $this->beforeFilter('csrf');
    }
}

// ok: no-csrf-filter
class UserIndexAction extends BaseController {
    public function __construct() {

    }
}