<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class ContactController extends Controller
{
    public function index(): View
    {
        $settings = Setting::select('key', 'value')->whereIn('key', ['email', 'phone'])->get();

        // dd($setting);
        return view('website.pages.contact.contact', [
            'email' => $settings->firstWhere('key', 'email'),
            'phone' => $settings->firstWhere('key', 'phone'),

        ]);
    }

    public function store(StoreContactRequest $request): JsonResponse
    {
        $request->addContact();
        $data = ['success' => 'your message sent successfully'];

        return Response::json($data);
    }
}
