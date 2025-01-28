<x-app-layout>
<div class="service-details">
    <!-- Отображение фото, если оно есть -->
        @if($service->photo)
            <img src="{{ asset('storage/uploadPhotos/' . $service->photo) }}" alt="{{ $service->name }}" class="img-fluid">
        @else
            <p>No image available</p>
        @endif

        <h1>{{ $service->name }}</h1>
        <p><strong>Description:</strong> {{ $service->description }}</p>
        <p><strong>Price:</strong> ${{ $service->price }}</p>

        <!-- Дополнительная информация или действия -->
        <a href="{{ route('shop') }}" class="btn btn-primary">Back to services</a>
    </div>

</x-app-layout>