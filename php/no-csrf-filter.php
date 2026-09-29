<?php

// ruleid: no-csrf-filter
class UserStoreAction extends BaseController
{
    public function __construct($a, $b, $c)
    {
        $this->middleware('admin');
    }

    public function action()
    {
        doSomething();
    }
}

// ok: no-csrf-filter
class SafeUserStoreAction extends BaseController  {
    public function __construct() {
        $this->middleware('csrf');
    }
}

// ruleid: no-csrf-filter
class UserupdateAction extends BaseController  {

    private string $property;

    public function __construct() {
        $this->middleware('csrffff');
    }
}

// ruleid: no-csrf-filter
class UserupdateYoAction extends BaseController  {

    private string $property;

    public function __construct() {
        $this->middleware('csrffff');
    }
}

// ruleid: no-csrf-filter
class UpdateYoAction extends BaseController  {

    private string $property;

    public function __construct() {
        $this->middleware('csrffff');
    }
}

// ok: no-csrf-filter
class SafeUserUpdateAction extends BaseController  {
    public function __construct() {
        $this->middleware('csrf');
    }
}

// ruleid: no-csrf-filter
class UserDeleteAction extends BaseController  {
    public function __construct() {
        $this->middleware('untrack');
    }
}

// ok: no-csrf-filter
class SafeDeleteAction extends BaseController  {
    public function __construct() {
        $this->middleware('csrf');
    }
}

// ok: no-csrf-filter
class UserIndexAction extends BaseController {
    public function __construct() {

    }
}