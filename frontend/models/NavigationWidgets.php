<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
/*
 * Navigation Widgets for the frontend
 */

class NavigationWidgets {

    /**
     * Unique identifier of this page
     * @var String $pageId
     */
    public $pageId = null;

    /**
     * Top Navigation elements for a given page
     * @var Array() $cpanel_topnavigation
     */
    public $cpanel_topnavigation = null;

    /**
     * Left Navigatio Elements for a given page
     * @var Array() $cpanel_leftnavigation
     */
    public $cpanel_leftnavigation = null;

    /**
     * Create a navigation instance of a specified page
     * @param String $page_id
     */
    public function __construct($page_id) {
        $this->pageId = $page_id;
        $this->cpanel_topnavigation = $this->getFrontEndCpanelTopNav();
    }

    /**
     * Top Navigation Links for an institution of learning
     */
    public function getFrontEndCpanelTopNav() {
        $nav = Nav::widget([
                    'items' => [
                        [
                            'label' => 'Home',
                            'url' => ['site/index'],
                            'linkOptions' => [''],
                        ],
                        [
                            'label' => 'Page Admins',
                            'items' => [
                                ['label' => 'Admins', 'url' => '#'],
                                '<li class="divider"></li>',
                                '<li class="dropdown-header">User Management</li>',
                                ['label' => 'Add admin', 'url' => '#'],
                            ],
                        ],
                        [
                            'label' => 'Front-end',
                            'url' => ['pages/view&id='.$this->pageId],
                            'linkOptions' => [''],
                        ],
                    ],
                    'options' => ['class' => 'nav-pills'], // set this to nav-tab to get tab-styled navigation
        ]);

        //return the nav elements
        return $nav;
    }

}
