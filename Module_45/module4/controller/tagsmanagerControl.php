<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fade
 * Date: 4/25/13
 * Time: 8:51 PM
 * To change this template use File | Settings | File Templates.
 */
include_once 'libs/Controller.php';

class tagsmanagerControl extends Controller{

    function __construct()
    {
        include_once('model/tagsModel.php');
        include_once('model/articleModel.php');
        include_once('model/menuModel.php');

        $tagModel = new tagsModel();
        $foodModel = new articleModel();

        //Copy from menu controller
        $item = new menuModel();
        $menu = $item->getSideBar();
        $title_url = 'Menu';
        //Show Rate Menu
        include_once('model/ratingModel.php');
        $menuRate = new ratingModel();
        //end copy


        include_once('admin/tagsmanager.php');
    }

}