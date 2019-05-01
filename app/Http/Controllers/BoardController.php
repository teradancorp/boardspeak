<?php

namespace App\Http\Controllers;

use App\Board;
use App\Boardmember;
use Torann\GeoIP\Facades\GeoIP;
use Illuminate\Http\Request;
//use App\Defaultboardcover;
use Auth;
class BoardController extends Controller
{
    //
    public function index()
    {
//        if(Auth::user())
        //    return ("hello");
//            return redirect()->route('member');
//        else
//        {

//        }
        //$ipaddress = \Request::getClientIp(true);
        //$location = geoip($ipaddress);
        //dd($location);
        //echo $location->country;
        $boards = \App\Board::all();
        return view('boards/board', compact('boards'));

    }
    public function createboard(Request $request)
    {
        //$request->session()->flush();
        $categories = \App\Category::where('category_type', 1)->get();
        return view('boards/createboard', compact('categories'));
    }
    public function summary(Request $request)
    {
        session(['board-name' => request('board-name')]);
        if($request->has('board-name-hide'))
            $checked = 1;
        else
            $checked = 0;
        session(['board-name-hide' => $checked]);
        session(['board-description' => request('board-description')]);
        if($request->has('board-description-hide'))
            $checked = 1;
        else
            $checked = 0;
        session(['board-description-hide' => $checked]);
        session(['main-category' => request('main-category')]);
        session(['main-category-display' => request('main-category-session')]);
        session(['cover-type' => request('cover-type')]);
        if(request('cover-type') == 0)
        {
            $imgName = request('_token').'_'.time().'.'.request()->boardcover->getClientOriginalExtension();
            $request->boardcover->storeAs('boardcovers',$imgName);
            session(['cover-image' => $imgName]);
        }
        else
            session(['cover-image' => request('cover-image')]);

        //session(['cover-image' => request('cover-image')]);
        session(['board-type' => request('board-type')]);
        session(['board-type-specify' => request('board-type-specify')]);
        session(['board-accessibility' => request('board-accessibility')]);
        session(['location-based' => request('location-based')]);
        session(['is_public' => request('is_public')]);
//        $bgcolor = '#000000';
//        switch(request('background-color')){
//            case 'bg-bluegreen-cover':
//                $bgcolor = '#166A79';
//                break;
//            case 'bg-darkgray-cover':
//                $bgcolor = '#736f6f';
//                break;
//            case 'bg-purple-cover':
 //               $bgcolor = '#4B2B76';
 //               break;
 //           case 'bg-blue-cover':
 //               $bgcolor = '#0425b0';
 //               break;
 ///           case 'bg-yellowgreen-cover':
  //              $bgcolor = '#5c7c20';
 //               break;
 //           case 'bg-indigo-cover':
 //               $bgcolor = '#6e1346';
 //               break;
 //           case 'bg-red-cover':
 //               $bgcolor = '#b01404';
 //               break;
 //           default:
//                $bgcolor = '#000000';
//                break;
//
//        }
        session(['background-color' => request('background-color')]);

        return view('boards/summary');
    }

