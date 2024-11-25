<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Exemplo de array de itens em memória (sem banco de dados)
    private $items = [
        ['id' => 1, 'name' => 'Item 1'],
        ['id' => 2, 'name' => 'Item 2'],
        ['id' => 3, 'name' => 'Item 3'],
        ['id' => 4, 'name' => 'Item 4'],
    ];

    // Exibir a lista de itens
    public function index()
    {
        return view('items.index', ['items' => $this->items]);
    }

    // Atualizar a ordem dos itens
    public function updateOrder(Request $request)
    {
        $order = $request->get('order'); // Recebe o novo ordenamento

        // Reordena os itens com base no novo índice
        $orderedItems = [];
        foreach ($order as $id) {
            foreach ($this->items as $item) {
                if ($item['id'] == $id) {
                    $orderedItems[] = $item;
                    break;
                }
            }
        }

        // Atualiza a lista de itens na memória
        $this->items = $orderedItems;

        // Retorna uma resposta de sucesso
        return response()->json(['status' => 'success']);
    }
}
