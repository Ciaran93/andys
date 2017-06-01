

@foreach ($items as $item)
    <p>{{ $item->id }} {{ $item->name }}  {{ $item->description }} {{ $item->price }}</p>
@endforeach