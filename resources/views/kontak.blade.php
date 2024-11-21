<!-- Include Header -->
@include('header')


<div class="container mx-auto mt-10">
    <h2 class="text-3xl font-bold mb-4">Kontak Kami</h2>
    <p class="text-gray-600">Jika ada pertanyaan, silahkan hubungi kami melalui email berikut:</p>
    <a href="mailto:{{ config('app.email') }}" class="text-blue-500 hover:text-blue-700">{{ config('app.email') }}</a>
    
    @foreach($kontak as $item)
        <p class="text-gray-600">{{ $item->nama }}: {{ $item->email }}</p>
    @endforeach
</div>




<!-- Include Footer -->
@include('footer')