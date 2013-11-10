<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

class View_Project_Submit extends View_Layout
{
    public $errors;

    public function has_errors()
    {
        $session = Session::instance();
        $this->errors = $session->get_once('errors');

        if ( ! empty($this->errors))
            return TRUE;
        else
            return FALSE;
    }

    public function errors()
    {
        $errors = array();

        foreach ($this->errors as $error)
        {
            if ($error === 'name')
            {
                $errors[] = array('error' => 'Make sure you have a project title between 1-60 letters long.');
            }
            elseif ($error === 'author')
            {
                $errors[] = array('error' => 'You must provide your full name between 1-60 letters long.');
            }
            elseif ($error === 'website')
            {
                $errors[] = array('error' => 'You need to provide a valid website url, such as http://google.com/');
            }
            elseif ($error === 'email')
            {
                $errors[] = array('error' => 'Your email address does not seem valid.');
            }
            elseif ($error === 'summary')
            {
                $errors[] = array('error' => 'You need to provide a project summary.');
            }
            elseif ($error === 'description')
            {
                $errors[] = array('error' => 'You need to provide a detailed project description.');
            }
            elseif ($error === 'file')
            {
                $errors[] = array('error' => 'Make sure you provide a main image that is less than 3MB, JPG or PNG, and at least 1200px in width.');
            }
            elseif ($error === 'supplementary_file')
            {
                $errors[] = array('error' => 'Make sure your supplementary images are less than 3MB, JPG or PNG, and at least 600px in width.');
            }
        }

        return $errors;
    }

    public function categories()
    {
        $selected_category = (isset($this->category)) ? $this->category : NULL;
        $categories = array(
            array(
                'id' => 6,
                'name' => 'Flinders St Station - Ross Anderson',
                'is_selected' => FALSE
            ),
            array(
                'id' => 2,
                'name' => 'Urban Heterodoxy - Michael Zanardo',
                'is_selected' => FALSE
            ),
            array(
                'id' => 3,
                'name' => 'The Intimate Metropolis - Stephen Collier',
                'is_selected' => FALSE
            ),
            array(
                'id' => 4,
                'name' => 'National Centre for Cultural Competence - Michael Tawa',
                'is_selected' => FALSE
            ),
            array(
                'id' => 5,
                'name' => 'Beach City - Dagmar Reinhardt',
                'is_selected' => FALSE
            ),
        );

        foreach ($categories as $key => $category)
        {
            if ($category['id'] == $selected_category)
            {
                $categories[$key]['is_selected'] = TRUE;
            }
        }

        return $categories;
    }
}
