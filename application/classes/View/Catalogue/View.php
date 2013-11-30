<?php

class View_Catalogue_View extends View_Layout
{
    public function navigation()
    {
        if (Route::name($this->request->route()) === 'view catalogue urban heterodoxy')
        {
            $current_page_text = 'Masters: Urban Heterodoxy';
        }
        elseif (Route::name($this->request->route()) === 'view catalogue the intimate metropolis')
        {
            $current_page_text = 'Masters: The Intimate Metropolis';
        }
        elseif (Route::name($this->request->route()) === 'view catalogue national centre for cultural competence')
        {
            $current_page_text = 'Masters: National Centre for Cultural Competence';
        }
        elseif (Route::name($this->request->route()) === 'view catalogue beach city')
        {
            $current_page_text = 'Masters: Beach City';
        }
        elseif (Route::name($this->request->route()) === 'view catalogue flinders st station')
        {
            $current_page_text = 'Bachelors: Flinders St Station';
        }

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
                        'link' => $this->baseurl().'flinders-st-station/',
                        'text' => 'Bachelors: Flinders St Station'
                    ),
                    array(
                        'link' => $this->baseurl().'beach-city/',
                        'text' => 'Masters: Beach City'
                    ),
                    array(
                        'link' => $this->baseurl().'urban-heterodoxy/',
                        'text' => 'Masters: Urban Heterodoxy'
                    ),
                    array(
                        'link' => $this->baseurl().'the-intimate-metropolis/',
                        'text' => 'Masters: The Intimate Metropolis'
                    ),
                    array(
                        'link' => $this->baseurl().'national-centre-for-cultural-competence/',
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
        return $projects;
    }
}
