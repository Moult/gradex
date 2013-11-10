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
    public function save_image($name, $author, $website, $email, $summary, $description, $thumbnail_path, $file_path, $supplementary_file_paths, $category_id)
    {
        for ($i = 0; $i < 3; $i++) {
            if ( ! isset($supplementary_file_paths[$i]))
            {
                $supplementary_file_paths[$i] = '';
            }
        }
        DB::insert('projects', array(
                'name',
                'author',
                'website',
                'email',
                'summary',
                'description',
                'thumbnail',
                'file',
                'supplementary_file_1',
                'supplementary_file_2',
                'supplementary_file_3',
                'category'))
            ->values(array(
                $name,
                $author,
                $website,
                $email,
                $summary,
                $description,
                $thumbnail_path,
                $file_path,
                $supplementary_file_paths[0],
                $supplementary_file_paths[1],
                $supplementary_file_paths[2],
                $category_id))
            ->execute();
    }

    /**
     * @return mixed string bool full path to uploaded file or FALSE if failed
     */
    public function save_file(Cavis\Core\Data\File $file)
    {
        $config = Kohana::$config->load('upload');

        if ( ! empty($file->full_path))
        {
            $dest_path = $config->get('directory').uniqid().'.png';
            rename($file->full_path, $dest_path);
            return $dest_path;
        }

        return Upload::save(array(
            'name' => $file->name,
            'type' => $file->mimetype,
            'tmp_name' => $file->tmp_name,
            'error' => $file->error_code,
            'size' => $file->filesize_in_bytes
        ), uniqid().'_'.$file->name, $config->get('directory'));
    }
}
