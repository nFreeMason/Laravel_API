<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ImageRequest;
use App\Models\Image;
use App\Transformers\ImageTransformer;
use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;

class ImagesController extends Controller
{
    //
    public function store(ImageRequest $request, Image $image, ImageUploadHandler $handler)
    {
        $user = $this->user();

        $size = $request->type == 'avatar' ? 362 : 1024 ;
        $result = $handler->save($request->image,str_plural($request->type),$user->id,$size);

        $image->path = $result['path'];
        $image->type = $request->type;
        $image->user_id = $user->id;
        $image->save();

        return $this->response->item($image,new ImageTransformer())->setStatusCode(201);

    }
}
