<?php

class Controller_Catalogue extends Controller_Core
{
    public function action_view()
    {
        $catalogue_id = $this->request->param('catalogue_id');
        $repository = new Repository_Catalogue;
        list($this->view->title,
            $this->view->subtitle,
            $this->view->summary,
            $this->view->details,
            $this->view->picture) = $repository
            ->get_data_from_catalogue($catalogue_id);
        $this->view->projects = $repository
            ->get_projects_from_catalogue($catalogue_id);
    }
}
