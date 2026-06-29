<?php
namespace App\Http\Controllers;
use App\Models\Menu;
class DashboardController extends Controller
{
    public function index()
    {
        $totalMenu = Menu::count();
        $menuTerbaru = Menu::latest()->limit(5)->get();
        $kategoris = Menu::select('kategori')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('kategori')
            ->get();
        return view('admin.dashboard', compact('totalMenu', 'menuTerbaru', 'kategoris'));
    }
}
