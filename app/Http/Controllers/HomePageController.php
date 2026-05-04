<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    public function index()
    {
        if (!Auth::user()->can('manage home page')) {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }

        $loginUser = Auth::user();
        $pages = Page::where('enabled', 1)->pluck('title', 'id');
        $HomePage = HomePage::get();

        return view('home_pages.index', compact('loginUser', 'pages', 'HomePage'));
    }

    public function create() {}
    public function store(Request $request) {}
    public function show(HomePage $homePage) {}
    public function edit(HomePage $homePage) {}

    /**
     * CLEAN PATH (removes broken %20 or multiple URLs)
     */
    private function cleanPath($path)
    {
        if (is_array($path)) {
            return $path[0] ?? '';
        }

        return trim(explode(' ', $path)[0]);
    }

    /**
     * UPLOAD HELPER (IMPORTANT)
     */
    private function uploadImage($file, $prefix)
    {
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $ext = $file->getClientOriginalExtension();

        $fileName = $name . '_' . $prefix . '_' . date('YmdHis') . '.' . $ext;

        // stores in: storage/app/public/upload/homepage
        Storage::disk('public')->putFileAs('upload/homepage', $file, $fileName);

        // DB value (NO extra "storage")
        return 'upload/homepage/' . $fileName;
    }

    public function update(Request $request, HomePage $homePage, $id)
    {
        if (!Auth::user()->can('edit home page')) {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }

        $homePage = HomePage::find($id);

        $old = json_decode($homePage->content_value, true) ?? [];
        $content = $request->content_value;

        /* =========================
           SECTION FOOTER IMAGE
        ========================= */
        if (!empty($request->content_value['section_footer_image'])) {
            $content['section_footer_image_path'] =
                $this->uploadImage(
                    $request->content_value['section_footer_image'],
                    'footer'
                );
        } else {
            $content['section_footer_image_path'] =
                $old['section_footer_image_path'] ?? '';
        }

        /* =========================
           SECTION MAIN IMAGE
        ========================= */
        if (!empty($request->content_value['section_main_image'])) {
            $content['section_main_image_path'] =
                $this->uploadImage(
                    $request->content_value['section_main_image'],
                    'main'
                );
        } else {
            $content['section_main_image_path'] =
                $old['section_main_image_path'] ?? '';
        }

        /* =========================
           BOX 1-3
        ========================= */
        for ($i = 1; $i <= 3; $i++) {

            $key = 'box' . $i . '_number_image';

            if (!empty($request->content_value[$key])) {
                $content['box_image_' . $i . '_path'] =
                    $this->uploadImage(
                        $request->content_value[$key],
                        'box' . $i
                    );
            } else {
                $content['box_image_' . $i . '_path'] =
                    $old['box_image_' . $i . '_path'] ?? '';
            }
        }

        /* =========================
           BOX 2 SECTION
        ========================= */
        for ($ik = 1; $ik <= 2; $ik++) {

            $key = 'Box' . $ik . '_image';

            if (!empty($request->content_value[$key])) {
                $content['Box' . $ik . '_image_path'] =
                    $this->uploadImage(
                        $request->content_value[$key],
                        'section33_' . $ik
                    );
            } else {
                $content['Box' . $ik . '_image_path'] =
                    $old['Box' . $ik . '_image_path'] ?? '';
            }
        }

        /* =========================
           SECTION 4
        ========================= */
        for ($is4 = 1; $is4 <= 6; $is4++) {

            $key = 'Sec4_box' . $is4 . '_image';

            if (!empty($request->content_value[$key])) {
                $content['Sec4_box' . $is4 . '_image_path'] =
                    $this->uploadImage(
                        $request->content_value[$key],
                        'sec4_' . $is4
                    );
            } else {
                $content['Sec4_box' . $is4 . '_image_path'] =
                    $old['Sec4_box' . $is4 . '_image_path'] ?? '';
            }
        }

        /* =========================
           SECTION 6
        ========================= */
        if (!empty($content['Sec6_Box_title'])) {
            for ($is6 = 0; $is6 < count($content['Sec6_Box_title']); $is6++) {

                if (!empty($request->content_value['Sec6_box_image'][$is6])) {
                    $content['Sec6_box' . $is6 . '_image_path'] =
                        $this->uploadImage(
                            $request->content_value['Sec6_box_image'][$is6],
                            'sec6_' . $is6
                        );
                } else {
                    $content['Sec6_box' . $is6 . '_image_path'] =
                        $old['Sec6_box' . $is6 . '_image_path'] ?? '';
                }
            }
        }

        /* =========================
           SECTION 7
        ========================= */
        for ($is7 = 1; $is7 <= 8; $is7++) {

            $key = 'Sec7_box' . $is7 . '_image';

            if (!empty($request->content_value[$key])) {
                $content['Sec7_box' . $is7 . '_image_path'] =
                    $this->uploadImage(
                        $request->content_value[$key],
                        'sec7_' . $is7
                    );
            } else {
                $content['Sec7_box' . $is7 . '_image_path'] =
                    $old['Sec7_box' . $is7 . '_image_path'] ?? '';
            }
        }

        /* =========================
           SAVE
        ========================= */
        $homePage->content_value = $content;
        $homePage->save();

        return redirect()->back()
            ->with('tab', $request->tab)
            ->with('success', __('Home Page Content Updated Successfully.'));
    }

    public function destroy(HomePage $homePage) {}
}
