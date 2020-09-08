<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecordPost;
use App\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::OwnRecords();
        return view('record.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('record.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecordPost $request)
    {
        $params = $request->all();

        $record = new Record();
        $record->fill($params);

        if (isset($params['oneday_image_path'])) {

            $record->oneday_image_path = $this->_set_image_path($params['oneday_image_path']);
        }

        if (isset($params['four_hours_image_path'])) {

            $record->oneday_image_path = $this->_set_image_path($params['four_hours_image_path']);
        }

        if (isset($params['one_hour_image_path'])) {

            $record->oneday_image_path = $this->_set_image_path($params['one_hour_image_path']);
        }

        if (isset($params['entry_image_path'])) {

            $record->oneday_image_path = $this->_set_image_path($params['entry_image_path']);
        }

        if (isset($params['finish_image_path'])) {

            $record->oneday_image_path = $this->_set_image_path($params['finish_image_path']);
        }

        $record->user_id = Auth::id();
        $record->save();

        return redirect()->route('record.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Record::is_my_record($id)) {

            $record = Record::findOrFail($id);

            return view('record.show', compact('record'));
        } else {

            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Record::is_my_record($id)) {

            $record = Record::findOrFail($id);

            return view('record.edit', compact('record'));
        } else {

            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = $request->all();

        $record = Record::findOrFail($id);
        $record->fill($params);
        if (isset($params['oneday_image_path'])) {

            $record->oneday_image_path = $this->_set_image_path($params['oneday_image_path']);
        }

        if (isset($params['four_hours_image_path'])) {

            $record->oneday_image_path = $this->_set_image_path($params['four_hours_image_path']);
        }

        if (isset($params['one_hour_image_path'])) {

            $record->oneday_image_path = $this->_set_image_path($params['one_hour_image_path']);
        }

        if (isset($params['entry_image_path'])) {

            $record->oneday_image_path = $this->_set_image_path($params['entry_image_path']);
        }

        if (isset($params['finish_image_path'])) {

            $record->oneday_image_path = $this->_set_image_path($params['finish_image_path']);
        }
        $record->save();

        return redirect()->route('record.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Record::findOrFail($id);
        $this->_delete_image($record);
        $record->delete();

        return redirect()->route('record.index');
    }

    private function _set_image_path($image)
    {
        # バケットの`test`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('test', $image, 'public');
        # アップロードした画像のフルパスを返す
        return Storage::disk('s3')->url($path);
    }

    # モデルを引数に入れる
    private function _delete_image($model)
    {

        $disk = Storage::disk('s3');
        $dir_name = '/test/';

        if (isset($model['oneday_image_path'])) {
            $item = basename($model['oneday_image_path']);

            $disk->delete($dir_name . $item);
        }
        if (isset($model['four_hours_image_path'])) {

            $item = basename($model['four_hours_image_path']);
            $disk->delete($dir_name . $item);
        }

        if (isset($model['one_hour_image_path'])) {
            $item = basename($model['one_hour_image_path']);
            $disk->delete($dir_name . $item);
        }
        if (isset($model['entry_image_path'])) {
            $item = basename($model['entry_image_path']);
            $disk->delete($dir_name . $item);
        }

        if (isset($model['finish_image_path'])) {
            $item = basename($model['finish_image_path']);
            $disk->delete($dir_name . $item);
        }

        return true;
    }
}
