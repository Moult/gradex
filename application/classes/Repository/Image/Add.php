<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

class Repository_Image_Add implements Cavis\Core\Usecase\Image\Add\Repository
{
    public function does_category_exist($id)
    {
        return (bool) DB::select('id')
            ->from('categories')
            ->where('id', '=', $id)
            ->limit(1)
            ->execute()
            ->count();
    }

    /**
     * @return int The unique id of the saved image
     */
    public function save_image($name, $thumbnail_path, $file_path, $supplementary_file_paths, $category_id)
    {

    }

    /**
     * @return mixed string bool full path to uploaded file or FALSE if failed
     */
    public function save_file(Cavis\Core\Data\File $file)
    {

    }
}
