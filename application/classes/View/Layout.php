<?php
defined('SYSPATH') OR die('No direct script access.');

/**
 * Sets up partials, essentially a core file for KOstache.
 */
class View_Layout
{
    public $page_title = 'University of Sydney Architecture Graduation Exhibition';
    public $meta_description = 'The University of Sydney Architecture faculty presents the annual online catalogue of its graduating bachelors and masters students.';

    /**
     * The base URL of the website.
     *
     * @return string
     */
    public function baseurl()
    {
        return URL::base();
    }

    /**
     * The current page that we are on
     *
     * @return string
     */
    public function currenturl()
    {
        return $this->request->uri();
    }
}
