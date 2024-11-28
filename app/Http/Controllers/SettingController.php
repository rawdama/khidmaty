<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadImageTrait;

class SettingController extends Controller
{
    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::first(); 
        return view('pages.settings.index', compact('settings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules());
        $setting = Setting::first() ?: new Setting();
        if ($setting->admin_id && $setting->admin_id !== Auth::guard('admin')->id()) {
            return redirect()->route('settings.index')->withErrors(['error' => 'You are not authorized to make changes to these settings.']);
        }
       
        if (!$setting->exists) {
            $setting->admin_id = Auth::guard('admin')->id(); 
        }
        $this->saveSettings($setting, $request);
        return redirect()->route('settings.index')->with('success', 'Settings saved successfully.');
    }

    protected function validationRules()
    {
        return [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'email' => 'required|string|email|unique:settings,email,' . (Setting::first()->id ?? 'NULL'),
            'address_ar' => 'nullable|string',
            'address_en' => 'nullable|string',
            'Currency' => 'nullable|string',
            'terms_policies' => 'nullable|string',
            'privacy_policy' => 'nullable|string',
            'about' => 'nullable|string',
            'who_we_are' => 'nullable|string',
            'phone_1' => 'nullable|string',
            'phone_2' => 'nullable|string',
            'twitter_link' => 'url',
            'facebook_link' => 'url',
            'instagram_link' => 'url',
            'snapchat_link' => 'url',
            'linkedin_link' => 'url',
            'youtube_link' => 'url',
            'whatsapp_link' => 'url',
            'app_store_link' => 'url',
            'google_play_link' => 'url',
            'header_logo' => 'image|mimes:jpeg,png,jpg,gif,jfif,svg|max:2048',
            'footer_logo' => 'image|mimes:jpeg,png,jpg,gif,jfif|max:2048',
            'favicon' => 'image|mimes:jpeg,png,jpg,gif,jfif|max:2048',
            'about_image' => 'image|mimes:jpeg,png,jpg,gif,jfif|max:2048',
        ];
    }

    protected function saveSettings($setting, Request $request)
    {
        foreach (config('app.languages') as $locale => $language) {
            $setting->translateOrNew($locale)->name = $request->input("name_$locale");
            $setting->translateOrNew($locale)->address = $request->input("address_$locale");
            $setting->translateOrNew($locale)->Currency = $request->input("Currency_$locale");
            $setting->translateOrNew($locale)->terms_policies = $request->input("terms_policies_$locale");
            $setting->translateOrNew($locale)->privacy_policy = $request->input("privacy_policy_$locale");
            $setting->translateOrNew($locale)->about = $request->input("about_$locale");
            $setting->translateOrNew($locale)->who_we_are = $request->input("who_we_are_$locale");
        }

        $setting->phone_1 = $request->input('phone_1');
        $setting->phone_2 = $request->input('phone_2');
        $setting->email = $request->input('email');
        $setting->twitter_link = $request->input('twitter_link');
        $setting->facebook_link = $request->input('facebook_link');
        $setting->instagram_link = $request->input('instagram_link');
        $setting->snapchat_link = $request->input('snapchat_link');
        $setting->linkedin_link = $request->input('linkedin_link');
        $setting->youtube_link = $request->input('youtube_link');
        $setting->whatsapp_link = $request->input('whatsapp_link');
        $setting->app_store_link = $request->input('app_store_link');
        $setting->google_play_link = $request->input('google_play_link');

        if ($request->hasFile('header_logo')) {
            $setting->header_logo = $this->uploadFile($request, 'uploads', 'header_logo');
        }
        if ($request->hasFile('footer_logo')) {
            $setting->footer_logo = $this->uploadFile($request, 'uploads', 'footer_logo');
        }
        if ($request->hasFile('favicon')) {
            $setting->favicon = $this->uploadFile($request, 'uploads', 'favicon');
        }
        if ($request->hasFile('about_image')) {
            $setting->about_image = $this->uploadFile($request, 'uploads', 'about_image');
        }

        $setting->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}