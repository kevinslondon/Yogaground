<?php
/**
 * User: Kevin Saunders
 * Date: 14/07/2015
 * Time: 16:51
 */

namespace app\Http\Controllers;


trait ViewTrait
{

    private function getView($view_name, $extra_arguments=[])
    {
        $left_image = $this->getLeftGutterImage();
        $review = $this->getReview();
        $blog_menu = $this->blog->getBlogMenu();
        if(!isset($extra_arguments['include_right'])){
            $extra_arguments['include_right'] = true;
        }
        $page_variables = array_merge(compact('left_image', 'review','blog_menu'), $extra_arguments);
        return view($view_name,$page_variables );
    }


    private function getLeftGutterImage() {
        return '/images/left/'.rand(1,5). '.jpg';
    }

    private function getReview()
    {
        $all = $this->review->all();
        return $all[rand(1, count($all)-1)];
    }
}