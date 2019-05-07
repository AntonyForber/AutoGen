namespace App\Modules\<?= $moduleName ?>\Controllers\Admin;

use App\Core\ObjectValues\RouteObjectValue;
use App\Modules\<?= $moduleName ?>\Forms\<?= $modelName ?>Form;
use App\Modules\<?= $moduleName ?>\Models\<?= $modelName ?>;
use App\Modules\<?= $moduleName ?>\Requests\<?= $modelName ?>Request;
use Seo;
use App\Core\AdminController;

/**
 * Class <?= $moduleName ?>Controller
 *
 * @package App\Modules\<?= $moduleName ?>\Controllers\Admin
 */
class <?= $moduleName ?>Controller extends AdminController
{
    
    public function __construct()
    {
        Seo::breadcrumbs()->add('<?= strtolower($moduleName) ?>::seo.index', RouteObjectValue::make('admin.<?= $routeName ?>.index'));
    }
    
    /**
     * Register widgets with buttons
     */
    private function registerButtons()
    {
        $this->addCreateButton('admin.<?= $routeName ?>.create');
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Set page buttons on the top of the page
        $this->registerButtons();
        // Set h1
        Seo::meta()->setH1('<?= strtolower($moduleName) ?>::seo.index');
        // Get list
        $models = <?= $modelName ?>::getList();
        // Return view list
        return view('<?= strtolower($moduleName) ?>::admin.index', ['models' => $models]);
    }
    
    /**
     * Create new element page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\WrongParametersException
     */
    public function create()
    {
        // Breadcrumb
        Seo::breadcrumbs()->add('<?= strtolower($moduleName) ?>::seo.create');
        // Set h1
        Seo::meta()->setH1('<?= strtolower($moduleName) ?>::seo.create');
        // Javascript validation
        $this->initValidation((new <?= $modelName ?>Request())->rules());
        // Return form view
        return view(
            '<?= strtolower($moduleName) ?>::admin.create', [
                'form' => <?= $modelName ?>Form::make(),
            ]
        );
    }
    
    /**
     * Create page in database
     *
     * @param  <?= $modelName ?>Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Exceptions\WrongParametersException
     */
    public function store(<?= $modelName ?>Request $request)
    {
        $model = (new <?= $modelName ?>);
        if ($message = $model->createRow($request)) {
            return $this->afterFail($message);
        }
        // Do something
        return $this->afterStore(['id' => $model->id]);
    }
    
    /**
     * Update element page
     *
     * @param  <?= $modelName ?> $<?= strtolower($moduleName) ?>
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\WrongParametersException
     */
    public function edit(<?= $modelName ?> $<?= strtolower($moduleName) ?>)
    {
        // Breadcrumb
        Seo::breadcrumbs()->add($<?= strtolower($moduleName) ?>->current->name ?? '<?= strtolower($moduleName) ?>::seo.edit');
        // Set h1
        Seo::meta()->setH1('<?= strtolower($moduleName) ?>::seo.edit');
        // Javascript validation
        $this->initValidation((new <?= $modelName ?>Request)->rules());
        // Return form view
        return view(
            '<?= strtolower($moduleName) ?>::admin.update', [
                'form' => <?= $modelName ?>Form::make($<?= strtolower($moduleName) ?>),
            ]
        );
    }
    
    /**
     * Update page in database
     *
     * @param  <?= $modelName ?>Request $request
     * @param  <?= $modelName ?> $<?= strtolower($moduleName) ?>
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Exceptions\WrongParametersException
     */
    public function update(<?= $modelName ?>Request $request, <?= $modelName ?> $<?= strtolower($moduleName) ?>)
    {
        // Update existed <?= strtolower($moduleName) ?>
        if ($message = $<?= strtolower($moduleName) ?>->updateRow($request)) {
            return $this->afterFail($message);
        }
        // Do something
        return $this->afterUpdate();
    }
    
    /**
     * Totally delete page from database
     *
     * @param  <?= $modelName ?> $<?= strtolower($moduleName) ?>
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Exceptions\WrongParametersException
     */
    public function destroy(<?= $modelName ?> $<?= strtolower($moduleName) ?>)
    {
        // Delete <?= strtolower($moduleName) ?>'s image
        $<?= strtolower($moduleName) ?>->deleteAllImages();
        // Delete <?= strtolower($moduleName) ?>
        $<?= strtolower($moduleName) ?>->forceDelete();
        // Do something
        return $this->afterDestroy();
    }
    
    /**
     * Delete image
     *
     * @param  <?= $modelName ?> $<?= strtolower($moduleName) ?>
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Exceptions\WrongParametersException
     */
    public function deleteImage(<?= $modelName ?> $<?= strtolower($moduleName) ?>)
    {
        // Delete <?= strtolower($moduleName) ?>'s image
        $<?= strtolower($moduleName) ?>->deleteImagesIfExist();
        // Do something
        return $this->afterDeletingImage();
    }
    
}
