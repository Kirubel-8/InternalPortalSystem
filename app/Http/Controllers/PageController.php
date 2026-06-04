<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\System;
class PageController extends Controller
{
    public function index()
    {
        $blogsData = $this->getData1();
        $portalData = $this->getData2();
        // Combine the data from the two functions
        $data = array_merge($blogsData, $portalData);
        // Pass the combined data to the view
        return view('systems', $data);
    }

    private function getData1()
    {
        // Your logic here
        $blogs = Post::all();
            // $data1 = [];
            $data = ['blogs' => $blogs, 'date' => null, 'month' => null];
            foreach ($blogs as $blog) {
                $date = $blog->created_at->format('d'); // to get the date
                $month = $blog->created_at->format('M'); // Get the short month name from the created_at field
            
            //     return ['blogs' => $blogs, 'date' => $date, 'month' => $month];
            // }
            $data['date'] = $date;
            $data['month'] = $month;
            }
            return $data;
            // return $data;
    }

    private function getData2()
    {
        // Your logic here
        $portalsystem = System::all();
            return ['portalsystem' => $portalsystem];
        }
}
