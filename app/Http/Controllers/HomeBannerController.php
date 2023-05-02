<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Storage;
class HomeBannerController extends Controller
{
public function index()
{
$result['data'] =HomeBanner::all();
return view('admin/home_banner', $result);
}
public function manage_home_banner(Request $request, $id = '')
{
if ($id > 0) {
$arr = HomeBanner::where(['id' => $id])->get();
$result['image'] = $arr['0']->image;
$result['btn_text'] = $arr['0']->btn_text;
$result['btn_link'] = $arr['0']->btn_link;
$result['id']=$id;
} else {
$result['image'] = '';
$result['btn_text'] = '';
$result['btn_link'] = '';
$result['id'] ='';
}
return view('admin/manage_home_banner', $result);
}
public function manage_home_banner_process(request $request)
{
// return $request->post();
$request->validate([
'image' => 'required:mimes:jpeg,jpg,png',
]);
if ($request->post('id') > 0) {
$model = HomeBanner::find($request->post('id'));
$msg = "HomeBanner updated";
} else {
$model = new HomeBanner();
$msg = "HomeBanner insrted";
}
if($request->hasFile('image')){
if($request->post('id')>0){
$arrImage=DB::table('home_banners')->where(['id'=>$request->post('id')])->get();
if(Storage::exists('/public/media/banner/'.$arrImage[0]->image)){
Storage::delete('/public/media/banner/'.$arrImage[0]->image);
}
}
$image = $request->file('image');
$ext = $image->extension();
$image_name = time() . '.' . $ext;
$image->storeAs('/public/media/banner', $image_name);
$model->image=$image_name;
}
$model->btn_text = $request->post('btn_text');
$model->btn_link = $request->post('btn_link');
$model->status=1;
$model->save();
$request->session()->flash('message', $msg);
return redirect('admin/home_banner');
}
public function delete(Request $request, $id)
{
$model = HomeBanner::find($id);
$model->delete();
$request->session()->flash('message','Banner deleted');
return redirect('admin/home_banner');
}
public function status(Request $request, $status, $id) {
$model = HomeBanner::find($id);
$model->status = $status;
$model->save();
$request->session()->flash('message', 'Banner updated');
return redirect('admin/home_banner');
}
}