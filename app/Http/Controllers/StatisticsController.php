<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class StatisticsController extends Controller
{
    public function index()
    {
            $data = DB::table('users')
              ->select(
               DB::raw('gender as gender'),
               DB::raw('count(*) as number'))
              ->groupBy('gender')
              ->get();
            $array[] = ['Gender', 'Number'];
            foreach($data as $key => $value)
            {
             $array[++$key] = [$value->gender, $value->number];
            }
        return view('Statistics/Statistics')->with('gender', json_encode($array));
        }
    };

  