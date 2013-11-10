<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

class Controller_Project extends Controller_Core
{
    public function action_submit()
    {
        if ($this->has_pressed_the_submit_button())
        {
            $session = Session::instance();
            try
            {
                $this->get_image_add_usecase()->fetch()->interact();
            }
            catch (Cavis\Core\Exception\Validation $e)
            {
                $session->set('errors', $e->get_errors());
                foreach ($this->request->post() as $key => $value)
                {
                    $this->view->$key = $value;
                }
            }
        }
    }

    private function has_pressed_the_submit_button()
    {
        return (bool) ($this->request->method() === HTTP_Request::POST);
    }

    private function get_image_add_usecase()
    {
        $image = new Cavis\Core\Data\Image;
        $supplementary_files = array();
        $category = new Cavis\Core\Data\Category;

        $image->name = $this->request->post('name');
        $image->author = $this->request->post('author');
        $image->website = $this->request->post('website');
        $image->email = $this->request->post('email');
        $image->summary = $this->request->post('summary');
        $image->description = $this->request->post('description');

        $category->id = $this->request->post('category');

        $file = $this->extract_posted_file_into_file_data('file');
        $supplementary_files[] = $this->extract_posted_file_into_file_data('supplementary_1');
        $supplementary_files[] = $this->extract_posted_file_into_file_data('supplementary_2');
        $supplementary_files[] = $this->extract_posted_file_into_file_data('supplementary_3');

        $image->file = $file;
        $image->supplementary_files = $supplementary_files;
        $image->category = $category;

        return new Cavis\Core\Usecase\Image\Add(
            array(
                'image' => $image
            ),
            array(
                'image_add' => new Repository_Image_Add
            ),
            array(
                'photoshopper' => new Tool_Photoshopper,
                'validator' => new Tool_Validator
            )
        );
    }

    private function extract_posted_file_into_file_data($post_name)
    {
        $file = new Cavis\Core\Data\File;
        $file->name = $_FILES[$post_name]['name'];
        $file->tmp_name = $_FILES[$post_name]['tmp_name'];
        $file->mimetype = $_FILES[$post_name]['type'];
        $file->filesize_in_bytes = $_FILES[$post_name]['size'];
        $file->error_code = $_FILES[$post_name]['error'];
        return $file;
    }
}
