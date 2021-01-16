<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Redirect;
use Session;
use App\Models\GenerationModel;
use App\Models\UserModel;
use App\Models\PaymentModel;
use App\Models\PaymentSemesterModel;
use Illuminate\Http\Request;
use App\Models\BuktiModel;
use App\Models\BuktiTunggakModel;

class Admin_Controller extends BaseController
{
    public function __construct()
    {
        $this->Authorization();
    }

    public function main(){
        $generation = GenerationModel::get();

        foreach($generation as $index => $row){
            $where = array(
                array('generation', '=', $row->generation_id)
            );
            $user = UserModel::where($where)->get();
            $generation[$index]['total_mahasiswa'] = count($user);
        }

        $data['generation'] = $generation;
        return view('Dashboard/Admin/main', $data);
    }

    public function edit_generation($generation_id){
        $where = array(
            array('generation_id', '=', $generation_id),
        );
        $generation = GenerationModel::where($where)->first();

        $data = array(
            'generation' => $generation
        );

        return view('Dashboard/Admin/form_edit_generation',$data);
    }

    public function edit_generation_execute($generation_id,Request $request){
        $generation = GenerationModel::find($generation_id);
        $generation->generation = $request->generation;
        $generation->status = $request->status;
        $generation->save();

        return redirect('admin/dashboard')->with('msg', 'Berhasil Edit data!');
    }

    public function formAddPayment($generation_id){
        $data['generation_id'] = $generation_id;
        return view('Dashboard/Admin/form_add_payment', $data);
    }

    public function tambah_pembayaran(Request $request){
        //get input
        $payment =  new PaymentModel;
        $payment->generation_id = $request->generation_id;
        $payment->nominal = $request->nominal;
        $payment->payment = $request->payment;
        $payment->status = $request->status;
        $payment->save();

        return redirect('admin/setPayment/'.$request->generation_id)->with('msg', 'Berhasil Menambah data!');
    }

    public function tambah_pembayaran_semester(Request $request){

        //semester 1
        PaymentSemesterModel::where('semester', 1)->delete();

        if($request->semester1){
            foreach($request->semester1 as $row){
                $payment_semester =  new PaymentSemesterModel;
                $payment_semester->generation_id = $request->generation_id;
                $payment_semester->payment_id = $row;
                $payment_semester->semester = 1;
                $payment_semester->save();
            }
        }

        //semester 2
        PaymentSemesterModel::where('semester', 2)->delete();

        if($request->semester2){
            foreach($request->semester2 as $row){
                $payment_semester =  new PaymentSemesterModel;
                $payment_semester->generation_id = $request->generation_id;
                $payment_semester->payment_id = $row;
                $payment_semester->semester = 2;
                $payment_semester->save();
            }
        }

        //semester 3
        PaymentSemesterModel::where('semester', 3)->delete();

        if($request->semester3){
            foreach($request->semester3 as $row){
                $payment_semester =  new PaymentSemesterModel;
                $payment_semester->generation_id = $request->generation_id;
                $payment_semester->payment_id = $row;
                $payment_semester->semester = 3;
                $payment_semester->save();
            }
        }
        
        //semester 4
        PaymentSemesterModel::where('semester', 4)->delete();

        if($request->semester4){
            foreach($request->semester4 as $row){
                $payment_semester =  new PaymentSemesterModel;
                $payment_semester->generation_id = $request->generation_id;
                $payment_semester->payment_id = $row;
                $payment_semester->semester = 4;
                $payment_semester->save();
            }
        }

        //semester 5
        PaymentSemesterModel::where('semester', 5)->delete();

        if($request->semester5){
            foreach($request->semester5 as $row){
                $payment_semester =  new PaymentSemesterModel;
                $payment_semester->generation_id = $request->generation_id;
                $payment_semester->payment_id = $row;
                $payment_semester->semester = 5;
                $payment_semester->save();
            }
        }

        //semester 6
        PaymentSemesterModel::where('semester', 6)->delete();

        if($request->semester6){
            foreach($request->semester6 as $row){
                $payment_semester =  new PaymentSemesterModel;
                $payment_semester->generation_id = $request->generation_id;
                $payment_semester->payment_id = $row;
                $payment_semester->semester = 6;
                $payment_semester->save();
            }
        }
        
        //semester 7
        PaymentSemesterModel::where('semester', 7)->delete();

        if($request->semester7){
            foreach($request->semester7 as $row){
                $payment_semester =  new PaymentSemesterModel;
                $payment_semester->generation_id = $request->generation_id;
                $payment_semester->payment_id = $row;
                $payment_semester->semester = 7;
                $payment_semester->save();
            }
        }

        //semester 8
        PaymentSemesterModel::where('semester', 8)->delete();

        if($request->semester8){
            foreach($request->semester8 as $row){
                $payment_semester =  new PaymentSemesterModel;
                $payment_semester->generation_id = $request->generation_id;
                $payment_semester->payment_id = $row;
                $payment_semester->semester = 8;
                $payment_semester->save();
            }
        }
        
        return redirect('admin/setPayment/'.$request->generation_id)->with('msg', 'Berhasil Mengubah data!');
    }

    public function formAddGeneration(){
        return view('Dashboard/Admin/form_add_generation');
    }

