@extends('layouts.app')
@section('title', 'Katalog Aset')
@section('content')
<section class="hero">
    <div><p class="eyebrow">ASSET MANAGEMENT · FITE IT DEL</p><h1>Temukan perangkat<br><span>yang kamu butuhkan.</span></h1><p class="hero-copy">Jelajahi inventaris laboratorium dan ajukan peminjaman dengan proses yang lebih teratur.</p></div>
    <div class="hero-art" aria-hidden="true"><div class="orb orb-one"></div><div class="orb orb-two"></div><div class="device">⌘</div><span class="art-label">LAB ASSET<br>CATALOG</span></div>
</section>
<section class="section-heading"><div><p class="eyebrow">INVENTARIS</p><h2>Katalog aset</h2><p class="muted">Cari perangkat berdasarkan nama, kode aset, kategori, atau status.</p></div><a class="button primary" href="{{ route('equipments.create') }}">＋ Tambah aset</a></section>
<form class="filter-panel" method="GET" action="{{ route('equipments.index') }}">
    <label class="search-field"><span aria-hidden="true">⌕</span><input type="search" name="search" value="{{ request('search') }}" placeholder="Cari nama atau kode aset..." aria-label="Kata kunci pencarian"></label>
    <label class="sr-label" for="category_id">Kategori</label><select id="category_id" name="category_id"><option value="">Semua kategori</option>@foreach($categories as $category)<option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>{{ $category->name }}</option>@endforeach</select>
    <label class="sr-label" for="status">Status</label><select id="status" name="status"><option value="">Semua status</option><option value="tersedia" @selected(request('status')==='tersedia')>Tersedia</option><option value="dipinjam" @selected(request('status')==='dipinjam')>Dipinjam</option><option value="dalam_perbaikan" @selected(request('status')==='dalam_perbaikan')>Dalam Perbaikan</option></select>
    <button class="button dark" type="submit">Cari aset</button>
</form>
<div class="results-line"><span><strong>{{ $equipments->total() }}</strong> aset ditemukan</span><span class="muted">Menampilkan halaman {{ $equipments->currentPage() }} dari {{ max(1, $equipments->lastPage()) }}</span></div>
<div class="asset-grid">
@forelse($equipments as $equipment)
    <article class="asset-card">
        <a class="asset-visual" href="{{ route('equipments.show', $equipment) }}" aria-label="Lihat detail {{ $equipment->name }}">
            @if($equipment->image_path)<img src="{{ asset('storage/'.$equipment->image_path) }}" alt="Foto {{ $equipment->name }}">@else<div class="asset-placeholder"><span>{{ strtoupper(substr($equipment->category->code, 0, 3)) }}</span><b>{{ $equipment->category->code }}</b></div>@endif
            <span class="status status-{{ $equipment->status }}">{{ str_replace('_', ' ', ucfirst($equipment->status)) }}</span>
        </a>
        <div class="asset-info"><p class="asset-category">{{ $equipment->category->name }}</p><h3><a href="{{ route('equipments.show', $equipment) }}">{{ $equipment->name }}</a></h3><p class="asset-code">{{ $equipment->asset_code }} · {{ $equipment->brand ?: 'Merek tidak dicantumkan' }}</p><div class="asset-bottom"><div><span class="muted small">Biaya / hari</span><strong>Rp {{ number_format((float)$equipment->daily_rental_fee, 0, ',', '.') }}</strong></div><a class="text-link" href="{{ route('equipments.show', $equipment) }}">Detail ↗</a></div></div>
    </article>
@empty
    <div class="empty-state"><div class="empty-icon">⌕</div><h3>Aset tidak ditemukan</h3><p>Coba kata kunci atau filter lain.</p><a class="text-link" href="{{ route('equipments.index') }}">Hapus semua filter</a></div>
@endforelse
</div>
@if($equipments->hasPages())<nav class="pagination" aria-label="Navigasi halaman">{{ $equipments->links() }}</nav>@endif
@endsection
