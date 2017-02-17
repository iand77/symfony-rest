<?php

namespace APIBundle\Controller;

use FOS\RestBundle\Routing\ClassResourceInterface;

class UsersController implements ClassResourceInterface
{
    // ...

    public function cgetAction()
    {
      return (stdClass) ["hello"];

    } // "get_users"     [GET] /users

    public function newAction()
    {} // "new_users"     [GET] /users/new

    public function getAction($slug)
    {} // "get_user"      [GET] /users/{slug}

    // ...
    public function getCommentsAction($slug)
    {} // "get_user_comments"    [GET] /users/{slug}/comments

    // ...
}
