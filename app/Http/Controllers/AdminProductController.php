<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    public function __construct(Category $category, Product $product, ProductImage $productImage)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
    }
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.add', compact('htmlOption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataProductCreate = [
            'name' => $request->name,
            'price' =>$request->price,
            'content' =>$request->contents,
            'user_id' =>auth()->id(),
            'category_id' =>$request->category_id,
        ];
        $dataUploadFeatureImage= $this->StorageTraitUpload($request, 'feature_image_path', 'products');
        if(!empty($dataUploadFeatureImage)){
            $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        };
        $product = $this->product->create($dataProductCreate);

        //insert data to product_images
        if($request->hasFile('image_path')){
            foreach ($request->image_path as $fileItem){
                $dataProductImageDetail = $this->StorageTraitUploadMutiple($fileItem, 'products');
                $this->productImage->create([
                    'product_id' =>$product->id,
                    'image_path'=>$dataProductImageDetail['file_path'],
                    'image_name'=>$dataProductImageDetail['file_name'],
                ]);
            }
        }
    }
    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->CategoryRecursive($parentId);
        return $htmlOption;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
