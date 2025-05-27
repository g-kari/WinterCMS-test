<?php namespace Gkari\UserManagement\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * User Settings Controller
 */
class UserSettings extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the form behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the list behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Gkari.UserManagement', 'usermanagement', 'settings');
    }
}