<?php
//test
// namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Validator;
// use App\Models\Student;

// class StudentController extends Controller
// {

//     public function index()
//     {


//         $student = Student::all();

//         if ($student->count() > 0) {
//             $http = 200;
//             $data = [
//                 'status' => 200,
//                 'student' => $student

//             ];
//         } else {
//             $http = 404;
//             $data = [
//                 'status' => 404,
//                 'student' => 'no record'

//             ];
//         }

//         return response()->json($data, $http);
//     }


//     public function store(Request $request)
//     {

//         $validatior = Validator::make($request->all(), [
//             'name' => 'required|string|max:191',
//             'course' => 'required|string|max:191',
//             'email' => 'required|email|max:191',
//             'phone' => 'required|digits:10'


//         ]);


//         if ($validatior->fails()) {

//             return response()->json([

//                 'status' => 422,
//                 'error' => $validatior->message()

//             ], 422);
//         } else {
//             $student = Student::create([
//                 'name' => $request->name,
//                 'course' => $request->course,
//                 'email' => $request->email,
//                 'phone' => $request->phone,



//             ]);
//             if ($student) {
//                 return response()->json([

//                     'status' => 200,
//                     'message' => 'creatre'

//                 ], 200);
//             } else {

//                 return response()->json([

//                     'status' => 500,
//                     'message' => 'somting went wrong'

//                 ], 500);
//             }
//         }
//     }
// }



namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;

class StudentController extends Controller
{

    public function index()
    {
        //tests new

        $student = Student::all();

        if ($student->count() > 0) {
            $http = 200;
            $data = [
                'status' => 200,
                'student' => $student

            ];
        } else {
            $http = 404;
            $data = [
                'status' => 404,
                'student' => 'no record'

            ];
        }

        return response()->json($data, $http);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'course' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|digits:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422);
        } else {
            $student = Student::create([
                'name' => $request->name,
                'course' => $request->course,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            if ($student) {
                return response()->json([
                    'status' => 200,
                    'message' => 'create'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'something went wrong'
                ], 500);
            }
        }
    }


    public function show($id)
    {

        $student = Student::find($id);


        if ($student) {


            $http = 200;
            $data = [
                'status' => 200,
                'student' => $student

            ];
        } else {

            $http = 404;
            $data = [
                'status' => 404,
                'student' => 'No such Student found!'

            ];
        }
        return response()->json($data, $http);
    }


    public function edit($id)
    {

        $student = Student::find($id);


        if ($student) {


            $http = 200;
            $data = [
                'status' => 200,
                'student' => $student

            ];
        } else {

            $http = 404;
            $data = [
                'status' => 404,
                'student' => 'No such Student found!'

            ];
        }
        return response()->json($data, $http);
    }


    public function update(Request $request, int $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'course' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|digits:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422);
        } else {
            $student = Student::find($id);


            if ($student) {

                $student->update([
                    'name' => $request->name,
                    'course' => $request->course,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => 'updated'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'No Such Student Found'
                ], 500);
            }
        }
    }



    public function destroy($id)
    {

        $student = Student::find($id);


        if ($student) {
            $student->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Student =' . $id . ' deleted Successfully'
            ], 500);
        } else {

            return response()->json([
                'status' => 500,
                'message' => 'No Such Student Found'
            ], 500);
        }
    }
}
