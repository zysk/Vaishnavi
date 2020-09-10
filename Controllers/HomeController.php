<?php

namespace App\Http\Controllers;

use App\Transformers\UserTransformer;
use App\Transformers\AssignFourTransformer;
use App\Transformers\CTransformer;
use DB;
use App\Role;
use App\User;
use App\Classes;
use App\classUser;
use League\Fractal\Serializer\ArraySerializer;

class HomeController extends Controller
{
   

    public function assign1()
    {
//
        $users = User::where('role_id', Role::where('name','student')->first()->id)->get();
//
        return fractal($users, new UserTransformer())
            ->serializeWith(new ArraySerializer())
            ->toArray();
//        return view('assign1',compact('users'));
    }

    public function assign2()
    {


        $users = User::where('role_id', Role::where('name','teacher')->first()->id)->get();
//
        return fractal($users, new UserTransformer())
            ->serializeWith(new ArraySerializer())
            ->toArray();
        //return view('assign2',compact('users'));
        
        
        
    }


    public function assign3()
    {
        
         $list = Classes::all();
        return fractal( $list , new UserTransformer())
            ->serializeWith(new ArraySerializer())
            ->toArray();
        
         //return view('assign3',compact('listclass'));
    }

    
    public function assign4()
    {

        $arr=array();
        $cc=classUser::where('student_id','!=','0')->get();
        foreach($cc as $c) {
            $myArr = array();

            $sname = User::where('id', $c->student_id)->first();//student name

            array_push($myArr,$sname->name);
            $sclass = Classes::where('id', $c->class_id)->first();
            array_push($myArr,$sclass->name);

            if('teacher_id'==NULL)
            {
                array_push($arr,$myArr);
           }
            else{
                $tname = User::where('id', $c->teacher_id)->first();
                if (!empty($tname->name)) {
                    array_push($myArr,$tname->name);
                }
                array_push($arr,$myArr);
            }


        }

//
        return fractal( $arr, new AssignFourTransformer())
            ->serializeWith(new ArraySerializer())
            ->toArray();
//
        }

    public function assign5()
    {

        $myArr = array();


        $nullteach=classUser::where('student_id',NULL)->get();
        foreach ($nullteach as $nt) {
            $getthoseclasses = Classes::where('id', $nt->class_id)->get();
            foreach ($getthoseclasses as $gt)
            {
                $myArr[] = $gt->name;

            }


        }
        return fractal($myArr, new CTransformer())
            ->serializeWith(new ArraySerializer())
            ->toArray();
        }


    public function assign6()
    {

        $myArr = array();


        $nullteach=classUser::where('teacher_id',NULL)->get();
        foreach ($nullteach as $nt) {
            $getthoseclasses = Classes::where('id', $nt->class_id)->get();
            foreach ($getthoseclasses as $gt)
            {
                $myArr[] = $gt->name;

            }


        }
        return fractal($myArr, new CTransformer())
            ->serializeWith(new ArraySerializer())
            ->toArray();

    }
}
