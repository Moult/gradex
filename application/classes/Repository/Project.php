<?php

class Repository_Project
{
    public function get_data_from_project_slug($project_slug)
    {
        return DB::select('*')
            ->from('projects')
            ->where('slug', '=', $project_slug)
            ->limit(1)
            ->as_object()
            ->execute()
            ->current();
    }
}
