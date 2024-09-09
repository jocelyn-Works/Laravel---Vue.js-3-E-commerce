<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pedal;
use App\Models\Wheel;
use App\Models\Handle;
use App\Models\Handlebars;
use App\Models\LuggageRack;
use Illuminate\Http\Request;
use App\Models\PropulsionMethod;
use App\Http\Controllers\Controller;
use App\Models\Frame;

class CustomAdminController extends Controller
{
    // ------------------- Wheel  -----------------------------  //
    public function wheelCustom()
    {
        $wheels = Wheel::all();
        $data = [
            'title' => 'Roue'
        ];

        return view('admin.custom.wheel.wheel', $data, compact('wheels'));
    }

    // NewWheel View //
    public function newWheelView()
    {
        $data = [
            'title' => 'Roue'
        ];

        return view('admin.custom.wheel.newWheel', $data);
    }
    // Form New Wheel
    public function newWheel(Request $request)
    {

        $request->validate([
            'name' => 'bail|required|string|max:50',
            'color' => 'bail|required|string',
            'price' => 'bail|required|numeric|min:0',
            'image' => 'required|mimes:png,jpeg,jpg|max:2048',
            'stock' => 'bail|required|numeric|min:0',
        ]);
        $filePath = public_path('uploads/roue');

        $wheel = new Wheel();
        $wheel->name = $request->name;
        $wheel->color = $request->color;
        $wheel->price = $request->price;
        $wheel->stock = $request->stock;

        if ($request->hasFile(('image'))) {
            $file = $request->file('image');
            $file_name = time() . $file->getClientOriginalName();

            $file->move($filePath, $file_name);
            $wheel->image = $file_name;
        }
        $result = $wheel->save();

        
        return  $this->wheelCustom()->with('message', 'Nouvelle roue crée');

    }

   
    public function getProductWheel($id)
    {
        $wheel = Wheel::findOrFail($id);
       

        return view('admin..custom.wheel.updateWheel', compact('wheel'));

    }

    public function updateWheel(Request $request, $id)
    {
         $request->validate([
            'name' => 'bail|required|string|max:50',
            'color' => 'bail|required|string',
            'price' => 'bail|required|numeric|min:0',
            'image' => 'required|mimes:png,jpeg,jpg|max:2048',
            'stock' => 'bail|required|numeric|min:0',
        ]);
        $wheel= Wheel::findOrFail($id);

        $wheel->name = $request->name;
        $wheel->color = $request->color;
        $wheel->price = $request->price;
        $wheel->stock = $request->stock;
       

        if ($request->hasFile('image')) {

            if ($wheel->image && file_exists(public_path('uploads/roue/' . $wheel->image))) {
                unlink(public_path('uploads/roue/' . $wheel->image));
            }
            $file = $request->file('image');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('uploads/roue/');
            $file->move($filePath, $file_name);


            $wheel->image = $file_name;
        }
        $wheel->save();
        
        return $this->wheelCustom()->with('message', 'Produit modifier');
    }

    // delete
    public function deleteWheel($id)
    {
        $wheel = Wheel::findOrFail($id);
        $wheel->delete();

        return  $this->wheelCustom()->with('message', 'Roue suprimer');
    }


    // -----------------------------------------------------------------  //

    // ---------------------  Pedal ----------------------------------- **********************************************//
    public function pedalCustom()
    {
        $pedals = Pedal::all();
        $data = [
            'title' => 'Pedal'
        ];

        return view('admin.custom.pedal.pedal', $data, compact('pedals'));
    }

    // delete*********************************************************************************************************
    public function deletePedal($id)
    {
        $pedal = Pedal::findOrFail($id);
        $pedal->delete();

        return  $this->pedalCustom()->with('message', 'Pedale suprimer');
    }

