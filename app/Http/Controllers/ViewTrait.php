<?php
/**
 * @author Kevin Saunders
 * Date: 14/07/2015
 */

namespace app\Http\Controllers;

/**
 * Convenience functions for the controllers
 * Class ViewTrait
 * @package app\Http\Controllers
 */
trait ViewTrait
{

    /**
     * Get the view with the extra page variables
     * @param $view_name
     * @param array $extra_arguments
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function getView($view_name, $extra_arguments = [])
    {
        $left_image = $this->getLeftGutterImage();
        $review = $this->getReview();
        $blog_menu = $this->blog->getBlogMenu();
        if (!isset($extra_arguments['include_right'])) {
            $extra_arguments['include_right'] = true;
        }

        $mail_chimp_u = env('MAILCHIMP_U');
        $mail_chimp_id = env('MAILCHIMP_ID');

        $hide_side_bar_mailchimp = isset($extra_arguments['hide_side_bar_mailchimp']) ? $extra_arguments['hide_side_bar_mailchimp'] : false;

        $page_variables = array_merge(compact('left_image', 'review',
            'blog_menu','mail_chimp_u','mail_chimp_id','hide_side_bar_mailchimp'), $extra_arguments);
        return view($view_name,$page_variables );
        
    }

    /**
     * Get a random left gutter image
     * @return string
     */
    private function getLeftGutterImage()
    {
        return '/images/left/' . rand(1, 5) . '.jpg';
    }

    /**
     * Get a random review
     * @return \App\Models\Reviews
     */
    private function getReview()
    {
        $all = $this->review->all();
        return $all[rand(1, count($all) - 1)];
    }
}