Route::middleware(['auth:admin', 'permission:<?= strtolower($moduleName) ?>'])->group(function () {
<?php if ($active) :?>
    Route::put('<?= strtolower($moduleName) ?>/{<?= strtolower($moduleName) ?>}/active', ['uses' => '<?= $moduleName ?>Controller@active', 'as' => 'admin.<?= $routeName ?>.active']);
<?php endif;?>
<?php if ($image) :?>
    Route::get(
        '<?= strtolower($moduleName) ?>/{<?= strtolower($moduleName) ?>}/image/delete',
        ['uses' => '<?= $moduleName ?>Controller@deleteImage', 'as' => 'admin.<?= $routeName ?>.delete-image']
    );
<?php endif;?>
    Route::get('<?= strtolower($moduleName) ?>/{<?= strtolower($moduleName) ?>}/destroy', ['uses' => '<?= $moduleName ?>Controller@destroy', 'as' => 'admin.<?= $routeName ?>.destroy']);
    Route::resource('<?= strtolower($moduleName) ?>', '<?= $moduleName ?>Controller')->except('show', 'destroy')->names('admin.<?= $routeName ?>');
});