    public function setPaymentForm($generation_id){
        $where = array(
            array('generation_id', '=', $generation_id)
        );
        $payment = PaymentModel::where($where)->get();

        //get value of semester 1
        $whereSemester1 = array(
            array('semester', '=', 1)
        );
        $paymentSemester1 = PaymentSemesterModel::where($whereSemester1)->get();

        $semester1 = array();
        foreach($paymentSemester1 as $row){
            $semester1[] = $row->payment_id;
        }
        $data['semester1'] = $semester1;

        //get value of semester 2
        $whereSemester2 = array(
            array('semester', '=', 2)
        );
        $paymentSemester2 = PaymentSemesterModel::where($whereSemester2)->get();

        $semester2 = array();
        foreach($paymentSemester2 as $row){
            $semester2[] = $row->payment_id;
        }
        $data['semester2'] = $semester2;

        //get value of semester 3
        $whereSemester3 = array(
            array('semester', '=', 3)
        );
        $paymentSemester3 = PaymentSemesterModel::where($whereSemester3)->get();

        $semester3 = array();
        foreach($paymentSemester3 as $row){
            $semester3[] = $row->payment_id;
        }
        $data['semester3'] = $semester3;

        //get value of semester 4
        $whereSemester4 = array(
            array('semester', '=', 4)
        );
        $paymentSemester4 = PaymentSemesterModel::where($whereSemester4)->get();

        $semester4 = array();
        foreach($paymentSemester4 as $row){
            $semester4[] = $row->payment_id;
        }
        $data['semester4'] = $semester4;

        //get value of semester 5
        $whereSemester5 = array(
            array('semester', '=', 5)
        );
        $paymentSemester5 = PaymentSemesterModel::where($whereSemester5)->get();

        $semester5 = array();
        foreach($paymentSemester5 as $row){
            $semester5[] = $row->payment_id;
        }
        $data['semester5'] = $semester5;

        //get value of semester 6
        $whereSemester6 = array(
            array('semester', '=', 6)
        );
        $paymentSemester6 = PaymentSemesterModel::where($whereSemester6)->get();

        $semester6 = array();
        foreach($paymentSemester6 as $row){
            $semester6[] = $row->payment_id;
        }
        $data['semester6'] = $semester6;

        //get value of semester 7
        $whereSemester7 = array(
            array('semester', '=', 7)
        );
        $paymentSemester7 = PaymentSemesterModel::where($whereSemester7)->get();

        $semester7 = array();
        foreach($paymentSemester7 as $row){
            $semester7[] = $row->payment_id;
        }
        $data['semester7'] = $semester7;

        //get value of semester 8
        $whereSemester8 = array(
            array('semester', '=', 8)
        );
        $paymentSemester8 = PaymentSemesterModel::where($whereSemester8)->get();

        $semester8 = array();
        foreach($paymentSemester8 as $row){
            $semester8[] = $row->payment_id;
        }
        $data['semester8'] = $semester8;

        $data['payment'] = $payment;
        $data['generation_id'] = $generation_id;

        return view('Dashboard/Admin/form_payment',$data);
    }

    public function studentList($generation_id){
        $whereUser = array(
            array('generation', '=', $generation_id),
        );
        $user = UserModel::where($whereUser)->get();

        $data['user'] = $user;

        return view('Dashboard/Admin/student_list',$data);
    }

    public function paymentList($generation_id){
        $whereUser = array(
            array('generation', '=', $generation_id),
        );
        $user = UserModel::select('nim')->where($whereUser)->get();

        foreach($user as $row){
            $user_ids[] = $row->nim;
        }

        $bukti = BuktiModel::whereIn('user_id',$user_ids)->get();
        $bukti_tunggak = BuktiTunggakModel::whereIn('user_id',$user_ids)->get();

        $data['bukti'] = $bukti;
        $data['bukti_tunggak'] = $bukti_tunggak;

        return view('Dashboard/Admin/payment_list',$data);
    }

    public function tambah_angkatan(Request $request){
        //get input
        $generation =  new GenerationModel;
        $generation->generation = $request->generation;
        $generation->status = $request->status;
        $generation->save();

        return redirect('admin/dashboard')->with('msg', 'Berhasil Memasukan data!');
    }

    public function edit_user($nim){
        $whereUser = array(
            array('nim', '=', $nim),
        );
        $user = UserModel::where($whereUser)->first();

        $data['user'] = $user;

        return view('Dashboard/Admin/form_edit_user',$data);
    }

    public function edit_user_execute(Request $request){
        $user = UserModel::find($request->nim);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->program = $request->program;
        $user->generation = $request->generation;
        $user->address = $request->address;
        $user->no_handphone = $request->no_handphone;
        if($request->password != NULL){
            $user->password = sha1($request->password);
        }

        $user->save();

        return redirect('userEdit/'.$request->nim)->with('msg', 'Berhasil Edit data!');
    }

    public function delete_generation($generation_id){
        $generation = GenerationModel::find($generation_id);
        $generation->delete();

        return redirect('admin/dashboard')->with('msg', 'Berhasil mengahapus data!');
    }

    private function Authorization(){
        if (!session('is_admin') || !Session::has('is_admin')) {
            Redirect::to('admin')->send();
        }
    }
}
