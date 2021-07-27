<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
   
    public function index()
    {
        //
        $portfolio = Portfolio::query()->with('category')->get();
        return view('portfolio.index', ['data' => $portfolio]);
    }

   

    public function create()
    {
        //
        $category = PortfolioCategory::all();
        return view('portfolio.add', ['data' => $category]);
    }

  
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $portfolio = new Portfolio();

        $portfolio->name = $input['name'];
        $portfolio->client = $input['client'];
        $portfolio->project_date = $input['project_date'];
        $portfolio->project_url = $input['project_url'];
        $portfolio->detail = $input['detail'];
        $portfolio->portfolio_category_id = $input['portfolio_category_id'];

        $portfolio->save();
        return redirect('/cms/portfolios')->with('pesan', 'Portfolio Added');
    }

    public function viewPortfolio($id) {
        $portfolio = Portfolio::query()->with('images')->where('id', $id)->first();
        return view('portfolio.view', ['data' => $portfolio]);
    }
   
    public function edit($id)
    {
        //
         $portfolio = Portfolio::find($id);
         $category = PortfolioCategory::all();
         return view('portfolio.update', ['data' => $portfolio, 'categories' => $category]);
    }

    public function update(Request $request)
    {
        //
        $input = $request->all();
        $portfolio = Portfolio::find($input['id']);

        $portfolio->name = $input['name'] ?? $portfolio->name;
        $portfolio->client = $input['client'] ?? $portfolio->client;
        $portfolio->project_date = $input['project_date'] ?? $portfolio->project_date;
        $portfolio->project_url = $input['project_url'] ?? $portfolio->project_url;
        $portfolio->detail = $input['detail'] ?? $portfolio->detail;
        $portfolio->portfolio_category_id = $input['portfolio_category_id'] ?? $portfolio->portfolio_category_id;
        $portfolio->save();

        return redirect('/cms/portfolios/'.$portfolio->id)->with('pesan', 'Portfolio Updated');
    }

    public function addImage(Request $request) {
        $gallery = new PortfolioImage();
        $id = $request->input('id');
        if ($request->has('image')) {
            $file = $request->file('image');
            $path = file_get_contents($file);
            $base64 = base64_encode($path);
            $gallery->portfolio_id = $id;
            $gallery->image = $base64;
            $gallery->save();
            return redirect()->back()->with('pesan', 'Image Added');
        }
    }

    public function destroyImage($id) {
        $gallery = PortfolioImage::find($id);
        $gallery->delete();
        return redirect()->back()->with('pesan', 'Portfolio Deleted');
    }

    public function destroy($id)
    {
        //
        $portfolio = Portfolio::find($id);
        $portfolio->delete();
        return redirect('/cms/portfolios')->with('pesan', 'Portfolio Deleted');
    }
}