    //create*******************************************************************************************************
    public function pedalPost(Request $request){
//
        return view ('admin.custom.pedal.pedalPost');
    }
    public function newPedal(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|string|max:50',
            'color' => 'bail|required|string',
            'price' => 'bail|required|numeric|min:0',
            'material' => 'bail|required|string',
            'image' => 'required|mimes:png,jpeg,jpg|max:2048',
            'stock' => 'bail|required|numeric|min:0',
        ]);

        $filePath = public_path('uploads/pedal');
        $pedal = new Pedal();
        $pedal->name = $request->name;
        $pedal->color = $request->color;
        $pedal->price = $request->price;
        $pedal->material = $request->material;
        $pedal->image = $request->image;
        $pedal->stock = $request->stock;

        if ($request->hasFile(('image'))) {
            $file = $request->file('image');
            $file_name = time() . $file->getClientOriginalName();

            $file->move($filePath, $file_name);
            $pedal->image = $file_name;
        }
        $result = $pedal->save();


        return  $this->pedalCustom()->with('message', 'Nouvelle pedale crée');
    }
    //**********************************************Modifier*************************************************************

    public function pedalPut($id){
         $pedal = Pedal::findOrFail($id);
        return view ('admin.custom.pedal.pedalPut',compact('pedal'));
    }
    public function updatePedal(Request $request, $id)
    {
        $request->validate([
            'name' => 'bail|required|string|max:50',
            'color' => 'bail|required|string',
            'price' => 'bail|required|numeric|min:0',
            'material' => 'bail|required|min:0',
            'image' => 'required',
            'stock' => 'bail|required|numeric|min:0',
        ]);
        $updatePedal= Pedal::findOrFail($id);


        $updatePedal->name = $request->name;
        $updatePedal->color = $request->color;
        $updatePedal->price= $request->price;
        $updatePedal->material= $request->material;
        $updatePedal->image= $request->image;
        $updatePedal->stock= $request->stock;


        if ($request->hasFile('image')) {

            if ($updatePedal->image && file_exists(public_path('uploads/pedal' . $updatePedal->image))) {
                unlink(public_path('uploads/pedal/' . $updatePedal->image));
            }
            $file = $request->file('image');
            $file_name = time() . '' . $file->getClientOriginalName();
            $filePath = public_path('uploads/pedal/');
            $file->move($filePath, $file_name);


            $updatePedal->image = $file_name;
        }
        $updatePedal->save();

        return $this->pedalCustom()->with('message','Produit modifier');
    }

    // -----------------------------------------------------------------  //


    // ------------------------ Moyen de propulsion  ----------------------//
    public function propulsion()
    {
        $propulsions = PropulsionMethod::all();
        $data = [
            'title' => 'Propulsin'
        ];

        return view('admin.custom.propulsion.propulsion', $data, compact('propulsions'));
    }

      // NewWheel View //
      public function newPropulsionView()
      {
          $data = [
              'title' => 'new Propulsion'
          ];
  
          return view('admin.custom.propulsion.new', $data);
      }
      // Form New Wheel
      public function newPropulsion(Request $request)
      {
  
          $request->validate([  
              'name' => 'bail|required|string|max:50',
              'max_speed' => 'bail|required|string',
              'autonomie' => 'bail|required|numeric|min:0',
              'price' => 'bail|required|numeric|min:0',
              'image' => 'required|mimes:png,jpeg,jpg|max:2048',
              'stock' => 'bail|required|numeric|min:0',
          ]);
          $filePath = public_path('uploads/propulsion/');
  
          $newPropulsion = new PropulsionMethod();
          $newPropulsion->name = $request->name;
          $newPropulsion->max_speed = $request->max_speed;
          $newPropulsion->autonomie= $request->autonomie;
          $newPropulsion->price= $request->price;
          $newPropulsion->image= $request->image;
          $newPropulsion->stock= $request->stock;

  
          if ($request->hasFile(('image'))) {
              $file = $request->file('image');
              $file_name = time() . $file->getClientOriginalName();
  
              $file->move($filePath, $file_name);
              $newPropulsion->image = $file_name;
          }
          $result = $newPropulsion->save();
  
          
          return  $this->propulsion()->with('message', 'Nouvelle Propulsion crée');
      }

      public function getPropulsion($id)
      {
          $propulsion = PropulsionMethod::findOrFail($id);
         
  
          return view('admin..custom.propulsion.update', compact('propulsion'));
  
      }
  
      public function updatePropulsion(Request $request, $id)
      {
           $request->validate([
              'name' => 'bail|required|string|max:50',
              'max_speed' => 'bail|required|string',
              'autonomie' => 'bail|required|numeric|min:0',
              'price' => 'bail|required|numeric|min:0',
              'image' => 'required|mimes:png,jpeg,jpg|max:2048',
              'stock' => 'bail|required|numeric|min:0',
          ]);
          $updatePropulsion= PropulsionMethod::findOrFail($id);
  
          $updatePropulsion->name = $request->name;
          $updatePropulsion->max_speed = $request->max_speed;
          $updatePropulsion->autonomie= $request->autonomie;
          $updatePropulsion->price= $request->price;
          $updatePropulsion->image= $request->image;
          $updatePropulsion->stock= $request->stock;
         
  
          if ($request->hasFile('image')) {
  
              if ($updatePropulsion->image && file_exists(public_path('uploads/propulsion/' . $updatePropulsion->image))) {
                  unlink(public_path('uploads/propulsion/' . $updatePropulsion->image));
              }
              $file = $request->file('image');
              $file_name = time() . '_' . $file->getClientOriginalName();
              $filePath = public_path('uploads/propulsion/');
              $file->move($filePath, $file_name);
  
  
              $updatePropulsion->image = $file_name;
          }
          $updatePropulsion->save();
          
          return $this->wheelCustom()->with('message', 'Produit modifier');
      }
  

    //  delete 
    public function deletePropulsion($id)
    {
        $propulsion = PropulsionMethod::findOrFail($id);
        $propulsion->delete();

        return  $this->propulsion()->with('message', 'Moyen de Propulsion suprimer');
    }
    // -----------------------------------------------------------------  //




    // ----------------------  porte-bagages  ------------------------- //
    //get
    public function porteBagages()
    {
        $portebagages = LuggageRack::all();
        $data = [
            'title' => 'Porte Bagages'
        ];
        return view('admin.custom.portebagage', $data, compact('portebagages'));
    }

    // update
    public function porteBagagesUpdate(Request $request){

        $portebagage = LuggageRack::find($request->id);
        
            $portebagage->name = $request->input('name');
            $portebagage->volume = $request->input('volume');
            $portebagage->price = $request->input('price');
            $portebagage->image = $request->input('image');
            $portebagage->stock = $request->input('stock');
            $portebagage->save();
       
        return $this->porteBagages()->with('message', 'Porte Bagage Modifiée');
    }

    // post
    public function porteBagagesCreate(Request $request){

        $portebagages = new LuggageRack();
        
        $portebagages->name = $request->input('name');
        $portebagages->volume = $request->input('volume');
        $portebagages->price = $request->input('price');
        $portebagages->image = $request->input('image');
        $portebagages->stock = $request->input('stock');
        $portebagages->save();
        return $this->porteBagages()->with('message', 'Porte Bagage Crée');
    }

    //  delete 
    public function deletePorteBagage($id)
    {
        $portebagage = LuggageRack::findOrFail($id);
        $portebagage->delete();

        return  $this->porteBagages()->with('message', 'Porte Bagage suprimer');
    }
    // -----------------------------------------------------------------  //




    // -----------------------  guidon   ---------------------------------- //
    public function guidon()
    {
        $guidons = Handle::all();
        $data = [
            'title' => 'Guidon'
        ];

        return view('admin.custom.guidon.guidon', $data, compact('guidons'));
    }

     // NewWheel View //
     public function newHandleView()
     {
         $data = [
             'title' => 'new Propulsion'
         ];
 
         return view('admin.custom.guidon..new', $data);
     }
     // Form New Wheel
     public function newHandle(Request $request)
     {
 
         $request->validate([  
             'name' => 'bail|required|string|max:50',
             'color' => 'bail|required|string',
             'material' => 'bail|required|string',
             'price' => 'bail|required|numeric|min:0',
             'image' => 'required|mimes:png,jpeg,jpg|max:2048',
             'stock' => 'bail|required|numeric|min:0',
         ]);
         $filePath = public_path('uploads/guidon/');
 
         $newHandle = new Handle();
         $newHandle->name = $request->name;
         $newHandle->color = $request->color;
         $newHandle->material= $request->material;
         $newHandle->price= $request->price;
         $newHandle->image= $request->image;
         $newHandle->stock= $request->stock;

 
         if ($request->hasFile(('image'))) {
             $file = $request->file('image');
             $file_name = time() . $file->getClientOriginalName();
 
             $file->move($filePath, $file_name);
             $newHandle->image = $file_name;
         }
         $result = $newHandle->save();
 
         
         return  $this->guidon()->with('message', 'Nouveaux guidon crée');
     }

     public function getGuidon($id)
     {
         $handle = Handle::findOrFail($id);
        
 
         return view('admin..custom.guidon.update', compact('handle'));
 
     }
 
     public function updateGuiudon(Request $request, $id)
     {
          $request->validate([
            'name' => 'bail|required|string|max:50',
            'color' => 'bail|required|string',
            'material' => 'bail|required|string',
            'price' => 'bail|required|numeric|min:0',
            'image' => 'required|mimes:png,jpeg,jpg|max:2048',
            'stock' => 'bail|required|numeric|min:0',
         ]);
         $updateHandle= Handle::findOrFail($id);
 
         $updateHandle->name = $request->name;
         $updateHandle->color = $request->color;
         $updateHandle->material= $request->material;
         $updateHandle->price= $request->price;
         $updateHandle->image= $request->image;
         $updateHandle->stock= $request->stock;
        
 
         if ($request->hasFile('image')) {
 
             if ($updateHandle->image && file_exists(public_path('uploads/guidon/' . $updateHandle->image))) {
                 unlink(public_path('uploads/guidon/' . $updateHandle->image));
             }
             $file = $request->file('image');
             $file_name = time() . '_' . $file->getClientOriginalName();
             $filePath = public_path('uploads/guidon/');
             $file->move($filePath, $file_name);
 
 
             $updateHandle->image = $file_name;
         }
         $updateHandle->save();
         
         return $this->guidon()->with('message', 'Produit modifier');
     }

    //  delete 
    public function deleteguidon($id)
    {
        $guidon = Handle::findOrFail($id);
        $guidon->delete();

        return  $this->guidon()->with('message', 'Guidon suprimer');
    }
    // -----------------------------------------------------------------  //

    // -----------------------  poignée  ------------------------------------ // 
    public function poignee()
    {
        $poignees = Handlebars::all();
        $data = [
            'title' => 'Poignée'
        ];

        return view('admin.custom.poigne.poignee', $data, compact('poignees'));
    }

    // NewWheel View //
    public function newPoigneView()
    {
        $data = [
            'title' => 'new Propulsion'
        ];

        return view('admin.custom.poigne.new', $data);
    }
    // Form New Wheel
    public function newPoigne(Request $request)
    {

        $request->validate([  
            'name' => 'bail|required|string|max:50',
            'color' => 'bail|required|string',
            'material' => 'bail|required|string',
            'price' => 'bail|required|numeric|min:0',
            'image' => 'required|mimes:png,jpeg,jpg|max:2048',
            'stock' => 'bail|required|numeric|min:0',
        ]);
        $filePath = public_path('uploads/poigne/');

        $newHandleBars = new Handlebars();
    
         $newHandleBars->name = $request->name;
         $newHandleBars->color = $request->color;
         $newHandleBars->material= $request->material;
         $newHandleBars->price= $request->price;
         $newHandleBars->image= $request->image;
         $newHandleBars->stock= $request->stock;


        if ($request->hasFile(('image'))) {
            $file = $request->file('image');
            $file_name = time() . $file->getClientOriginalName();

            $file->move($filePath, $file_name);
            $newHandleBars->image = $file_name;
        }
        $result = $newHandleBars->save();

        
        return  $this->poignee()->with('message', 'Nouvelle Propulsion crée');
    }

    public function getPoigne($id)
    {
        $poigne = Handlebars::findOrFail($id);
       

        return view('admin.custom.poigne.update', compact('poigne'));

    }

    public function updatepoigne(Request $request, $id)
    {
         $request->validate([
            'name' => 'bail|required|string|max:50',
            'color' => 'bail|required|string',
            'material' => 'bail|required|string',
            'price' => 'bail|required|numeric|min:0',
            'image' => 'required|mimes:png,jpeg,jpg|max:2048',
            'stock' => 'bail|required|numeric|min:0',
        ]);
        $updatePoigne= Handlebars::findOrFail($id);

        $updatePoigne->name = $request->name;
        $updatePoigne->color = $request->color;
        $updatePoigne->material= $request->material;
        $updatePoigne->price= $request->price;
        $updatePoigne->image= $request->image;
        $updatePoigne->stock= $request->stock;
       

        if ($request->hasFile('image')) {

            if ($updatePoigne->image && file_exists(public_path('uploads/poigne/' . $updatePoigne->image))) {
                unlink(public_path('uploads/poigne/' . $updatePoigne->image));
            }
            $file = $request->file('image');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('uploads/poigne/');
            $file->move($filePath, $file_name);


            $updatePoigne->image = $file_name;
        }
        $updatePoigne->save();
        
        return $this->poignee()->with('message', 'Produit modifier');

    }

    //  delete 
    public function deletepoignee($id)
    {
        $poignee = Handlebars::findOrFail($id);
        $poignee->delete();

        return  $this->poignee()->with('message', 'Poignée suprimer');
    }
    // -----------------------------------------------------------------  //

    // --------------------- cadre  ------------------------------------ //
    public function cadre()
    {
        $cadres = Frame::all();
        $data = [
            'title' => 'Cadre'
        ];

        return view('admin.custom.cadre', $data, compact('cadres'));
    }
    //  delete 
    public function deleteCadre($id)
    {
        $cadre = Frame::findOrFail($id);
        $cadre->delete();

        return  $this->cadre()->with('message', 'Cadre suprimer');
    }

    // ----------------------------------------------------------------------- //

}
