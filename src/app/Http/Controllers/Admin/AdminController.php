<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::with('category');

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%")
                    ->orWhere('last_name', 'like', "%{$keyword}%")
                    ->orWhereRaw(
                        "CONCAT(first_name, last_name) LIKE ?",
                        ["%{$keyword}%"]
                    )
                    ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7)->appends($request->query());
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect('admin')->with('message', '削除しました');
    }

    public function export(Request $request)
    {
        $query = Contact::with('category');

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%")
                    ->orWhere('last_name', 'like', "%{$keyword}%")
                    ->orWhereRaw("CONCAT(first_name, last_name) LIKE ?", ["%{$keyword}%"])
                    ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->get();

        $filename = 'contacts_export_' . date('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$filename}",
        ];

        $columns = ['お名前', '性別', 'メールアドレス', '電話番号', '住所', '建物名', 'お問い合わせの種類', 'お問い合わせ内容', '登録日'];

        $callback = function () use ($contacts, $columns) {
            $file = fopen('php://output', 'w');
            echo "\xEF\xBB\xBF";
            fputcsv($file, $columns);

            foreach ($contacts as $contact) {
                $row = [
                    $contact->first_name . ' ' . $contact->last_name,
                    $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他'),
                    $contact->email,
                    $contact->tel,
                    $contact->address,
                    $contact->building,
                    $contact->category->content ?? '',
                    $contact->detail,
                    $contact->created_at->format('Y-m-d H:i:s'),
                ];
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
