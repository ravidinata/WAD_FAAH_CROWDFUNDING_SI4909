<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\KategoriBantuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    private function rules(): array
    {
        return [
            'judul' => 'required|string|max:255',
            'kategori_bantuan_id' => 'required|exists:kategori_bantuans,id',
            'target_dana' => 'required|numeric|min:1000',
            'terkumpul' => 'nullable|numeric|min:0',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:5120',
        ];
    }

    public function index()
    {
        $campaigns = Campaign::with('kategori')->latest()->paginate(10);
        return view('campaigns.index', compact('campaigns'));
    }

    public function show(Campaign $campaign)
    {
        return view('campaigns.show' , compact('campaign'));
    }

    public function create()
    {
        return view('campaigns.create', ['kategoris' => KategoriBantuan::all()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['user_id'] = auth()->id();
        $data['terkumpul'] = $data['terkumpul'] ?? 0;
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('campaigns', 'public');
        }
        Campaign::create($data);

        return redirect()->route('campaigns.index')->with('success', 'Campaign berhasil dibuat.');
    }

    public function edit(Campaign $campaign)
    {
        return view('campaigns.edit', ['campaign' => $campaign, 'kategoris' => KategoriBantuan::all()]);
    }

    public function update(Request $request, Campaign $campaign)
    {
        $data = $request->validate($this->rules());
        $data['terkumpul'] = $data['terkumpul'] ?? 0;
        if ($request->hasFile('gambar')) {
            if ($campaign->gambar) Storage::disk('public')->delete($campaign->gambar);
            $data['gambar'] = $request->file('gambar')->store('campaigns', 'public');
        }
        $campaign->update($data);

        return redirect()->route('campaigns.index')->with('success', 'Campaign berhasil diperbarui.');
    }

    public function destroy(Campaign $campaign)
    {
        if ($campaign->gambar) Storage::disk('public')->delete($campaign->gambar);
        $campaign->delete();

        return redirect()->route('campaigns.index')->with('success', 'Campaign berhasil dihapus.');
    }

    public function donasi(Request $request, Campaign $campaign)
    {
        $data = $request->validate(['jumlah' => 'required|numeric|min:1000']);
        $campaign->increment('terkumpul', $data['jumlah']);

        return back()->with('success', 'Terima kasih atas donasi Anda!');
    }
}