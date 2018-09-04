<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    //
    /*
     * Contact chi cho phep xem
     * Contact chi co the sua status thanh da xem
     * */
    public function ListContact(){
        $Contact = Contact::paginate(10);
        return view('admin.Contact.list',['Contact'=>$Contact]);
    }

    /*
     * Load Ajax cho Contact
     * Dua theo id cua contact gui len de lay du lieu
     * */
    public function getFormChangeContact($id){
        $Contact = Contact::find($id);
            ?>
        <div class="card">
            <div class="card-close">
                <div class="dropdown">
                    <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                </div>
            </div>
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Change Status Contact !</h3>
            </div>
            <div class="card-body">
                <p>Contact has change status only.</p>
                <form action="admin/Contact/ChangeContact/<?php echo $Contact->id; ?>" method="POST" class="form-horizontal">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Message of Contact</label>
                        <div class="col-sm-9">
                                <textarea class="form-control" disabled name="" id="" cols="30" rows="10"><?php echo $Contact->Message; ?>
                                </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            Checked:<input type="radio" class="form-control" <?php if($Contact->Checker == 1){ echo "Checked";} ?> name="CheckerContact" value="1">
                            Un checked:<input type="radio" class="form-control" <?php if($Contact->Checker == 0){ echo "Checked";} ?> name="CheckerContact" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
            <?php
    }
}
