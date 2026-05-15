<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function create()
    {
        if (\Auth::user()->can('create blog')) {
            return view('blog.create');
        } else {
            $return['status'] = 'error';
            $return['messages'] = __('Permission denied.');
            return response()->json($return);
        }
    }

    public function store(Request $request)
    {
        if (\Auth::user()->can('create blog')) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'title' => 'required',
                    'image' => 'required|image|mimes:jpeg,png,jpg,webp',
                    'content' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $imageFileName = '';
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                // Clean filename and add timestamp
                $cleanFilename = preg_replace('/[^A-Za-z0-9\-]/', '_', $filename);
                $imageFileName = $cleanFilename . '_' . time() . '.' . $extension;

                // Store in public disk (storage/app/public/blog/)
                $path = $image->storeAs('blog', $imageFileName, 'public');
            }

            $baseSlug = Str::slug($request->title);
            $slug = $baseSlug;
            $counter = 1;

            while (Blog::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }

            $blog = new Blog();
            $blog->title = $request->title;
            $blog->slug = $slug;
            $blog->content = $request->content;
            $blog->enabled = $request->enabled;
            $blog->image = 'blog/' . $imageFileName; // Store full path for Storage::url()
            $blog->parent_id = \Auth::user()->id;
            $blog->save();

            return redirect()->back()->with('success', __('Blog successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function edit(Blog $blog)
    {
        if (\Auth::user()->can('edit blog')) {
            return view('blog.edit', compact('blog'));
        } else {
            $return['status'] = 'error';
            $return['messages'] = __('Permission denied.');
            return response()->json($return);
        }
    }

    public function update(Request $request, Blog $blog)
    {
        if (\Auth::user()->can('edit blog')) {
            $rules = [
                'title' => 'required',
                'content' => 'required',
            ];

            if (empty($blog->image) && !$request->hasFile('image')) {
                return redirect()->back()->with('error', __('Image is required.'));
            }

            if ($request->hasFile('image')) {
                $rules['image'] = 'image|mimes:jpeg,png,jpg,webp';
            }

            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->with('error', $validator->getMessageBag()->first());
            }

            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                    Storage::disk('public')->delete($blog->image);
                }

                $image = $request->file('image');
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                // Clean filename and add timestamp
                $cleanFilename = preg_replace('/[^A-Za-z0-9\-]/', '_', $filename);
                $imageFileName = $cleanFilename . '_' . time() . '.' . $extension;

                // Store in public disk
                $path = $image->storeAs('blog', $imageFileName, 'public');
                $blog->image = 'blog/' . $imageFileName;
            }

            if ($request->title !== $blog->title) {
                $baseSlug = Str::slug($request->title);
                $slug = $baseSlug;
                $counter = 1;

                while (Blog::where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }
                $blog->slug = $slug;
            }

            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->enabled = $request->enabled;
            $blog->save();

            return redirect()->back()->with('success', __('Blog successfully updated.'));
        }

        return redirect()->back()->with('error', __('Permission denied.'));
    }

    public function destroy(Blog $blog)
    {
        if (\Auth::user()->can('delete blog')) {
            // Delete Image from public disk
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $blog->delete();

            return redirect()->back()->with('success', 'Blog successfully deleted.');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
