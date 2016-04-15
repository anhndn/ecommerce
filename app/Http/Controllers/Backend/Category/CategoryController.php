<?php
/**
 * Created by Miki Maine Amdu.
 * For : INNOVATE E-COMMERCE
 * User: MIKI$
 * Date: 4/2/2016
 * Time: 11:04 AM
 */

namespace App\Http\Controllers\Backend\Category;


use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Innovate\Image\InnovateImageUploadContract;
use Innovate\Repositories\Category\CategoryContract;
use Innovate\Requests\Category\StoreCategoryRequest;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Backend\Category
 */
class CategoryController  extends Controller{
    /**
     * @var
     */
    public $category;


    public $imageDriver ;

    /**
     * @param CategoryContract $categoryContract
     * @param InnovateImageUploadContract $image
     */
    function __construct(CategoryContract $categoryContract,InnovateImageUploadContract $image)
    {
        $this->category = $categoryContract;
        $this->imageDriver = $image;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.category.index')
            ->withCategorys($this->category->eagerLoad('category_description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|StoreCategoryRequest $request
     * @return \Illuminate\Http\Response
     * @throws GeneralException
     */
    public function store(StoreCategoryRequest $request)
    {
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            if (!$file->isValid()) {
                throw new GeneralException('There is error in your image file.');
            }
            $im = $this->imageDriver->up($file,config('innovate.upload_path').'\product\ '.Str::random(32) . '.' . $file->guessExtension());
            $all =$request->all();
            $all['valid_image'] = $im->basename;
            $this->category->create($all);
        }else{
            throw new GeneralException('The file should not be empty');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}