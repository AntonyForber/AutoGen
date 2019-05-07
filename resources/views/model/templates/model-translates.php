namespace App\Modules\{ModuleName}\Models;

use App\Traits\ModelTranslates;
use Illuminate\Database\Eloquent\Model;

class {ModelName}Translates extends Model
{
    use ModelTranslates;
    
    protected $table = '{TranslatesTableName}';
    
    public $timestamps = false;
    
    protected $fillable = [{FilableFields}];
    
}
