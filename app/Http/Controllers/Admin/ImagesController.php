<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class ImagesController extends Controller
{

    /**
     * @param Photo $photo
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();

        return redirect()->back()->with('success', ' تم حذف الصورة !');
    }
}
