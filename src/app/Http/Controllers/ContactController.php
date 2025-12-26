<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'address',
            'building',
            'category_id',
            'detail',
        ]);
        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;
        $genderMap = [1 => '男性', 2 => '女性', 3 => 'その他'];
        $contact['gender_label'] = $genderMap[$contact['gender']] ?? '';
        $contact['category_label'] =
            Category::find($contact['category_id'])->content ?? '';
        $inputs = $request->except('_token');
        return view('confirm', compact('contact', 'inputs'));
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function store(Request $request)
    {
        Contact::create([
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'gender'      => $request->gender,
            'email'       => $request->email,
            'tel'         => $request->tel,
            'address'     => $request->address,
            'building'    => $request->building,
            'category_id' => $request->category_id,
            'detail'      => $request->detail,
        ]);
        return redirect()->route('thanks');
    }

    public function edit(Request $request)
    {
        return redirect()
            ->route('contact.index')
            ->withInput($request->all());
    }

}
