<?php
namespace App\Http\Controllers;
use App\Models\Menu;
use Barryvdh\DomPDF\Facade\Pdf;
class PdfController extends Controller
{
    public function export()
    {
        $menus = Menu::orderBy('id_menu')->get();
        $tanggal = now()->translatedFormat('d F Y');
        $pdf = Pdf::loadView('pdf.menu-report', compact('menus', 'tanggal'))
            ->setPaper('a4', 'portrait');
        return $pdf->download('Laporan-Menu-Restoran-' . now()->format('Y-m-d') . '.pdf');
    }
}
