<div class="form-group">
    <label>Judul Campaign</label>
    <input type="text" name="judul" value="{{ old('judul', $campaign->judul ?? '') }}">
    @error('judul') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Kategori Bantuan</label>
    <select name="kategori_bantuan_id">
        <option value="">-- Pilih kategori --</option>
        @foreach ($kategoris as $k)
            <option value="{{ $k->id }}" @selected(old('kategori_bantuan_id', $campaign->kategori_bantuan_id ?? '') == $k->id)>
                {{ $k->nama }}
            </option>
        @endforeach
    </select>
    @error('kategori_bantuan_id') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Target Dana (Rp)</label>
    <input type="number" name="target_dana" value="{{ old('target_dana', isset($campaign) ? (int) $campaign->target_dana : '') }}">
    @error('target_dana') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Deskripsi Singkat</label>
    <textarea name="deskripsi" rows="3">{{ old('deskripsi', $campaign->deskripsi ?? '') }}</textarea>
    @error('deskripsi') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Gambar (opsional)</label>
    <input type="file" name="gambar" accept="image/*">
    @error('gambar') <div class="error">{{ $message }}</div> @enderror
</div>
<div class="form-group">
    <label>Dana Terkumpul (Rp)</label>
    <input type="number" name="terkumpul" value="{{ old('terkumpul', isset($campaign) ? (int) $campaign->terkumpul : 0) }}">
    @error('terkumpul') <div class="error">{{ $message }}</div> @enderror
</div>