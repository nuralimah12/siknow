<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\DocumentCategory;
use App\Models\Dokumen;
use App\Models\ProgramStudy;
use App\Models\Thesis;
use App\Models\ThesisCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function welcomeView()
    {
        return view('public_views.welcome');
    }

    public function homeView(Request $request)
    {
        $searchParams = [
            'title' => $request->title,
            'id_departemen' => $request->id_program_study,
            'id_category' => $request->id_category,
            'name' => $request->author,
            'publication_from' => $request->publication_from ? Carbon::createFromDate($request->publication_from, 1)->startOfYear() : null,
            'publication_until' => $request->publication_until ? Carbon::createFromDate($request->publication_until, 1)->endOfYear() : null,
        ];
        
        $documents = DB::table('dokumen as t')
        ->where('t.title', 'like', '%'.$searchParams['title'].'%')
        ->when($searchParams['id_category'], function($query) use ($searchParams){
            return $query->whereIn('t.id_category', $searchParams['id_category']);
        })
        ->when($searchParams['id_departemen'], function($query) use ($searchParams){
            return $query->whereIn('u.id_departemen', $searchParams['id_departemen']);
        })
        ->when($searchParams['name'], function($query) use ($searchParams){
            return $query->where('u.name', $searchParams['name']);
        })
        ->when($searchParams['publication_from'], function($query) use ($searchParams){
            return $query->where('t.created_at', '>=',$searchParams['publication_from']);
        })
        ->when($searchParams['publication_until'], function($query) use ($searchParams){
            return $query->where('t.created_at', '<=',$searchParams['publication_until']);
        })
        ->join('users as u', 'u.id', 't.id_user')
        ->join('departemen as ps', 'ps.id', 'u.id_departemen')
        ->join('document_category as c', 'c.id', 't.id_category')
        ->selectRaw('t.id as document_id, u.id as user_id, u.name as user_name, t.title as document_title, t.deskripsi as document_deskripsi, ps.name departemen_name, c.category as document_category, t.created_at as publication')
        ->orderBy('t.id', 'desc')
        ->paginate(5);

        $categories = DocumentCategory::all();

        $prodys = Departemen::all();
            
        return view('public_views.home', ['documents' => $documents, 'categories' => $categories, 'prodys' => $prodys]);
    }

    public function getSuggestionTitle( Request $request)
    {
        $searchInput = $request->title;

        $titles = Dokumen::select('title')
        ->where('title', 'like', '%'.$searchInput.'%')
        ->orderBy('id', 'desc')
        ->limit(7)
        ->get();

        return response()->json($titles);
    }

    public function getSuggestionAuthor( Request $request)
    {
        $searchInput = $request->title;

        $titles = User::select('name')->where('name', 'like', '%'.$searchInput.'%')->get();

        return response()->json($titles);
    }

}
