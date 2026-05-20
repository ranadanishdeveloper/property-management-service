<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\Amenity;
use App\Models\Blog;
use App\Models\FrontHomePage;
use App\Models\Notification;
use App\Models\Property;
use App\Models\PropertyUnit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Crypt;

class FrontendController extends Controller
{

    // ============================================
    // THEME HELPER METHODS
    // ============================================

    /**
     * Get the current theme for the user from database
     */
    protected function getTheme($user)
    {
        // Get theme from user's frontend_theme field (1, 2, or 3)
        $themeNumber = $user->frontend_theme ?? 1;

        // Map theme number to folder name
        $themeMap = [
            1 => 'theme',      // Your existing corporate theme
            2 => 'theme2',     // Glassmorphism theme
            3 => 'theme3',
             4 => 'theme4',
              5 => 'theme5',
              6 => 'theme6',
              7 => 'theme7',
              8 => 'theme8',
              9 => 'theme9'      // Brutalist theme
        ];

        return $themeMap[$themeNumber] ?? 'theme';
    }

    /**
     * Render view with correct theme based on user's database setting
     */
    protected function renderThemeView($user, $view, $data = [])
    {
        $theme = $this->getTheme($user);
        $data['current_theme'] = $theme;
        $data['theme_number'] = $user->frontend_theme ?? 1;

        // Check if view exists in current theme
        if (view()->exists($theme . '.' . $view)) {
            return view($theme . '.' . $view, $data);
        }

        // Fallback to default theme
        return view('theme.' . $view, $data);
    }

    // ============================================
    // CUSTOM DOMAIN METHODS (for custom domain like xpertlogics.com)
    // ============================================

   public function customDomainIndex(Request $request)
{
    $owner = $request->attributes->get('owner');
    if (!$owner) {
        abort(404);
    }
    return $this->themePage($owner->code)->with('is_custom_domain', true);
}
public function customDomainSearchLocation(Request $request)
{
    $owner = $request->attributes->get('owner');
    if (!$owner) {
        abort(404);
    }
    return $this->searchLocation($request, $owner->code);
}
public function customDomainSearchPackage(Request $request)
{
    $owner = $request->attributes->get('owner');
    if (!$owner) {
        abort(404);
    }
    return $this->searchpackage($request, $owner->code);
}
public function searchpackage(Request $request, $code)
{
    $user = User::where('code', $code)->firstOrFail();
    $settings = settingsById($user->id);
    $theme = $this->getTheme($user);

    $query = Property::where('parent_id', $user->id);

    // Filter by search query if provided
    if ($request->filled('query')) {
        $query->where('name', 'LIKE', '%' . $request->query . '%')
              ->orWhere('address', 'LIKE', '%' . $request->query . '%')
              ->orWhere('description', 'LIKE', '%' . $request->query . '%');
    }

    // Filter by listing type (sell/rent)
    if ($request->filled('listing_type')) {
        $query->where('listing_type', $request->listing_type);
    }

    // Filter by property type
    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    // Filter by price range
    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }
    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    // Filter by bedrooms
    if ($request->filled('bedrooms')) {
        $query->whereHas('units', function($q) use ($request) {
            $q->where('bedroom', '>=', $request->bedrooms);
        });
    }

    // Filter by bathrooms
    if ($request->filled('bathrooms')) {
        $query->whereHas('units', function($q) use ($request) {
            $q->where('baths', '>=', $request->bathrooms);
        });
    }

    $properties = $query->paginate(12);

    $noPropertiesMessage = $properties->isEmpty()
        ? 'No properties available with the selected filters.'
        : '';

    if ($request->ajax()) {
        // Check if themed propertybox exists
        if (view()->exists($theme . '.propertybox')) {
            return view($theme . '.propertybox', compact('properties', 'user', 'settings', 'noPropertiesMessage'))->render();
        }
        return view('theme.propertybox', compact('properties', 'user', 'settings', 'noPropertiesMessage'))->render();
    }

