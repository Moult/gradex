<?php

class View_Project_View extends View_Layout
{
    public function navigation()
    {
        if ( (int) $this->project_data->category === 2)
        {
            $current_page_text = 'Masters: Urban Heterodoxy';
        }
        elseif ( (int) $this->project_data->category === 3)
        {
            $current_page_text = 'Masters: The Intimate Metropolis';
        }
        elseif ( (int) $this->project_data->category === 4)
        {
            $current_page_text = 'Masters: National Centre for Cultural Competence';
        }
        elseif ( (int) $this->project_data->category === 5)
        {
            $current_page_text = 'Masters: Beach City';
        }
        elseif ( (int) $this->project_data->category === 6)
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

    public function page_title()
    {
        return $this->project_data->name.' - USYD Arch. Exhibition';
    }

    public function meta_description()
    {
        return $this->project_data->meta_description;
    }

    public function name()
    {
        return $this->project_data->name;
    }

    public function author()
    {
        return $this->project_data->author;
    }

    public function has_website_or_email()
    {
        return (bool) ! empty($this->project_data->website)
            OR ! empty($this->project_data->email);
    }

    public function has_website()
    {
        return (bool) ! empty($this->project_data->website);
    }

    public function has_email()
    {
        return (bool) ! empty($this->project_data->email);
    }

    public function website()
    {
        return $this->project_data->website;
    }

    public function email()
    {
        return $this->project_data->email;
    }

    public function summary()
    {
        return Text::auto_p($this->project_data->summary);
    }

    public function description()
    {
        return str_replace('<p>', '<p class="readmore">', Text::auto_p($this->project_data->description));
    }

    public function hero_image()
    {
        return str_replace(DOCROOT, '', $this->project_data->file);
    }

    public function hero_image_width()
    {
        list($width) = getimagesize($this->project_data->file);
        return $width;
    }

    public function hero_image_height()
    {
        $imagedata = getimagesize($this->project_data->file);
        return $imagedata[1];
    }

    public function supplementary_images()
    {
        $supplementary_images = array();
        for ($i = 0; $i < 3; $i++)
        {
            if ( ! empty($this->project_data->{'supplementary_file_'.$i}))
            {
                list($width, $height) = getimagesize($this->project_data->{'supplementary_file_'.$i});
                $supplementary_images[] = array(
                    'number' => $i,
                    'image' => str_replace(DOCROOT, '', $this->project_data->{'supplementary_file_'.$i}),
                    'width' => $width,
                    'height' => $height
                );
            }
        }
        return $supplementary_images;
    }
}
