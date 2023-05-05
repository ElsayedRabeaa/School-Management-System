<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use App\Models\Blood;
use App\Models\Myparent;
use App\Models\ParentAttachment;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AddParent extends Component
{

    use WithFileUploads;
    public $files;
    public $catchError,$updateMode = false,$photos,$show_table = true,$parent_id;
    public $currentStep = 1,

        // Father_INPUTS
        $Email, $Password,
        $Name_Father, $Name_Father_en,
        $National_ID_Father,
        $Phone_Father, $Job_Father, $Job_Father_en,
        $Blood_Type_Father_id,
        $Address_Father,
       

        // Mother_INPUTS
        $Name_Mother, $Name_Mother_en,
        $National_ID_Mother, $Passport_ID_Mother,
        $Phone_Mother, $Job_Mother, $Job_Mother_en,
         $Blood_Type_Mother_id,
        $Address_Mother;




        public function updated($propertyName)
        {
            $this->validateOnly($propertyName,[
                'Email'=>'required|email', 
                // 'Passport_ID_Father'=>'min:10|max:10|required',
                // 'Passport_ID_Mother'=>'required|[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+\.[a-zA-z]{2,3}',
                // 'National_ID_Father'=>'required|min:10|max:10',
                // 'National_ID_Mother'=>'required|min:10|max:10',
                // 'Phone_Father'=>'required|min:10|max:10',
                // 'Phone_Mother'=>'required|min:10|max:10',
                
            ]);
        }

        
    public function render()
    {
        return view('livewire.add-parent', [
        'Type_Bloods'=>Blood::all(),
        'Myparents'=>Myparent::all(),
    ]);
        
    }



    public function showformadd(){
        $this->show_table = false;
    }


    
    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $My_Parent = Myparent::where('id',$id)->first();
        $this->Parent_id = $id;
        $this->Email = $My_Parent->Email;
        $this->Password =Hash::make($My_Parent->Password);
        $this->Name_Father = $My_Parent->getTranslation('Name_Father', 'ar');
        $this->Name_Father_en = $My_Parent->getTranslation('Name_Father', 'en');
        $this->Job_Father = $My_Parent->getTranslation('Job_Father', 'ar');;
        $this->Job_Father_en = $My_Parent->getTranslation('Job_Father', 'en');
        $this->National_ID_Father =$My_Parent->National_ID_Father;
        $this->Passport_ID_Father = $My_Parent->Passport_ID_Father;
        $this->Phone_Father = $My_Parent->Phone_Father;
        $this->Nationality_Father_id = $My_Parent->Nationality_Father_id;
        $this->Blood_Type_Father_id = $My_Parent->Blood_Type_Father_id;
        $this->Address_Father =$My_Parent->Address_Father;
        $this->Religion_Father_id =$My_Parent->Religion_Father_id;

        $this->Name_Mother = $My_Parent->getTranslation('Name_Mother', 'ar');
        $this->Name_Mother_en = $My_Parent->getTranslation('Name_Father', 'en');
        $this->Job_Mother = $My_Parent->getTranslation('Job_Mother', 'ar');;
        $this->Job_Mother_en = $My_Parent->getTranslation('Job_Mother', 'en');
        $this->National_ID_Mother =$My_Parent->National_ID_Mother;
        $this->Passport_ID_Mother = $My_Parent->Passport_ID_Mother;
        $this->Phone_Mother = $My_Parent->Phone_Mother;
        $this->Nationality_Mother_id = $My_Parent->Nationality_Mother_id;
        $this->Blood_Type_Mother_id = $My_Parent->Blood_Type_Mother_id;
        $this->Address_Mother =$My_Parent->Address_Mother;
        $this->Religion_Mother_id =$My_Parent->Religion_Mother_id;
    }


        //firstStepSubmit
        public function firstStepSubmit_edit()
        {
            $this->updateMode = true;
            $this->currentStep = 2;
    
        }
    
        //secondStepSubmit_edit
        public function secondStepSubmit_edit()
        {
            $this->updateMode = true;
            $this->currentStep = 3;
    
        }

    //        public function submitForm_edit(){

    //     if ($this->parent_id){
    //         $parent = My_Parent::find($this->parent_id);
    //         $parent->update([
    //             'Passport_ID_Father' => $this->Passport_ID_Father,
    //             'National_ID_Father' => $this->National_ID_Father,
    //         ]);

    //     }

    //     return redirect()->to('/add_parent');
    // }



    
    public function delete($id){
        Myparent::findOrFail($id)->delete();
        return redirect()->to('/add_parent');
    }
    //firstStepSubmit
    public function firstStepSubmit()
    {
        // $this->validate([
        //     'Email'=>'required', 
        //     'Passport_ID_Father'=>'required',
        //     'Passport_ID_Mother'=>'required',
        //     'National_ID_Father'=>'required',
        //     'National_ID_Mother'=>'required',
        //     'Phone_Father'=>'required',
        //     'Phone_Mother'=>'required',
            
        // ]);
        $this->currentStep = 2;
    }
    //secondStepSubmit
    public function secondStepSubmit()
    {
        // $this->validate([
        //     'Email'=>'required', 
        //     'Passport_ID_Father'=>'required',
        //     'Passport_ID_Mother'=>'required',
        //     'National_ID_Father'=>'required',
        //     'National_ID_Mother'=>'required',
        //     'Phone_Father'=>'required',
        //     'Phone_Mother'=>'required',
            
        // ]);
        $this->currentStep = 3;
    }



