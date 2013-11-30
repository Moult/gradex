<?php

class Repository_Catalogue
{
    public function get_data_from_catalogue($catalogue_id)
    {
        $catalogue = DB::select('title', 'subtitle', 'summary', 'details', 'picture')
            ->from('categories')
            ->where('id', '=', $catalogue_id)
            ->limit(1)
            ->as_object()
            ->execute()
            ->current();

        return array(
            $catalogue->title,
            $catalogue->subtitle,
            $catalogue->summary,
            $catalogue->details,
            $catalogue->picture
        );
    }

    public function get_projects_from_catalogue($catalogue_id)
    {
        return DB::select('*')
            ->from('projects')
            ->where('category', '=', $catalogue_id)
            ->as_object()
            ->execute();
    }
}
