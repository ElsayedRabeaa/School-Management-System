<?php


namespace App\Repository;


use App\Models\Fee;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Student_account;
use App\Models\ProcessFees;


class ProcessFeesRepository implements ProcessFeesRepositoryInterface
{

    public function index()
    {
        $ProcessingFees = ProcessFees::all();
        // return view('pages.processes.index',compact('ProcessingFees'));
        return $ProcessingFees;
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('pages.processes.add',compact('student'));
    }

    public function edit($id)
    {
        $ProcessingFee = ProcessFees::findorfail($id);
        return view('pages.processes.edit',compact('ProcessingFee'));
    }

    public function store($request)
    {
        \DB::beginTransaction();

        try {
            // حفظ البيانات في جدول معالجة الرسوم
            $ProcessingFee = new ProcessFees();
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->student_id = $request->student_id;
            $ProcessingFee->amount = $request->Debit;
            $ProcessingFee->descrition = $request->description;
            $ProcessingFee->save();


            // حفظ البيانات في جدول حساب الطلاب
            $students_accounts = new Student_account();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'ProcessingFee';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->process_fees_id = $ProcessingFee->id;
            $students_accounts->Debit = 0.00;
            $students_accounts->credit = $request->Debit;
            $students_accounts->description = $request->description;
            $students_accounts->save();


            \DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('ProcessFees.index');
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        \DB::beginTransaction();

        try {
            // تعديل البيانات في جدول معالجة الرسوم
            $ProcessingFee = ProcessFees::findorfail($request->id);;
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->student_id = $request->student_id;
            $ProcessingFee->amount = $request->Debit;
            $ProcessingFee->descrition = $request->description;
            $ProcessingFee->save();

            // تعديل البيانات في جدول حساب الطلاب
            $students_accounts = Student_account::where('processing_id',$request->id)->first();;
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'ProcessingFee';
            $students_accounts->student_id = $request->student_id;
            // $students_accounts->processing_id = $ProcessingFee->id;
            $students_accounts->Debit = 0.00;
            $students_accounts->credit = $request->Debit;
            $students_accounts->description = $request->description;
            $students_accounts->save();


            \DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('ProcessingFee.index');
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            ProcessFees::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
   
}