    public function saveboard(Request $request)
    {
        $x_array = array ('A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9','0');
        $code = str_random(10) . (date('Y') - 2018) . $x_array[date('n')] . $x_array[date('j')] . $x_array[date('G') + 1] . date('i') . date('s');

        $board = new Board();
        $bmember = new Boardmember();

        $user = Auth::user();
        $board->board_id_link = $code;
        $board->author_id = $user->id;

        $board->board_title = request('board-name');
        if($request->has('board-name-hide'))
            $checked = 1;
        else
            $checked = 0;
        $board->board_title_hide = $checked;
        $board->board_description = request('board-description');
        if($request->has('board-description-hide'))
            $checked = 1;
        else
            $checked = 0;
        $board->board_description_hide = $checked;
        $board->board_text_position = request('input-text-position');
        $board->board_text_color = request('text-color');
        $board->board_main_category = request('main-category');
        $board->board_main_category_display = request('main-category-session');
        $board->board_cover_type = request('cover-type');
        if(request('cover-type') == 0)
        {
            $imgName = request('_token').'_'.time().'.'.request()->boardcover->getClientOriginalExtension();
            $request->boardcover->storeAs('boardcovers',$imgName);
            $board->board_cover_img = $imgName;
        }
        else
            $board->board_cover_img = request('cover-image');

        $board->board_type = request('board-type');
        $board->board_type_specify = request('board-type-specify');
        $board->board_accessibility = request('board-accessibility');
        $board->board_accessibility_location = request('location-based');
        if($request->has('is_public'))
            $checked = 1;
        else
            $checked = 0;
        $board->is_public = $checked;
        $board->board_bg_color = request('background-color');
        $board->board_contributors = 0;
        $board->board_comments = 0;



/*
        $board->board_title = session('board-name');
        $board->board_title_hide = session('board-name-hide');
        $board->board_description = session('board-description');
        $board->board_description_hide = session('board-description-hide');
        $board->board_cover_type = session('cover-type');
        $board->board_cover_img = session('cover-image');
        $board->board_bg_color = session('background-color');


        $board->board_main_category = session('main-category');
        $board->board_main_category_display = session('main-category-display');

        $board->board_type = session('board-type');
        $board->board_type_specify = session('board-type-specify');
        $board->board_accessibility = session('board-accessibility');
        $board->board_accessibility_location = session('location-based');
        $board->is_public = session('is_public');
        $board->board_contributors = 0;
        $board->board_comments = 0;
*/

        if(!$board->save()){
            App::abort(500, 'Error');
        }
        else{

            /*
             *  user roles ---
             *  0 : pending
             *  1 : denied
             *  2 : suspended
             *  16 : member
             *  127 : admin
             *  255 : super-admin
             *
             * */

            $bmember->board_id = $board->id;
            $bmember->user_id = $user->id;
            $bmember->user_role = 255;
            $bmember->message = '';
            $bmember->save();

            return redirect()->route('discussion', ['link_id' => $code]);
        }

            //return Redirect::route('discussion', ['link_id' => $code]);
    }

    public function edit($id){
        $board = \App\Board::where('id', $id)->first();
        return view('boards/edit', compact('board'));
    }

    public function update($id){
        $board = \App\Board::where('id', $id)->first();
        $board->board_title = request('board-name');
        $board->board_description = request('board-description');
        $board->board_access = request('board-access');
        if(!$board->save()){
            App::abort(500, 'Error');
        }
        else
            return redirect()->route('discussion', ['link_id' => $board->board_id_link]);
    }
    public function defaultcover($type){
        $covers = \App\Defaultboardcover::where('cover_type', $type)->get();
        return view('divlayouts/defaultcover', compact('covers'));

    }

    public function memberList($type, $board){

        if($type == 0){
            $members = \App\Boardmember::join('users', 'users.id', '=', 'boardmembers.user_id')
                ->select ('users.name', 'users.username', 'users.avatar', 'boardmembers.user_role')
                ->where ('boardmembers.board_id', '=', $board)
                ->where ('boardmembers.user_role', '=', 0)
                ->get();

        }
        else{
            $members = \App\Boardmember::join('users', 'users.id', '=', 'boardmembers.user_id')
                ->select ('users.name', 'users.username', 'users.avatar', 'boardmembers.user_role')
                ->where ('boardmembers.board_id', '=', $board)
                ->where ('boardmembers.user_role', '>', 15)
                ->get();

        }
        return view('divlayouts/memberlist', compact('members'));
    }

    public function discussion($link_id){

        $viewer = Auth::user();
        $board = \App\Board::where('board_id_link', $link_id)->first();
        $posts = \App\Post::where('board_id', $board->id)->get();
        $owner = \App\User::where('id', $board->author_id)->first();
        $role = null;
        if($viewer){
            $viewer = \App\User::where('id', $viewer->id)->first();
            $role = \App\Boardmember::where('user_id', $viewer->id)->where('board_id', $board->id)->orderby('created_at', 'desc')->first();
        }
        $memcount = \App\Boardmember::where('user_role', '>', '15')->where('board_id', $board->id)->count();
        $mempending = \App\Boardmember::where('user_role', '=', '0')->where('board_id', $board->id)->count();
        return view('boards/discussion', compact('board', 'owner', 'posts', 'role', 'viewer', 'memcount', 'mempending'));
    }

    public function joinboard($user_id, $board_id, $public, $link_id){
        $bmember = new Boardmember();
        $bmember->board_id = $board_id;
        $bmember->user_id = $user_id;
        if($public){
            $bmember->user_role = 16;
            $bmember->message = '';

        }
        else
        {
            $bmember->user_role = 0;
            $bmember->message = request('request-message');

        }
        $bmember->save();
        //return $this->discussion($link_id);
        return back();
    }
}
