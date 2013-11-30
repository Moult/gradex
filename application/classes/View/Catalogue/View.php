<?php

class View_Catalogue_View extends View_Layout
{
    public function navigation()
    {
        $current_page_text = 'Bachelor: Foo';
        return array(
            array(
                'link' => $this->baseurl().'',
                'icon' => 'catalogue',
                'text' => 'University of Sydney Architecture Catalogue',
            ),
            array(
                'link' => $this->baseurl().'',
                'icon' => 'analogue',
                'text' => 'Analogue 2013',
            ),
            array(
                'link' => '#catalogues',
                'icon' => 'student',
                'text' => $current_page_text,
                'has_subitems' => TRUE,
                'subitems' => array(
                    array(
                        'link' => 'blah',
                        'text' => 'Bachelors: Flinders St Station'
                    ),
                    array(
                        'link' => 'blah',
                        'text' => 'Masters: Beach City'
                    ),
                    array(
                        'link' => 'blah',
                        'text' => 'Masters: Urban Heterodoxy'
                    ),
                    array(
                        'link' => 'blah',
                        'text' => 'Masters: The Intimate Metropolis'
                    ),
                    array(
                        'link' => 'blah',
                        'text' => 'Masters: National Centre for Cultural Competence'
                    ),
                )
            )
        );
    }

    public function title()
    {
        return $this->title;
    }

    public function subtitle()
    {
        return $this->subtitle;
    }

    public function has_subtitle()
    {
        return (bool) empty($this->subtitle);
    }

    public function summary()
    {
        return $this->summary;
    }

    public function details()
    {
        return Text::auto_p($this->details);
    }

    public function picture()
    {
        return $this->picture;
    }

    public function page_title()
    {
        return $this->title.' - USYD Arch. Exhibition';
    }

    public function page_description()
    {
        $summary_exploded = explode("\n", $this->summary);
        return $summary_exploded[0];
    }

    public function projects()
    {
        $projects = array();
        foreach ($this->projects as $project)
        {
            $projects[] = array(
                'name' => $project->name,
                'author' => $project->author,
                'thumbnail' => str_replace(DOCROOT, '', $project->thumbnail)
            );
        }
    }
}
