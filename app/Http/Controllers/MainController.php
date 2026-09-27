<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    // Метод для главной страницы: читаем JSON и передаем в представление
    public function index()
    {
        $jsonPath = public_path('articles.json');
        
        $articles = [];
        if (file_exists($jsonPath)) {
            $jsonContent = file_get_contents($jsonPath);
            $articles = json_decode($jsonContent, true) ?? [];
        }

        return view('home', ['articles' => $articles]);
    }

    // Метод для страницы галереи/просмотра полноразмерного изображения
    public function gallery(Request $request, $id = null)
    {
        $jsonPath = public_path('articles.json');
        $articles = [];
        
        if (file_exists($jsonPath)) {
            $jsonContent = file_get_contents($jsonPath);
            $articles = json_decode($jsonContent, true) ?? [];
        }

        // Ищем конкретную запись по id, иначе берём первую доступную
        $selectedArticle = null;
        if ($id !== null) {
            foreach ($articles as $item) {
                if (isset($item['id']) && $item['id'] == $id) {
                    $selectedArticle = $item;
                    break;
                }
            }
        }

        if (!$selectedArticle && count($articles) > 0) {
            $selectedArticle = $articles[0];
        }

        return view('gallery', [
            'article' => $selectedArticle,
            'articles' => $articles
        ]);
    }
}