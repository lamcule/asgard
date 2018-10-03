<?php  
namespace Modules\Category\Http\Controllers\Api;

use Modules\Category\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Category\Http\Requests\CreateCategoryRequest;
use Modules\Category\Http\Requests\UpdateCategoryRequest;
use App\Http\Controllers\Api\BaseController;
use Modules\Category\Transformers\CategoryTransformer;
use Symfony\Component\HttpKernel\Exception;
use Dingo\Api\Exception\StoreResourceFailedException;
use Modules\User\Entities\Sentinel\User;
/**
 * 
 */
class ApiCategoryController extends BaseController
{
	private $category;
	function __construct(CategoryRepository $category)
	{
		$this->category = $category;
	}

	public function index(){
		$categories = $this->category->all();
        $categories->load('parent','children');
		return $this->response->collection($categories,new CategoryTransformer);
	}

	public function show($id)
	{
		$categories = $this->category->find($id);
        $categories->load('parent','children');
		if (!$categories) {
			throw new  Exception\NotFoundHttpException('record is not exist!');			
		} else{
			return $this->response->item($categories,new CategoryTransformer);
		}
	}

	public function store(CreateCategoryRequest $request)
    {
        $categories = $this->category->all();
        $credentials = $request->all();
    	$categories = $this->category->create($credentials);
    	return $this->response->item($categories,new CategoryTransformer);

    }

    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->category->find($id);
        $category = $this->category->update($category,$request->all());
        return $this->response->array(["status" => "success", "data" => $category]);
    }

    public function destroy($id){
    	$categories = $this->category->find($id);
    	$categories->delete();
    	return $categories;
    }

}