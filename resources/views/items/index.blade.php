<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag and Drop na tabela Usando Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
</head>

<body>
    <h1 class="text-center mt-4">Lista de Itens</h1>
    <div class="container mt-5">
        <table class="table table-bordered" id="sortable-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                </tr>
            </thead>
            <tbody id="sortable-list">
                @foreach ($items as $item)
                    <tr data-id="{{ $item['id'] }}">
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['name'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Inicializando o SortableJS para permitir o drag and drop nas linhas da tabela
        const el = document.getElementById('sortable-list');
        const sortable = new Sortable(el, {
            animation: 150,
            onEnd: function(evt) {
                // Coletando a nova ordem das linhas
                const order = [];
                const listItems = el.querySelectorAll('tr');
                listItems.forEach(function(item) {
                    order.push(item.getAttribute('data-id'));
                });

                // Enviar a nova ordem para o backend via AJAX
                fetch('/items/update-order', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ order: order }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        console.log('Ordem atualizada com sucesso');
                    }
                });
            }
        });
    </script>
</body>

</html>
