<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\OrderItem;

class ReportController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $items = OrderItem::all();
        return view('report.index', compact('menus', 'items'));
    }
}
