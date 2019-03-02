<?php

namespace App\Http\Controllers\Cpanel;

use App\Http\Requests\CategorieRequest;
use App\Models\Catgroty;
use Carbon\Carbon;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Filesystem\Filesystem;
use Validator;

class CategoriesController extends Controller
{


    public function index(){
      $cat =Catgroty::orderby('id','desc')->simplePaginate(10);
       return response()->json($cat);
    }
    public function store(CategorieRequest $request){


        $day = Carbon::now()->day;
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $folder = "/Categorie/$year/$month/$day";
        $input = $request->all();
        $file1 = $request->file('cover');
        if ($file1 != null) {
            $image1 = $file1->getClientOriginalName();
            $path1 = $folder . '/' . $image1;
            if (file_exists($folder) == false) {
                $fs = new Filesystem;
                $fs->makeDirectory($folder, 0755, true);
            }
            Image::make($file1)->save($path1);

            $cat = Catgroty::create(['title' => $request->title, 'cover' => $path1, 'activation' => $request->activation, 'description' => $request->description, 'priority' => $request->priority]);
            if ($cat) {
                return response()->json("اطلاعات شما با موفقعیت درج شده");
            }
            $errro = "اطلاعات شما درج نشده لطفا چند دقیقه دیگه دوباره امحتان نمایید";
            return response()->json($errro);
        }



    }

     public function show($id){

        $cat_edit= Catgroty::find($id);
        return response()->json($cat_edit);

     }
     public function update(Request $request){



//         $validator = Validator::make($request->all(), [
//             'title' => 'required',
//             'description' => 'required',
//         ]);

//         if ($validator->fails()) {
//
//             return redirect()->back();
//         }
         if (!empty($request->cover)) {

             $day = Carbon::now()->day;
             $year = Carbon::now()->year;
             $month = Carbon::now()->month;
             $folder = "/Categorie/$year/$month/$day";
             $input = $request->all();
             $file1 = $request->file('cover');
             if ($file1 != null) {
                 $image1 = $file1->getClientOriginalName();
                 $path1 = $folder . '/' . $image1;
                 if (file_exists($folder) == false) {
                     $fs = new Filesystem;
                     $fs->makeDirectory($folder, 0755, true);
                 }
                 Image::make($file1)->save($path1);

                 $cat = Catgroty::where(['id'=>$request->id])->update(['title' => $request->title, 'cover' => $path1, 'activation' => $request->activation, 'description' => $request->description, 'priority' => $request->priority]);
                 if ($cat) {
                     return response()->json([ 'errors' => "اطلاعات شما با موفقعیت به روز شده"], '200');
                 }

                 $errro = "اطلاعات شما درج نشده لطفا چند دقیقه دیگه دوباره امحتان نمایید";
                 return response()->json([ 'errors' => $errro], '200');
             }
         }

         $cat = Catgroty::where(['id'=>$request->id])->update(['title' => $request->title,  'activation' => $request->activation, 'description' => $request->description, 'priority' => $request->priority]);
         if ($cat) {
             return response()->json([ 'errors' => "اطلاعات شما با موفقعیت به روز شده"], '200');
         }

         $errro = "اطلاعات شما درج نشده لطفا چند دقیقه دیگه دوباره امحتان نمایید";
         return response()->json([ 'errors' => $errro], '200');


     }
    public function destroy($id){

         $cat_delete= Catgroty::where(['id'=>$id])->delete();

        if ($cat_delete) {
            return response()->json("اطلاعات شما با موفقعیت حذف شده");
        }
        $errro = "اطلاعات شما درج نشده لطفا چند دقیقه دیگه دوباره امحتان نمایید";
        return response()->json($errro);
    }




}
