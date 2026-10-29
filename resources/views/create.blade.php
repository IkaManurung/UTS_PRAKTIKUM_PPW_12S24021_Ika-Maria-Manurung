@extends('layouts.app')
@section('title', 'Tambah Aset')
@section('content')
<div class="page-intro"><p class="eyebrow">INVENTARIS / ASET BARU</p><h1>Daftarkan perangkat</h1><p class="muted">Lengkapi informasi berikut agar aset tercatat dalam katalog laboratorium.</p></div>
<form class="form-card" method="POST" action="{{ route('equipments.store') }}" enctype="multipart/form-data">
@csrf
<div class="form-section"><h2>Informasi dasar</h2><p class="muted">Identitas utama dan pengelompokan perangkat.</p>
<div class="form-grid">
<div class="field"><label for="category_id">Kategori <em>*</em></label><select id="category_id" name="category_id" required><option value="">Pilih kategori</option>@foreach($categories as $category)<option value="{{ $category->id }}" @selected(old('category_id')==$category->id)>{{ $category->name }}</option>@endforeach</select>@error('category_id')<small class="field-error">{{ $message }}</small>@enderror</div>
<div class="field"><label for="asset_code">Kode aset <em>*</em></label><input id="asset_code" name="asset_code" value="{{ old('asset_code') }}" required maxlength="40" placeholder="Contoh: EQ-IOT-005">@error('asset_code')<small class="field-error">{{ $message }}</small>@enderror</div>
<div class="field full"><label for="name">Nama perangkat <em>*</em></label><input id="name" name="name" value="{{ old('name') }}" required maxlength="150" placeholder="Nama lengkap perangkat">@error('name')<small class="field-error">{{ $message }}</small>@enderror</div>
<div class="field"><label for="brand">Merek</label><input id="brand" name="brand" value="{{ old('brand') }}" maxlength="100" placeholder="Nama merek (opsional)"></div>
<div class="field"><label for="condition">Kondisi <em>*</em></label><select id="condition" name="condition" required><option value="baik" @selected(old('condition','baik')==='baik')>Baik</option><option value="perlu_perbaikan" @selected(old('condition')==='perlu_perbaikan')>Perlu perbaikan</option><option value="rusak" @selected(old('condition')==='rusak')>Rusak</option></select></div>
<div class="field full"><label for="specifications">Spesifikasi <em>*</em></label><textarea id="specifications" name="specifications" required rows="4" maxlength="2000" placeholder="Tuliskan spesifikasi utama perangkat...">{{ old('specifications') }}</textarea></div>
<div class="field"><label for="daily_rental_fee">Biaya kompensasi per hari (Rp) <em>*</em></label><input type="number" id="daily_rental_fee" name="daily_rental_fee" min="0" step="500" value="{{ old('daily_rental_fee', 0) }}" required></div>
<div class="field"><label for="image">Foto perangkat</label><input type="file" id="image" name="image" accept="image/jpeg,image/png,image/webp"><small class="hint">JPG, PNG, atau WEBP. Maksimal 2 MB.</small></div>
</div></div>
<div class="form-actions"><a class="button secondary" href="{{ route('equipments.index') }}">Batal</a><button class="button primary" type="submit">Simpan aset →</button></div>
</form>
@endsection
