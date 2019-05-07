namespace App\Modules\<?= $moduleName ?>\Images;

use App\Components\Image\ImagesGroup;
use App\Core\Abstractions\ImageContainer;

/**
 * Class <?= $modelName ?>Image
 *
 * @package App\Modules\<?= $moduleName ?>\Images
 */
class <?= $modelName ?>Image extends ImageContainer
{
    
    /**
     * Field name in the form
     *
     * @return string
     */
    public static function getField(): string
    {
        return '<?= $imageField ?>';
    }
    
    /**
     * Folder name
     *
     * @return string
     */
    public static function getType(): string
    {
        return '<?= $folderName ?>';
    }
    
    /**
     * Configurations
     *
     * @return ImagesGroup
     * @throws \App\Exceptions\WrongParametersException
     */
    public function configurations(): ImagesGroup
    {
        //$image = new ImagesGroup($this->getType());
        //$image
        //    ->addTo('small')
        //    ->setWidth(350)
        //    ->setHeight(260)
        //    ->setWatermark(true)
        //    ->setCrop(true);
        //$image
        //    ->addTo('big')
        //    ->setWidth(920);
        //return $image;
    }
    
}