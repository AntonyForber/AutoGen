<?php 
    $traits = [];
    if (!empty($translate)) {
        $traits[] = 'ModelMain';
    }
    if (!empty($image)) {
        $traits[] = 'Imageable';
    }
    if (!empty($active)) {
        $traits[] = 'ActiveScopeTrait';
    }
?>
namespace App\Modules\<?= $moduleName ?>\Models;

<?php if (!empty($image)): ?>
use App\Modules\<?= $moduleName ?>\Images\<?= $modelName ?>Image;
<?php endif; ?>
<?php if (!empty($active)): ?>
use App\Traits\ActiveScopeTrait;
<?php endif; ?>
<?php if (!empty($translate)): ?>
use App\Traits\ModelMain;
<?php endif; ?>
<?php if (!empty($image)): ?>
use App\Traits\Imageable;
<?php endif; ?>
use Illuminate\Database\Eloquent\Model;

class <?= $modelName ?> extends Model
{
<?php if (!empty($traits)) :?>
    use <?= implode(', ', $traits)?>;
<?php endif;?>

<?php if (!empty($active)) :?>
    protected $casts = ['active' => 'boolean'];
<?php endif;?>
    
<?php if (!empty($fillable)) :?>
    protected $fillable = ['<?= implode("', '", $fillable)?>'];
<?php endif;?>
    {ImageClass}
}
