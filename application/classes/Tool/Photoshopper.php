<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

class Tool_Photoshopper extends Driver_Photoshopper implements Cavis\Core\Tool\Photoshopper
{
    public function get_width()
    {
        return $this->get_dimensions()[1];
    }
}
