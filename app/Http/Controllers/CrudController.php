<?php

namespace AntonyForber\AutoGen\Http\Controllers;

use Illuminate\Routing\Controller as Controller;
use Illuminate\Http\Request;
use File;

class CrudController extends Controller
{
    protected $modulesPath = 'app/Modules/';
    
    public function create(Request $request)
    {        
        $requestData = $request->all();
        if (count($requestData) === 0) {
            return view('AutoGen::crud.create');
        }
        
//        $tableName = $requestData['table_name'];
//        $tableTranslatesName = $requestData['table_translates_name'];
        
        $moduleName = $requestData['module'];
        $modelName = $requestData['model'];
        $fillableFields = $requestData['fillable'];

        $active = true;        
        
        $modelTemplate = view('AutoGen::model.templates.model', [
            'translate' => !empty($requestData['table_translates_name']) ? true : false,
            'image' => !empty($requestData['image']) ? true : false,
            'active' => $active,
            'moduleName' => $moduleName,
            'modelName' => $modelName,
            'fillable' => explode(',',$fillableFields),
        ])->render();
                
        $imageBlockTemplate = file_get_contents(base_path('vendor/antony-forber/autogen/resources/views/model/templates/image-block.php'));
        $imageBlockTemplate = str_replace('{ModelName}', $modelName, $imageBlockTemplate);
        
        $modelTemplate = str_replace('{ImageClass}', $imageBlockTemplate, $modelTemplate);
        $this->makeFile("$moduleName/Models/$modelName.php", "<?php\n\n{$modelTemplate}\n\n");
        
        if (!empty($requestData['table_translates_name'])) {
            $fillableTranslatesFields = $requestData['fillable_translates'];
            $modelTranslatesTemplate = file_get_contents(base_path('vendor/antony-forber/autogen/resources/views/model/templates/model-translates.php'));
            $modelTranslatesTemplate = str_replace([
                '{ModuleName}','{ModelName}','{TranslatesTableName}','{FilableFields}'
            ], [
                $moduleName, $modelName, $requestData['table_translates_name'], "'".implode("', '", explode(',', $fillableTranslatesFields))."'"
            ], $modelTranslatesTemplate);
            $this->makeFile("$moduleName/Models/$modelName"."Translates.php", "<?php\n\n{$modelTranslatesTemplate}\n\n");
        }
        
        if (!empty($requestData['image'])) {
            $this->makeDirectory("$moduleName/Images");
            $imageField = $requestData['image_field'];
            $folderName = $requestData['image_folder'];
            $imageTemplate = view('AutoGen::model.templates.image-class', [
                'moduleName' => $moduleName,
                'modelName' => $modelName,
                'imageField' => $imageField,
                'folderName' => $folderName,
            ])->render();
            $this->makeFile("$moduleName/Images/$modelName"."Image.php", "<?php\n\n{$imageTemplate}\n\n");
        }
        
        dd('done!');
    }
    
    protected function makeFile($path, $content = '')
    {
        File::put(base_path("{$this->modulesPath}/$path"), $content);
    }
    
    protected function makeDirectory($path)
    {
        File::makeDirectory(base_path("{$this->modulesPath}/$path"), $mode = 0777, true, true);
    }
}
