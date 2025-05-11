    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Značka</th>
                <th scope="col">Názov</th>
                <th scope="col">Kategória</th>
                <th scope="col">Pohlavie</th>
                <th scope="col">Velkosť</th>
                <th scope="col">Cena</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->brand->nazov }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->type->nazov }}</td>
                    <td>{{ $product->gender->nazov }}</td>
                    <td>{{ $product->cena }}€</td>
                    <td>{{ $product->velkost_od . ' - ' . $product->velkost_do }}</td>
                    <td>
                        <div class="btn-group">
                            <form action="{{ route('admin.produkt.delete', $product->id) }}" method="POST">
                                <a href="{{ route('admin.produkt.edit', $product->id) }}"
                                    class="btn btn-primary">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Delete product?')">X</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
