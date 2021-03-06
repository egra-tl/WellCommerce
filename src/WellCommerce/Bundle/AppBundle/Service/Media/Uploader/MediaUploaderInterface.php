<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\AppBundle\Service\Media\Uploader;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use WellCommerce\Bundle\AppBundle\Entity\Media;

/**
 * Interface MediaUploaderInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface MediaUploaderInterface
{
    public function upload(UploadedFile $file, $dir): Media;
    
    public function getUploadDir(string $dir): string;
}
