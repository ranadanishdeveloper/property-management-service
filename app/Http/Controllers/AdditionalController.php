<?php

namespace App\Http\Controllers;

use App\Models\Additional;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdditionalController extends Controller
{
    public function index()
    {
        if (!Auth::user()->can('manage additional')) {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
        $loginUser = Auth::user();

        $additionals = Additional::where('parent_id', '=', parentId())->get();

        $blogs = Blog::where('parent_id', '=', parentId())->get();

        return view('additional.index', compact('loginUser', 'additionals', 'blogs'));
    }

   public function update(Request $request, $id)
{
    if (!Auth::user()->can('edit additional')) {
        return redirect()->back()->with('error', __('Permission Denied.'));
    }

    $additional = Additional::find($id);
    $old_content_value = '';
    if (!empty($additional->content_value)) {
        $old_content_value = json_decode($additional->content_value, true);
    }
    $content_value = $request->content_value ?: [];

    /* section 0 - banner_image1 */
    if (!empty($request->content_value['banner_image1'])) {
        $banner_image1 = $request->content_value['banner_image1'];
        $filenameWithExt = $banner_image1->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $banner_image1->getClientOriginalExtension();
        // Remove special characters from filename
        $cleanFilename = preg_replace('/[^A-Za-z0-9\-]/', '_', $filename);
        $fileNameToStore = $cleanFilename . '_' . time() . '.' . $extension;

        // Store in public disk
        $path = $banner_image1->storeAs('additional', $fileNameToStore, 'public');
        $content_value['banner_image1_path'] = $path;
    } else {
        $content_value['banner_image1_path'] = !empty($old_content_value['banner_image1_path']) ? $old_content_value['banner_image1_path'] : '';
    }

    /* section 6 - sec3_banner_image */
    if (!empty($request->content_value['sec3_banner_image'])) {
        $sec3_banner_image = $request->content_value['sec3_banner_image'];
        $filenameWithExt = $sec3_banner_image->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $sec3_banner_image->getClientOriginalExtension();
        // Remove special characters from filename
        $cleanFilename = preg_replace('/[^A-Za-z0-9\-]/', '_', $filename);
        $fileNameToStore = $cleanFilename . '_' . time() . '.' . $extension;

        // Store in public disk
        $path = $sec3_banner_image->storeAs('additional', $fileNameToStore, 'public');
        $content_value['sec3_banner_image_path'] = $path;
    } else {
        $content_value['sec3_banner_image_path'] = !empty($old_content_value['sec3_banner_image_path']) ? $old_content_value['sec3_banner_image_path'] : '';
    }

    $additional->content_value = json_encode($content_value);
    $additional->save();

    return redirect()->back()->with('tab', $request->tab)->with('success', __('Home Page Content Updated Successfully.'));
}


}