    return $this->renderThemeView($user, 'property', compact('properties', 'user', 'settings', 'noPropertiesMessage'));
}
public function customDomainSearch(Request $request)
{
    $owner = $request->attributes->get('owner');
    if (!$owner) {
        abort(404);
    }
    return $this->search($request, $owner->code);
}
public function customDomainGetStates(Request $request)
{
    $owner = $request->attributes->get('owner');
    if (!$owner) {
        return response()->json([]);
    }

    $states = Property::where('parent_id', $owner->id)
        ->where('country', $request->country)
        ->distinct()
        ->pluck('state');

    return response()->json($states);
}

public function customDomainGetCities(Request $request)
{
    $owner = $request->attributes->get('owner');
    if (!$owner) {
        return response()->json([]);
    }

    $cities = Property::where('parent_id', $owner->id)
        ->where('state', $request->state)
        ->distinct()
        ->pluck('city');

    return response()->json($cities);
}
   public function customDomainProperties(Request $request)
{
    $owner = $request->attributes->get('owner');
    if (!$owner) {
        abort(404);
    }
    return $this->propertyPage($request, $owner->code);
}

    public function customDomainPropertyDetail(Request $request, $id)
    {
        $owner = $request->attributes->get('owner');
        if (!$owner) {
            abort(404);
        }
        return $this->detailPage($owner->code, $id);
    }

    public function customDomainBlog(Request $request)
    {
        $owner = $request->attributes->get('owner');
        if (!$owner) {
            abort(404);
        }
        return $this->blogPage($request, $owner->code);
    }

    public function customDomainBlogDetail(Request $request, $slug)
    {
        $owner = $request->attributes->get('owner');
        if (!$owner) {
            abort(404);
        }
        return $this->blogDetailPage($owner->code, $slug);
    }

    public function customDomainContact(Request $request)
    {
        $owner = $request->attributes->get('owner');
        if (!$owner) {
            abort(404);
        }
        return $this->contactPage($request, $owner->code);
    }

    // ============================================
    // SUBDOMAIN METHODS (keep for compatibility)
    // ============================================

    public function subdomainIndex(Request $request)
    {
        $owner = $request->attributes->get('owner');
        if (!$owner) {
            abort(404);
        }
        return $this->themePage($owner->code);
    }

    public function subdomainProperties(Request $request)
    {
        $owner = $request->attributes->get('owner');
        if (!$owner) {
            abort(404);
        }

        $properties = Property::where('parent_id', $owner->id)
                              ->where('is_active', 1)
                              ->get();

        return view('frontend.properties', compact('properties', 'owner'));
    }

    public function subdomainPropertyDetail(Request $request, $id)
    {
        $owner = $request->attributes->get('owner');
        if (!$owner) {
            abort(404);
        }

        $property = Property::where('id', $id)
                            ->where('parent_id', $owner->id)
                            ->firstOrFail();

        return view('frontend.property-detail', compact('property', 'owner'));
    }

    public function subdomainBlog(Request $request)
    {
        $owner = $request->attributes->get('owner');
        if (!$owner) {
            abort(404);
        }

        $blogs = Blog::where('parent_id', $owner->id)
                     ->where('status', 'published')
                     ->orderBy('created_at', 'desc')
                     ->paginate(10);

        return view('frontend.blog', compact('blogs', 'owner'));
    }

    public function subdomainBlogDetail(Request $request, $slug)
    {
        $owner = $request->attributes->get('owner');
        if (!$owner) {
            abort(404);
        }

        $blog = Blog::where('slug', $slug)
                    ->where('parent_id', $owner->id)
                    ->firstOrFail();

        return view('frontend.blog-detail', compact('blog', 'owner'));
    }

    public function subdomainContact(Request $request)
    {
        $owner = $request->attributes->get('owner');
        if (!$owner) {
            abort(404);
        }

        return view('frontend.contact', compact('owner'));
    }

    // ============================================
    // MAIN THEME PAGE (with redirect logic)
    // ============================================

  public function themePage($code = null, Request $request = null)
{
    $user = User::where('code', $code)->firstOrFail();

    // Check if owner has custom domain enabled and verified
    $hasCustomDomain = $user->custom_domain_enabled &&
                       $user->custom_domain_verified &&
                       $user->custom_domain;

    $currentHost = request()->getHost();
    $serverIp = '13.61.10.174';

    // Determine if this is a custom domain request
    $isCustomDomain = !in_array($currentHost, ['13.61.10.174', '127.0.0.1', 'localhost']);

    // If owner has custom domain AND visitor is on preview URL → Redirect to custom domain
    if ($hasCustomDomain && ($currentHost === $serverIp || $currentHost === '127.0.0.1' || $currentHost === 'localhost' || filter_var($currentHost, FILTER_VALIDATE_IP))) {
        $protocol = request()->secure() ? 'https' : 'http';
        $customUrl = $protocol . '://' . $user->custom_domain;

        if (request()->getQueryString()) {
            $customUrl .= '?' . request()->getQueryString();
        }

        return redirect()->to($customUrl);
    }

    $settings = settingsById($user->id);
    $parent_id = $user->id;
    $allAmenities = Amenity::where('parent_id', $user->id)->get();

    // FIXED: Get listing types from properties that actually exist
    $listingTypes = Property::where('parent_id', $user->id)
        ->whereIn('listing_type', ['sell', 'rent'])
        ->select('listing_type')
        ->distinct()
        ->pluck('listing_type')
        ->toArray();

    // FIXED: Get properties by type - only ACTIVE properties
    $propertiesByType = [];

    if (!empty($listingTypes)) {
        foreach ($listingTypes as $type) {
            $propertiesByType[$type] = Property::where('parent_id', $user->id)
                ->where('listing_type', $type)
                ->where('is_active', 1)  // Add this filter for active properties
                ->latest()
                ->take(6)  // Limit to 6 properties per type
                ->get();
        }
    } else {
        // If no listing types found, get all active properties
        $allProperties = Property::where('parent_id', $user->id)
            ->where('is_active', 1)
            ->latest()
            ->take(6)
            ->get();

        if ($allProperties->count() > 0) {
            $propertiesByType['Featured'] = $allProperties;
        }
    }

    // Debug: Log what we found
    \Log::info('Listing Types: ' . json_encode($listingTypes));
    \Log::info('Properties By Type Count: ' . count($propertiesByType));
    foreach($propertiesByType as $type => $props) {
        \Log::info('Type: ' . $type . ' - Property Count: ' . $props->count());
    }

    return $this->renderThemeView($user, 'index', compact('settings', 'parent_id', 'user', 'allAmenities', 'listingTypes', 'propertiesByType'))->with('is_custom_domain', $isCustomDomain);
}

    // ============================================
    // OTHER METHODS
    // ============================================

    public function searchLocation(Request $request, $code)
    {
        $locationSlug = $request->input('location');

        if (!$locationSlug) {
            return redirect()->back()->with('error', 'Location not selected.');
        }

        return redirect()->route('location.home', ['code' => $code]) . '?location=' . $locationSlug;
    }

    public function index()
    {
        if (!Auth::user()->can('manage front home page')) {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
        $loginUser = Auth::user();
        $frontHomePage = FrontHomePage::where('parent_id', '=', $loginUser->id)->get();
        return view('front-home.index', compact('loginUser', 'frontHomePage'));
    }

  public function update(Request $request, FrontHomePage $homePage, $id)
{
    if (!Auth::user()->can('edit front home page')) {
        return redirect()->back()->with('error', __('Permission Denied.'));
    }

    $homePage = FrontHomePage::find($id);
    $old_content_value = '';
    if (!empty($homePage->content_value)) {
        $old_content_value = json_decode($homePage->content_value, true);
    }
    $content_value = $request->content_value;

    /* section 0 - banner_image1 */
    if (!empty($request->content_value['banner_image1'])) {
        $banner_image1 = $request->content_value['banner_image1'];
        $filenameWithExt = $banner_image1->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $banner_image1->getClientOriginalExtension();
        $fileNameToStore = $filename . '.' . $extension;

        // Store in public disk for web access
        $path = $banner_image1->storeAs('fronthomepage', $fileNameToStore, 'public');
        $content_value['banner_image1_path'] = $path;
    } else {
        $content_value['banner_image1_path'] = !empty($old_content_value['banner_image1_path']) ? $old_content_value['banner_image1_path'] : '';
    }

    /* section 1 - Sec1_box images (4 boxes) */
    for ($is4 = 1; $is4 <= 4; $is4++) {
        $imageKey = 'Sec1_box' . $is4 . '_image';
        $pathKey = 'Sec1_box' . $is4 . '_image_path';

        if (!empty($request->content_value[$imageKey])) {
            $box_image = $request->content_value[$imageKey];
            $filenameWithExt = $box_image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $box_image->getClientOriginalExtension();
            $fileNameToStore = $filename . '.' . $extension;

            $path = $box_image->storeAs('fronthomepage', $fileNameToStore, 'public');
            $content_value[$pathKey] = $path;
        } else {
            $content_value[$pathKey] = !empty($old_content_value[$pathKey]) ? $old_content_value[$pathKey] : '';
        }
    }

    /* section 4 - about_image */
    if (!empty($request->content_value['about_image'])) {
        $about_image = $request->content_value['about_image'];
        $filenameWithExt = $about_image->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $about_image->getClientOriginalExtension();
        $fileNameToStore = $filename . '.' . $extension;

        $path = $about_image->storeAs('fronthomepage', $fileNameToStore, 'public');
        $content_value['about_image_path'] = $path;
    } else {
        $content_value['about_image_path'] = !empty($old_content_value['about_image_path']) ? $old_content_value['about_image_path'] : '';
    }

    /* section 6 - banner_image2 */
    if (!empty($request->content_value['banner_image2'])) {
        $banner_image2 = $request->content_value['banner_image2'];
        $filenameWithExt = $banner_image2->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $banner_image2->getClientOriginalExtension();
        $fileNameToStore = $filename . '.' . $extension;

        $path = $banner_image2->storeAs('fronthomepage', $fileNameToStore, 'public');
        $content_value['banner_image2_path'] = $path;
    } else {
        $content_value['banner_image2_path'] = !empty($old_content_value['banner_image2_path']) ? $old_content_value['banner_image2_path'] : '';
    }

    /* section 7 - Sec7_box images (8 boxes) */
    for ($is7 = 1; $is7 <= 8; $is7++) {
        $imageKey = 'Sec7_box' . $is7 . '_image';
        $pathKey = 'Sec7_box' . $is7 . '_image_path';

        if (!empty($request->content_value[$imageKey])) {
            $box_image = $request->content_value[$imageKey];
            $filenameWithExt = $box_image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $box_image->getClientOriginalExtension();
            $fileNameToStore = $filename . '.' . $extension;

            $path = $box_image->storeAs('fronthomepage', $fileNameToStore, 'public');
            $content_value[$pathKey] = $path;
        } else {
            $content_value[$pathKey] = !empty($old_content_value[$pathKey]) ? $old_content_value[$pathKey] : '';
        }
    }

    /* Additional: Handle Section 2 box images if needed */
    if (!empty($request->content_value['box1_number_image'])) {
        $box1_image = $request->content_value['box1_number_image'];
        $filenameWithExt = $box1_image->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $box1_image->getClientOriginalExtension();
        $fileNameToStore = $filename . '.' . $extension;

        $path = $box1_image->storeAs('fronthomepage', $fileNameToStore, 'public');
        $content_value['box_image_1_path'] = $path;
    } else {
        $content_value['box_image_1_path'] = !empty($old_content_value['box_image_1_path']) ? $old_content_value['box_image_1_path'] : '';
    }

    if (!empty($request->content_value['box2_number_image'])) {
        $box2_image = $request->content_value['box2_number_image'];
        $filenameWithExt = $box2_image->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $box2_image->getClientOriginalExtension();
        $fileNameToStore = $filename . '.' . $extension;

        $path = $box2_image->storeAs('fronthomepage', $fileNameToStore, 'public');
        $content_value['box_image_2_path'] = $path;
    } else {
        $content_value['box_image_2_path'] = !empty($old_content_value['box_image_2_path']) ? $old_content_value['box_image_2_path'] : '';
    }

    if (!empty($request->content_value['box3_number_image'])) {
        $box3_image = $request->content_value['box3_number_image'];
        $filenameWithExt = $box3_image->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $box3_image->getClientOriginalExtension();
        $fileNameToStore = $filename . '.' . $extension;

        $path = $box3_image->storeAs('fronthomepage', $fileNameToStore, 'public');
        $content_value['box_image_3_path'] = $path;
    } else {
        $content_value['box_image_3_path'] = !empty($old_content_value['box_image_3_path']) ? $old_content_value['box_image_3_path'] : '';
    }

    // Save the updated content
    $homePage->content_value = json_encode($content_value);
    $homePage->save();

    return redirect()->back()->with('tab', $request->tab)->with('success', __('Home Page Content Updated Successfully.'));
}

    public function blogPage(Request $request, $code)
    {
        $user = User::where('code', $code)->first();
        $settings = settingsById($user->id);
        $blogs = Blog::where('parent_id', $user->id)->latest()->paginate(4);
        if ($request->ajax()) {
            $theme = $this->getTheme($user);
            if (view()->exists($theme . '.blogbox')) {
                return view($theme . '.blogbox', compact('blogs', 'settings', 'user'))->render();
            }
            return view('theme.blogbox', compact('blogs', 'settings', 'user'))->render();
        }

        return $this->renderThemeView($user, 'blog', compact('blogs', 'settings', 'user'));
    }

    public function blogDetailPage($code, $slug)
    {
        $user = User::where('code', $code)->firstOrFail();
        $settings = settingsById($user->id);
        $blog = Blog::where('slug', $slug)
            ->where('parent_id', $user->id)
            ->firstOrFail();

        return $this->renderThemeView($user, 'blog-detail', compact('blog', 'settings', 'user'));
    }

   public function propertyPage(Request $request, $code)
{
    $user = User::where('code', $code)->firstOrFail();
    $settings = settingsById($user->id);
    $theme = $this->getTheme($user);

    // Check if this is a custom domain request
    $isCustomDomain = !in_array(request()->getHost(), ['13.61.10.174', 'localhost', '127.0.0.1']);

    $listingTypes = Property::where('parent_id', $user->id)
        ->whereIn('listing_type', ['sell', 'rent'])
        ->select('listing_type')
        ->distinct()
        ->pluck('listing_type')
        ->toArray();

    $propertyType = Property::where('parent_id', $user->id)
        ->whereIn('listing_type', $listingTypes)
        ->get()
        ->groupBy('listing_type');

    $properties = Property::where('parent_id', $user->id)
        ->latest()
        ->paginate(12);

    $noPropertiesMessage = $properties->isEmpty()
        ? 'No properties available with the selected filters.'
        : '';

    $countries = Property::where('parent_id', $user->id)
        ->select('country')
        ->distinct()
        ->orderBy('country')
        ->pluck('country');

    $states = Property::where('parent_id', $user->id)
        ->select('state')
        ->distinct()
        ->orderBy('state')
        ->pluck('state');

    $cities = Property::where('parent_id', $user->id)
        ->select('city')
        ->distinct()
        ->orderBy('city')
        ->pluck('city');

    if ($request->ajax()) {
        if (view()->exists($theme . '.propertybox')) {
            return view($theme . '.propertybox', compact('properties', 'user', 'noPropertiesMessage', 'settings', 'propertyType', 'countries', 'states', 'cities'))->with('is_custom_domain', $isCustomDomain);
        }
        return view('theme.propertybox', compact('properties', 'user', 'noPropertiesMessage', 'settings', 'propertyType', 'countries', 'states', 'cities'))->with('is_custom_domain', $isCustomDomain);
    }

    return $this->renderThemeView($user, 'property', compact('properties', 'settings', 'user', 'propertyType', 'noPropertiesMessage', 'countries', 'states', 'cities'))->with('is_custom_domain', $isCustomDomain);
}

    public function detailPage($code, $id)
    {
        $ids = Crypt::decrypt($id);
        $user = User::where('code', $code)->firstOrFail();

        $property = Property::where('id', $ids)
            ->where('parent_id', $user->id)
            ->firstOrFail();

        $units = PropertyUnit::where('property_id', $property->id)->orderBy('id', 'desc')->get();
        $settings = settingsById($user->id);

        $selectedAmenities = collect();
        if (!empty($property->amenities_id)) {
            $amenityIds = array_filter(explode(',', $property->amenities_id));
            $selectedAmenities = Amenity::whereIn('id', $amenityIds)->get();
        }

        $selectedAdvantages = collect();
        if (!empty($property->advantage_id)) {
            $advantageIds = array_filter(explode(',', $property->advantage_id));
            $selectedAdvantages = Advantage::whereIn('id', $advantageIds)->get();
        }

        return $this->renderThemeView($user, 'detail', compact('code', 'property', 'user', 'settings', 'selectedAmenities', 'selectedAdvantages', 'units'));
    }

    public function contactPage(Request $request, $code)
    {
        $user = User::where('code', $code)->first();
        $settings = settingsById($user->id);
        return $this->renderThemeView($user, 'contact', compact('settings', 'user'));
    }

    public function getStates(Request $request)
    {
        // For AJAX requests, we need to get the owner from the request
        $host = $request->getHost();
        $owner = User::where('custom_domain', $host)
                     ->where('custom_domain_enabled', 1)
                     ->where('custom_domain_verified', 1)
                     ->first();

        if (!$owner) {
            return response()->json([]);
        }

        $states = Property::where('parent_id', $owner->id)
            ->where('country', $request->country)
            ->distinct()
            ->pluck('state');

        return response()->json($states);
    }

    public function getCities(Request $request)
    {
        $host = $request->getHost();
        $owner = User::where('custom_domain', $host)
                     ->where('custom_domain_enabled', 1)
                     ->where('custom_domain_verified', 1)
                     ->first();

        if (!$owner) {
            return response()->json([]);
        }

        $cities = Property::where('parent_id', $owner->id)
            ->where('state', $request->state)
            ->distinct()
            ->pluck('city');

        return response()->json($cities);
    }

    public function search(Request $request, $code)
    {
        $user = User::where('code', $code)->firstOrFail();
        $settings = settingsById($user->id);
        $theme = $this->getTheme($user);

        $query = Property::where('parent_id', $user->id);

        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        if ($request->filled('state')) {
            $query->where('state', $request->state);
        }

        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        $properties = $query->paginate(12);

        $noPropertiesMessage = $properties->isEmpty()
            ? 'No properties available with the selected filters.'
            : '';

        if ($request->ajax()) {
            if (view()->exists($theme . '.propertybox')) {
                return view($theme . '.propertybox', [
                    'properties' => $properties,
                    'settings' => $settings,
                    'user' => $user,
                    'noPropertiesMessage' => $noPropertiesMessage,
                ])->render();
            }
            return view('theme.propertybox', [
                'properties' => $properties,
                'settings' => $settings,
                'user' => $user,
                'noPropertiesMessage' => $noPropertiesMessage,
            ])->render();
        }

        return $this->renderThemeView($user, 'property', compact('user', 'properties', 'settings'));
    }
}
