<?php

namespace AntonyForber\AutoGen\Http\Controllers;

use Illuminate\Routing\Controller as Controller;
use Illuminate\Http\Request;
use File;

class ModuleController extends Controller
{
    protected $modulesPath = 'app/Modules';
    
    public function create(Request $request)
    {
        $requestData = $request->all();
        if (count($requestData) === 0) {
            return view('AutoGen::module.create');
        }
        
        $name = $requestData['name'];
        if (preg_match('/\ /', $name)) {
            dd('Module name can not have spaces!');
        }
        if (File::isDirectory(base_path("{$this->modulesPath}/$name"))) {
            dd("Module {$name} already exists!");
        }
        
        $alias = $requestData['alias'];
        if ($alias == '') {
            dd('Your module must have alias!');
        }
        
        $this->makeDirectory($name);
        $this->makeDirectory("$name/Controllers/Admin");
        $this->makeDirectory("$name/Models");
        $this->makeDirectory("$name/Forms");
        $this->makeDirectory("$name/Requests");
        $this->makeDirectory("$name/Filters");
        $this->makeDirectory("$name/Routes");
        
        $template = file_get_contents(base_path('vendor/antony-forber/autogen/resources/views/module/templates/admin-route.php'));
        $template = str_replace('{ModuleAlias}', $alias, $template);
        $this->makeFile("$name/Routes/admin.php", "<?php\n\n{$template}\n\n");
        
        $i18n = [];
        foreach (config('langs.list-for-admin', []) as $slug => $data) {
            $this->makeDirectory("$name/I18n/{$slug}");
            $permissionName = $requestData['permissions'][$slug];
            $i18n[$slug]['permission-name'] = $permissionName;
        }
        
        if (!empty($requestData['site_parts'])) {
            $this->makeDirectory("$name/Controllers/Site");
            $this->makeDirectory("$name/Views/admin");
            $this->makeDirectory("$name/Views/site");
            $this->makeFile("$name/Routes/site.php", "<?php\n\nuse Illuminate\Support\Facades\Route;\n\n");
        } else {
            $this->makeDirectory("$name/Views");
        }
        
        if (!empty($requestData['migrations'])) {
            $this->makeDirectory("$name/Database/Migrations");
        }

        if (!empty($requestData['seeders'])) {
            $this->makeDirectory("$name/Database/Seeds");
        }

        if (!empty($requestData['config_file'])) {
            $this->makeFile("$name/config.php", "<?php\n\nreturn [];");
        }
        
        $publicSettings = '';
        if (!empty($requestData['setting'])) {
            $publicSettings = "\n        // Register module configurable settings\n" .
                "        \$settings = CustomSettings::createAndGet('{ModuleAlias}', '{ModuleAlias}::general.settings-name');";
            foreach (config('langs.list-for-admin', []) as $slug => $data) {
                $settingsNameForLang = $requestData['settings'][$slug];
                $i18n[$slug]['settings-name'] = $settingsNameForLang;
            }
        }
        foreach (config('langs.list-for-admin', []) as $slug => $data) {
            $settings = "<?php\n\nreturn [";
            foreach (array_get($i18n, $slug) as $key => $value) {
                $settings .= "\n    '{$key}' => '{$value}',";
            }
            $settings .= "\n];";
            $this->makeFile("$name/I18n/{$slug}/general.php", $settings);
        }
        
        $template = file_get_contents(base_path('vendor/antony-forber/autogen/resources/views/module/templates/provider-layout.php'));
        $afterBootTemplate = file_get_contents(base_path('vendor/antony-forber/autogen/resources/views/module/templates/after-boot.php'));
        $afterBootForAdminTemplate = file_get_contents(base_path('vendor/antony-forber/autogen/resources/views/module/templates/after-boot-admin.php'));
        $moduleNameSettings = '';
        $aliasProposition = snake_case($name);
        if ($alias !== $aliasProposition) {
            $moduleNameSettings = "\n        \$this->setModuleName('$alias');" .
                                  "\n        \$this->setTranslationsNamespace('$alias');" .
                                  "\n        \$this->setViewNamespace('$alias');" .
                                  "\n        \$this->setConfigNamespace('$alias');";
        }
        
        $template = str_replace(
            ['{AfterBootForAdminPanel}', '{AfterBoot}', '{PublicSettings}', '{OwnModuleNameSettings}'],
            [$afterBootForAdminTemplate, $afterBootTemplate, $publicSettings, $moduleNameSettings],
            $template
        );
        $template = str_replace(
            ['{ModuleName}', '{ModuleAlias}'],
            [$name, $alias],
            $template
        );
        $this->makeFile("$name/Provider.php", "<?php\n\n$template");
        
        dd("Please find config/app.php and put a row `App\Modules\\$name\Provider::class,` in the providers section");
    }
    
    protected function makeDirectory($path)
    {
        File::makeDirectory(base_path("{$this->modulesPath}/$path"), $mode = 0777, true, true);
    }
    
    protected function makeFile($path, $content = '')
    {
        File::put(base_path("{$this->modulesPath}/$path"), $content);
    }
}
