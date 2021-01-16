<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Redirect;
use Session;
use Illuminate\Http\Request;
use App\Models\BuktiModel;
use App\Models\BuktiTunggakModel;
use App\Models\PaymentSemesterModel;
use App\Models\UserModel;
use App\Models\PaymentModel;

class User_Controller extends BaseController
{
    public function __construct()
    {
        $this->Authorization();
    }

    public function main($semester){
        $where = array(
            array('semester', '=', $semester),
            array('user_id', '=', Session::get('nim'))
        );
        $bukti_bayar = BuktiModel::where($where)->first();

        $whereUser = array(
            array('nim', '=', Session::get('nim'))
        );
        $user = UserModel::where($whereUser)->first();

        $wherePaymentSemester = array(
            array('semester', '=', $semester),
            array('generation_id', '=', $user->generation)
        );
        $payment = PaymentSemesterModel::where($wherePaymentSemester)->get();
        
        $nominal = 0;
        foreach($payment as $index => $row){
            $wherePayment = array(
                array('payment_id', '=', $row->payment_id),
            );
            $paymentDetail = PaymentModel::where($wherePayment)->first();
            $payment[$index]->payment_detail = $paymentDetail;
            $nominal += $paymentDetail->nominal;
        }

        $payment_tunggak = NULL;
        $nominal_tunggak = NULL;
        if($bukti_bayar){
            if($bukti_bayar['sisa_bayar'] != 0){
                $payment_ids = explode(',',$bukti_bayar['payment_ids']);

                $wherePaymentSemester = array(
                    array('semester', '=', $semester),
                    array('generation_id', '=', $user->generation)
                );
                $payment_tunggak = PaymentSemesterModel::where($wherePaymentSemester)->whereNotIn('payment_id', $payment_ids)->get();

                $nominal_tunggak = 0;
                foreach($payment_tunggak as $index => $row){
                    $wherePayment = array(
                        array('payment_id', '=', $row->payment_id),
                    );
                    $paymentDetail = PaymentModel::where($wherePayment)->first();
                    $payment_tunggak[$index]->payment_detail = $paymentDetail;
                    $nominal_tunggak += $paymentDetail->nominal;
                }
            }
        }

        $where = array(
            array('semester', '=', $semester),
            array('user_id', '=', Session::get('nim'))
        );
        $bukti_tunggak_bayar = BuktiTunggakModel::where($where)->first();

        $data = array(
            'semester' => $semester,
            'bukti_bayar' => $bukti_bayar,
            'bukti_tunggak_bayar' => $bukti_tunggak_bayar,
            'payment' => $payment,
            'nominal' => $nominal,
            'payment_tunggak' => $payment_tunggak,
            'nominal_tunggak' => $nominal_tunggak
        );

        return view('Dashboard/User/main',$data);
    }

    public function bayar_semester(Request $request){
        $file = $request->file('file');
        $tujuan_upload = 'bukti_bayar';
        $file->move($tujuan_upload,$file->getClientOriginalName());
        $request->payment_ids = implode(',',$request->payment_ids);

        //get input
        $bukti_bayar =  new BuktiModel;
        $bukti_bayar->user_id = $request->nim;
        $bukti_bayar->semester = $request->semester;
        $bukti_bayar->bukti_bayar = $tujuan_upload."/".$file->getClientOriginalName();
        $bukti_bayar->total_bayar = $request->total_bayar;
        $bukti_bayar->sisa_bayar = $request->sisa_bayar;
        $bukti_bayar->tanggal = $request->tanggal;
        $bukti_bayar->keterangan = $request->keterangan;
        $bukti_bayar->payment_ids = $request->payment_ids;
        $bukti_bayar->save();

        return redirect('user/dashboard/'.$request->semester)->with('msg', 'Berhasil Memasukan data!');
    }

    public function bayar_tunggak_semester(Request $request){
        $file = $request->file('file');
        $tujuan_upload = 'bukti_bayar';
        $file->move($tujuan_upload,$file->getClientOriginalName());

        //get input
        $bukti_bayar =  new BuktiTunggakModel;
        $bukti_bayar->user_id = $request->nim;
        $bukti_bayar->semester = $request->semester;
        $bukti_bayar->bukti_bayar = $tujuan_upload."/".$file->getClientOriginalName();
        $bukti_bayar->total_bayar = $request->total_bayar;
        $bukti_bayar->tanggal = $request->tanggal;
        $bukti_bayar->keterangan = $request->keterangan;
        $bukti_bayar->save();

        return redirect('user/dashboard/'.$request->semester)->with('msg', 'Berhasil Memasukan data!');
    }

    private function Authorization(){
        if (!session('is_member') || !Session::has('is_member')) {
            Redirect::to('login')->send();
        }
    }
}
