<?php
namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Menu::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama_menu', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->input('kategori'));
        }
        $menus = $query->latest()->paginate(3);
        $kategoris = Menu::select('kategori')->distinct()->pluck('kategori');
        return view('home', compact('menus', 'kategoris'));
    }
    public function show(string $id)
    {
        $menu = Menu::where('id_menu', $id)->firstOrFail();
        $relatedMenus = Menu::where('kategori', $menu->kategori)
            ->where('id', '!=', $menu->id)
            ->limit(4)
            ->get();
        return view('menu-detail', compact('menu', 'relatedMenus'));
    }
}
