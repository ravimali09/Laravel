<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\MaiL\welcomemail;
use App\MaiL\forgetMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.user_signup');
    }
    public function adm_dashboard()
    {
        return view('admin.index');
    }
    public function profile()
    {
        $id = session()->get('user_id');
        $data = customer::where('id', $id)->first();
        return view('website.profile', ['customer' => $data]);
    }

    public function edituser(customer $user, $id)
    {
        $data = customer::find($id);
        return view('website.edituser', ['customer' => $data]);
    }

    public function update(Request $request, customer $user, $id)
    {

        $data = customer::find($id);

        $data->cust_name = $request->cust_name;
        $data->email = $request->email;

        $data->update();
        echo "<script> 
        alert('Profile Update Success !'); 
        window.location='/profile';
    </script>";
    }

    public function login()
    {
        return view('website.user_login');
    }
    public function user_auth(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|'
        ], [
            'email.required' => 'Bhai Email Kon Daalega?',
            'email.email' => 'Kya yar Kuch bhi daal rha hai.',
            'password.required' => 'Bhai Password To Daal De.',
        ]);

        $email = $request->email;
        $password = $request->password;

        $data = customer::where('email', $email)->first();
        if ($data) {
            if (Hash::check($password, $data->password)) {
                session()->put('user_id', $data->id);
                session()->put('email', $data->email);
                session()->put('name', $data->cust_name);

                echo "<script> 
                    alert('Login Suuceess !');
                    window.location='/';
                    </script>";
            } else {
                echo "<script> 
                        alert('Password not match !'); 
                        window.location='/user_login';
                    </script>";
            }
        } else {
            echo "<script>
                alert('Username does not exits !');
                window.location='/user_login';
             </script>";
        }
    }

    public function user_logout()
    {
        session()->pull('user_id');
        session()->pull('email');
        session()->pull('name');

        echo "<script>
        alert('Logout Success !');
        window.location='/index';
     </script>";
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cust_name' => 'required|alpha:ascii',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:3|max:12',
        ]);

        $data = new customer;

        $data->cust_name = $request->cust_name;
        $email = $data->email = $request->email;
        $data->password = Hash::make($request->password);


        $data->save();
        $emaildata = array("cust_name" => $request->cust_name, "email" => $request->email, "pass" => $request->password);
        Mail::to($email)->send(new welcomemail($emaildata));
        echo "<script>
        alert('Signup Success !');
        window.location='/user_login';
        </script>";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        $data = customer::all();
        return view('admin.manage_customer', ['customer' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer, $id)
    {
        $data = customer::find($id);
        $data->delete();
        return redirect('/manage_customer');
    }
    public function forget_pass(Request $request)
    {
        return view('website.forget_pass');
    }

    public function reset_pass()
    {
        return view('website.reset_pass'); // Assuming forget_otp.blade.php is your OTP form view
    }
    public function forget_otp(Request $request)
    {
        $data = customer::where("email", $request->email)->first();
        if ($data) {
            $email = $data->email;
            $id = $data->id;

            $otp = rand(100000, 999999);

            session()->put('ses_forget_id', $id);
            session()->put('ses_forget_otp', $otp);

            $forget_data = array("otp" => session()->get('ses_forget_otp'));
            Mail::to($email)->send(new forgetMail($forget_data));
            return redirect('/forget_otp');
        } else {
            Alert::error('error', 'Username Not valid');
            return redirect('/forget_pass');
        }
    }
    public function showForgetOtpForm()
    {
        return view('website.forget_otp'); // Assuming forget_otp.blade.php is your OTP form view
    }
    public function verify_otp(Request $request)
    {

        if (session()->get('ses_forget_otp') == $request->otp) {

            session()->put('ses_reset_pass', "reset");
            session()->pull('ses_forget_otp');


            return redirect('/reset_pass');
        } else {
            Alert::error('error', 'OTP is invalid');
            return redirect('/forget_otp');
        }
    }
    public function update_pass($id, Request $request)
    {
        $data = customer::find($id);
        $data->password = Hash::make($request->password);
        $data->update();

        session()->pull('ses_reset_pass');
        session()->pull('ses_forget_id');

        Alert::success('Success', 'Reset Password Success');
        return redirect('/user_login');
    }




    //=================== API =========================================//
    public function show_cust_api()
    {
        $data = customer::all();
        return response()->json([
            'status' => 200,
            'customer' => $data
        ]);
    }
    public function show_cust_single_api($id)
    {
        $data = customer::find($id);
        return response()->json([
            'status' => 200,
            'students' => $data
        ]);
    }
    public function delete_cust($id)
    {
        customer::find($id)->delete();
        return response()->json([
            'status' => 200,
            'msg' => "Delete Success"
        ]);
    }

    public function insert_cust(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'cust_name' => 'Required',
            'email' => 'Required|email',
            'password' => 'Required',
            'file' => 'Required'
        ]);

        if ($validate->fails()) {
            return [
                'success' => 0,
                'message' => $validate->messages(),
            ];
        } else {
            $data = new customer();
            $data->cust_name = $request->cust_name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);

            $data->save();
            return response()->json([
                'status' => 200,
                'message' => "Regioster Success"
            ]);
        }
    }
    public function update_cust(Request $request, $id)
    {
        $validate=Validator::make($request->all(),[
            'cust_name'=>'Required',
            'email'=>'Required|email',
        ]);
		
		if($validate->fails())
		{
			return [
				'success' => 0, 
				'message' => $validate->messages(),
			];
		}
		else
		{
			$data=customer::find($id);
			$data->cust_name=$request->cust_name;
			$data->email=$request->email;
			$data->update();
			return response()->json([
			'status'=>200,
			'message'=>"Update Success"
			]);
		}
    }

    function search($key) 	
    {
         $data=customer::where('cust_name','LIKE',"%$key%")->orWhere('email','LIKE','%'.$key.'%')->get();
		 return response()->json([
		 'status'=>200,
		 'customer'=>$data
		 ]);
    }
}
