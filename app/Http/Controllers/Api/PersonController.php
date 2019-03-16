<?php

namespace App\Http\Controllers\Api;

use App\Address;
use App\Person;
use Mockery\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class PersonController extends Controller
{

    public function index()
    {
        $result = Cache::remember('all_person', 60 * 60, function () {
            return Person::all();
        });
        return response()->json($result);
    }

    public function store(Request $request)
    {
        if (!($request->has('name') || $request->has('birthday') || $request->has('gender')))
            abort(404);
        try {

            $request->validate([
                'name' => 'bail|required|max:255',
                'birthday' => 'required|date',
                'gender' => 'required',
            ]);


            $person = new Person();
            $person->name = $request->input('name');
            $person->birthday = $request->input('birthday');
            $person->gender = $request->input('gender');
            $person->save();

            //Or not defensive
            //$person = Person::created($request->all());

            return response()->json($person, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }


    }


    public function show($id)
    {

        $person = Cache::remember('person_show_' . $id, 60 * 60, function () use ($id) {
            return Person::find($id);
        });

        return response()->json($person, 200);

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $person = Person::find($id);

        if (!isset($person->id))
            abort(404);
        try {
            $person->name = $request->input('name');
            $person->birthday = $request->input('birthday');
            $person->gender = $request->input('gender');
            $person->save();
            return response()->json($person, '200');
        } catch (Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }

    public function destroy($id)
    {
        $person = Person::find($id);

        if (!isset($person->id))
            abort(404);
        try {
            $person->delete();
            return response()->json("Success", '200');
        } catch (Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }

    public function addresses($person_id)
    {

        $result = Cache::remember('address_' . $person_id, 60 * 60, function () use ($person_id) {
            return Person::find($person_id)->addresses;
        });

        return response()->json($result, 200);
    }

    public function address($person_id, $id)
    {
        $result = Cache::remember('address_' . $person_id . '_' . $id, 60 * 60, function () use ($id, $person_id) {
            return Person::find($person_id)->addresses()->where('id', $id)->first();
        });

        return response()->json($result, 200);
    }

    public function saveAddress(Request $request)
    {

        $request->validate([
            'person_id' => 'bail|required|max:255',
            'address' => 'required',
            'post_code' => 'required',
            'city_name' => 'required',
            'country_name' => 'required',
        ]);

        $obj = $request->all();
        $obj = (object)$obj;

        $address = new Address();
        $address->person_id = $obj->person_id;
        $address->address = $obj->address;
        $address->post_code = $obj->post_code;
        $address->city_name = $obj->city_name;
        $address->country_name = $obj->country_name;
        $address->save();

        return response()->json($address, 200);
    }

    public function clearCache(){
        Cache::flush();
        return "Cache Clear";
    }
}
