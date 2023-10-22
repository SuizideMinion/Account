<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        Blade::directive('Form', function ($exp) {
            $exp = json_decode($exp);
//            dd($exp);
            return '
            <div class="card mt-5 mb-5">
                <form
                    class="row g-3"
                    route="'. route($exp->route, ((int)$exp->id ?? '')) .'"
                    method="POST"
                    >
                    '. csrf_field() . (isset($exp->method) ? method_field('PUT'):'');
        });

        Blade::directive('endForm', function () {
            return '</form>
                    </div>';
        });

        Blade::directive('FormFloatText', function ($exp) {
            $exp = json_decode($exp);
//            dd($exp);
            return '
                <div class="col-md-'. ($exp->width ?? 12) .'" >
                    <div class="form" >
                        <input
                            type="'. ($exp->type ?? die('ERROR.type')) .'""
                            class="form-control"
                            id="'. ($exp->id ?? die('ERROR.id1')) .'"
                            placeholder="'. ($exp->placeholder ?? null) .'"
                            value="'. ($exp->value ?? null) .'"
                            title="'. ($exp->title ?? null) .'"
                            name="'. ($exp->id ?? null) .'"
                            '. ($exp->required ? "required":"") .'
                            >


                    </div >
                </div >
                  ';
        });
        Blade::directive('FormButton', function ($exp) {
            $exp = json_decode($exp);
            return '<button class="btn btn-outline-secondary" type="submit">'. $exp->name .'</button>';
        });
    }
}

//
//<
//
//
//                </div >
//                <div class="col-md-6" >
//                  <div class="form-floating" >
//                    <input type = "email" class="form-control" id = "floatingEmail" placeholder = "Your Email" >
//                    <label for="floatingEmail" > Your Email </label >
//                  </div >
//                </div >
//                <div class="col-md-6" >
//                  <div class="form-floating" >
//                    <input type = "password" class="form-control" id = "floatingPassword" placeholder = "Password" >
//                    <label for="floatingPassword" > Password</label >
//                  </div >
//                </div >
//                <div class="col-12" >
//                  <div class="form-floating" >
//                    <textarea class="form-control" placeholder = "Address" id = "floatingTextarea" style = "height: 100px;" ></textarea >
//                    <label for="floatingTextarea" > Address</label >
//                  </div >
//                </div >
//                <div class="col-md-6" >
//                  <div class="col-md-12" >
//                    <div class="form-floating" >
//                      <input type = "text" class="form-control" id = "floatingCity" placeholder = "City" >
//                      <label for="floatingCity" > City</label >
//                    </div >
//                  </div >
//                </div >
//                <div class="col-md-4" >
//                  <div class="form-floating mb-3" >
//                    <select class="form-select" id = "floatingSelect" aria - label = "State" >
//                      <option selected = "" > new York</option >
//                      <option value = "1" > Oregon</option >
//                      <option value = "2" > DC</option >
//                    </select >
//                    <label for="floatingSelect" > State</label >
//                  </div >
//                </div >
//                <div class="col-md-2" >
//                  <div class="form-floating" >
//                    <input type = "text" class="form-control" id = "floatingZip" placeholder = "Zip" >
//                    <label for="floatingZip" > Zip</label >
//                  </div >
//                </div >
//                <div class="text-center" >
//                  <button type = "submit" class="btn btn-primary" > Submit</button >
//                  <button type = "reset" class="btn btn-secondary" > Reset</button >
//                </div >
//              </form >
