<?php
namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
class MenuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Menu::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('gambar_preview', function ($row) {
                    $url = asset('storage/' . $row->gambar);
                    return '<img src="' . $url . '" alt="' . $row->nama_menu . '" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">';
                })
                ->addColumn('harga_format', function ($row) {
                    return 'Rp ' . number_format($row->harga, 0, ',', '.');
                })
                ->addColumn('action', function ($row) {
                    $showUrl = route('admin.menus.show', $row->id);
                    $editUrl = route('admin.menus.edit', $row->id);
                    return '
                        <div class="d-flex gap-1">
                            <a href="' . $showUrl . '" class="btn btn-sm btn-outline-info" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="' . $editUrl . '" class="btn btn-sm btn-outline-warning" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button class="btn btn-sm btn-outline-danger btn-delete" data-id="' . $row->id . '" data-name="' . $row->nama_menu . '" title="Hapus">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>';
                })
                ->rawColumns(['gambar_preview', 'action'])
                ->make(true);
        }
        return view('admin.menus.index');
    }
    public function create()
    {
        return view('admin.menus.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_menu'   => ['required', 'string', 'unique:menus,id_menu'],
            'gambar'    => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'nama_menu' => ['required', 'string', 'max:255'],
            'kategori'  => ['required', 'string', 'max:255'],
            'harga'     => ['required', 'numeric', 'min:0'],
            'deskripsi' => ['required', 'string'],
        ], [
            'id_menu.required'   => 'ID Menu wajib diisi.',
            'id_menu.unique'     => 'ID Menu sudah digunakan.',
            'gambar.required'    => 'Gambar menu wajib diupload.',
            'gambar.image'       => 'File harus berupa gambar.',
            'gambar.mimes'       => 'Gambar harus berformat JPG, JPEG, atau PNG.',
            'gambar.max'         => 'Ukuran gambar maksimal 2 MB.',
            'nama_menu.required' => 'Nama menu wajib diisi.',
            'kategori.required'  => 'Kategori wajib diisi.',
            'harga.required'     => 'Harga wajib diisi.',
            'harga.numeric'      => 'Harga harus berupa angka.',
            'harga.min'          => 'Harga tidak boleh negatif.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
        ]);
        $path = $request->file('gambar')->store('menus', 'public');
        $validated['gambar'] = $path;
        Menu::create($validated);
        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu berhasil ditambahkan!');
    }
    public function show(Menu $menu)
    {
        return view('admin.menus.show', compact('menu'));
    }
    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'id_menu'   => ['required', 'string', 'unique:menus,id_menu,' . $menu->id],
            'gambar'    => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'nama_menu' => ['required', 'string', 'max:255'],
            'kategori'  => ['required', 'string', 'max:255'],
            'harga'     => ['required', 'numeric', 'min:0'],
            'deskripsi' => ['required', 'string'],
        ], [
            'id_menu.required'   => 'ID Menu wajib diisi.',
            'id_menu.unique'     => 'ID Menu sudah digunakan.',
            'gambar.image'       => 'File harus berupa gambar.',
            'gambar.mimes'       => 'Gambar harus berformat JPG, JPEG, atau PNG.',
            'gambar.max'         => 'Ukuran gambar maksimal 2 MB.',
            'nama_menu.required' => 'Nama menu wajib diisi.',
            'kategori.required'  => 'Kategori wajib diisi.',
            'harga.required'     => 'Harga wajib diisi.',
            'harga.numeric'      => 'Harga harus berupa angka.',
            'harga.min'          => 'Harga tidak boleh negatif.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
        ]);
        if ($request->hasFile('gambar')) {
            if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
                Storage::disk('public')->delete($menu->gambar);
            }
            $path = $request->file('gambar')->store('menus', 'public');
            $validated['gambar'] = $path;
        } else {
            unset($validated['gambar']);
        }
        $menu->update($validated);
        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu berhasil diperbarui!');
    }
    public function destroy(Menu $menu)
    {
        if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
            Storage::disk('public')->delete($menu->gambar);
        }
        $menu->delete();
        return response()->json([
            'success' => true,
            'message' => 'Menu berhasil dihapus!',
        ]);
    }
}