public function submitForm(){

      // Father_INPUTS
      $parents=new Myparent();
      $parents->Email=$this->Email;
      $parents->Password=Hash::make($this->Password);
      $parents->Name_Father=['en'=>$this->Name_Father_en, 'ar'=>$this->Name_Father];
      $parents->National_ID_Father=$this->National_ID_Father;
      $parents->Phone_Father=$this->Phone_Father;
      $parents->Job_Father=['en'=>$this->Job_Father_en, 'ar'=>$this->Job_Father];
      $parents->Blood_Father_Id=$this->Blood_Type_Father_id;
      $parents->Address_Father=$this->Address_Father;
  
   // Mother_Inputs


   $parents->Name_Mother=['en'=>$this->Name_Mother_en, 'ar'=>$this->Name_Mother];
   $parents->National_ID_Mother=$this->National_ID_Mother;
   $parents->Phone_Mother=$this->Phone_Mother;
   $parents->Job_Mother=['en'=>$this->Job_Mother_en, 'ar'=>$this->Job_Mother];
   $parents->Blood_Mother_Id=$this->Blood_Type_Mother_id;
   $parents->Address_Mother=$this->Address_Mother;


   $parents->save();
//    return redirect()->route('add_parent.index');

if (!empty($this->files)){
    foreach ($this->files as $file) {
        $file->storeAs($this->National_ID_Father, $file->getClientOriginalName(), $disk = 'parent_attachments');
        ParentAttachment::create([
            'file_name' => $file->getClientOriginalName(),
            'parent_id' => Myparent::latest()->first()->id,
        ]);
    }
}

    $this->currentStep=1;
    $this->clearForm();


}


  //clearForm
  public function clearForm()
  {
      $this->Email = '';
      $this->Password = '';
      $this->Name_Father = '';
      $this->Job_Father = '';
      $this->Job_Father_en = '';
      $this->National_ID_Father ='';
      $this->Phone_Father = '';
      $this->Blood_Father_id = '';
      $this->Address_Father ='';

      $this->Name_Mother = '';
      $this->Job_Mother = '';
      $this->Job_Mother_en = '';
      $this->National_ID_Mother ='';
      $this->Phone_Mother = '';
      $this->Nationality_Mother_id = '';
      $this->Blood_Mother_id = '';
      $this->Address_Mother ='';

  }





    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }


    
    
  
}
