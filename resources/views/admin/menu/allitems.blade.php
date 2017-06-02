@foreach ($sections as $section)

<h2>{{ $section->name }}</h2>
<table class="table table-striped">
<thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Featured</th>
        <th>GF</th>
        <th>VEG</th>
    </tr>
</thead>
<tbody>
    @foreach ($items as $item)
        @if($item->section_id === $section->id)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }} </td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->featured }}</td>
                <td>{{ $item->gf }}</td>
                <td>{{ $item->veg }}</td>
            </tr>
        @endif
    @endforeach
    
</tbody>
</table>

@endforeach
