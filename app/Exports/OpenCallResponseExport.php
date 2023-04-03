<?php

namespace App\Exports;

use Illuminate\Support\Str;
use App\Models\OpenCallResponse;
use App\Models\OpenCallFormField;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OpenCallResponseExport implements FromView
{

    public function getArtWorkImagesWithUrl($row): array
    {
        $artWorkData = collect(json_decode($row->art_work_image));
        $withPath = $artWorkData->map(function ($data) use($row) {
            return asset('images/opencall_form/'. $row->id .'/'. Str::slug($row->name) .'/'. $data);
        });

        return $withPath->toArray();
    }

    public function getOtherFieldType($row): array
    {
        if ($row->other_field) {
            $otherFielData = json_decode($row->other_field, TRUE);
            foreach ($otherFielData as $key => $value) {
                $fieldType[] = OpenCallFormField::where('field_name', key($value))->pluck('field_type')->first();
            }
        }

        return $fieldType;
    }

    public function getFormatedOtherFields($row): array
    {
        $otherFielData = json_decode($row->other_field, TRUE);
        if ($otherFielData) {
            $otheFieldType = $this->getOtherFieldType($row);
            for ($i=0; $i < count($otherFielData); $i++) {
                $key = array_keys($otherFielData[$i]);
                switch ($otheFieldType[$i]) {
                    case 'file':
                        $otherFielData[$i][$key[0]] = asset('images/opencall_form/' . $row->id . '/' . Str::slug($row->name) . '/' . array_values($otherFielData[$i])[0]);
                        break;

                    case 'image':
                        $otherFielData[$i][$key[0]] = asset('images/opencall_form/'. $row->id .'/'. Str::slug($row->name) .'/'. array_values($otherFielData[$i])[0]);
                        break;
                }
            }

            return $otherFielData;
        }
    }

    public function view(): View
    {
        $data = OpenCallResponse::all();

        $formatedData = $data->map(function ($row) {
            $row->art_work_title = json_decode($row->art_work_title);
            $row->art_work_size = json_decode($row->art_work_size);
            $row->art_work_medium = json_decode($row->art_work_medium);
            $row->art_work_image = $this->getartWorkImagesWithUrl($row);
            $row->other_field = $this->getFormatedOtherFields($row);

            return $row;
        });

        return view('exports.responses', [
            'responses' => $formatedData,
        ]);
    }
}
