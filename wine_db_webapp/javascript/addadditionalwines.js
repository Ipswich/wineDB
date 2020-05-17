var extraForms = 0;
var varietals = document.getElementById('varietal');
var numberOfVarietals = varietals.options.length;
var options = '';

//Get list of varietals from static add wine input
for(let i = 0; i < numberOfVarietals; i++)
{
  options += '<option value="'+varietals.options[i].text+'">'+varietals.options[i].text+'</option>';
}

function add_more_wines()
{
    //Limit to 5 add wines total. Could be increased, but makes things look a little nuts.
    if(extraForms == 4)
    {
      return;
    }

    extraForms++;
    //HTML FOR "REMOVE FORMS" BUTTON.
    var removeButtonDiv = document.createElement("div");
    removeButtonDiv.setAttribute("class", "row removebutton");
    removeButtonDiv.innerHTML = '<div class="col-xs-3"></div><div class="form-group input-group col-xs-6"><span class="input-group-addon"><i class="glyphicon glyphicon-minus"></i></span><button type="button" onclick="remove_more_wines('+extraForms+');" class="btn btn-block btn-danger form-control">Remove Last Wine Form</button></div>';

    //HTML FOR CREATING MORE WINE FORMS
    var objTo = document.getElementById('wineFieldsWrapper')
    var newdiv = document.createElement("div");
    newdiv.setAttribute("class", "form-group removeclass"+extraForms);
    var rdiv = 'removeclass'+extraForms;
    newdiv.innerHTML = '<hr><div class="row"><div class="form-group col-xs-12"><label for="name">*Wine Name:</label><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span><input type="text" class="form-control" maxlength="40" id="name'+extraForms+'" placeholder="" name="name'+extraForms+'" required></div></div></div><div class="row">  <div class="form-group col-xs-4"><label for="vintage">*Vintage:</label><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span><input type="number" min="0" step="1" max="9999" class="form-control" id="vintage'+extraForms+'" name="vintage'+extraForms+'" required></div></div><div class=" form-group col-xs-4"><label for="varietal">*Varietal:</label><div class="input-group">  <span class="input-group-addon"><i class="glyphicon glyphicon-cutlery"></i></span><select class="form-control" id="varietal'+extraForms+'" name="varietal'+extraForms+'" required>'+options+'</select></div></div><div class="form-group col-xs-4"><label for="storage">*Storage Location:</label><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input type="text" class="form-control" id="storage'+extraForms+'" placeholder="X-X-XX-X-XX" name="storage'+extraForms+'" required></div></div></div><div class="row"><div class="form-group col-xs-4"><button type="button" data-target="#optional'+extraForms+'"data-toggle="collapse" class="btn btn-primary form-control">Show/Hide Optional Fields</button></div></div></div></div><div id="optional'+extraForms+'" class="collapse"><div class="row"><div class="form-group col-xs-3"><label for="price">Bottle Price:</label><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span><input type="number" min="0" step="0.01" class="form-control" id="price'+extraForms+'" name="price'+extraForms+'"></div></div><div class="form-group col-xs-5"><label for="sweetness">Sweetness Level:</label><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-ice-lolly-tasted"></i></span><input type="text" maxlength="40" class="form-control" id="sweetness'+extraForms+'" name="sweetness'+extraForms+'"></div></div><div class="form-group col-xs-4"><label for="stopper">Stopper Type:</label><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span><input type="text" maxlength="40" class="form-control" id="stopper'+extraForms+'" name="stopper'+extraForms+'"></div></div></div><div class="row"><div class="form-group col-xs-7"><label for="producer">Producer:</label><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" maxlength="40" class="form-control" id="producer'+extraForms+'" name="producer'+extraForms+'"></div></div><div class="form-group col-xs-5"><label for="finish">Finish:</label><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span><input type="text" maxlength="40" class="form-control" id="finish'+extraForms+'" name="finish'+extraForms+'"></div></div></div><div class="row"><div class="form-group col-xs-4"><label for="color">Color:</label><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span><input type="text" maxlength="40" class="form-control" id="color'+extraForms+'" name="color'+extraForms+'"></div></div><div class="form-group col-xs-3"><label for="size">Bottle Size:</label><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span><input type="text" maxlength="40" class="form-control" id="size'+extraForms+'" name="size'+extraForms+'" value="750mL"></div></div><div class="form-group col-xs-5"><label for="color">Body:</label><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span><input type="text" maxlength="40" class="form-control" id="body'+extraForms+'" name="body'+extraForms+'"></div></div></div><div class="row"><div class="form-group col-xs-3"><label for="color">Alcohol Level:</label><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-glass"></i></span><input type="text" maxlength="40" class="form-control" id="abv'+extraForms+'" name="abv'+extraForms+'"></div></div><div class="form-group col-xs-8"><label for="color">Appellation:</label><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span><input type="text" maxlength="40" class="form-control" id="appellation'+extraForms+'" name="appellation'+extraForms+'"></div></div></div><div class="row"><div class="form-group col-xs-12 checkbox"><div class="col-xs-2"><label><input type="checkbox" class="form-group-input" id="reserve'+extraForms+'" name="reserve'+extraForms+'"><strong>Reserve</strong> </label></div><div class="col-xs-3"><label><input type="checkbox" class="form-group-input" id="estate'+extraForms+'" name="estate'+extraForms+'"><strong>Estate Bottled</strong></label></div><div class="col-xs-2"><label><input type="checkbox" class="form-group-input" id="future'+extraForms+'" name="future'+extraForms+'"><strong>Future</strong></label></div><div class="col-xs-2"><label><input type="checkbox" class="form-group-input" id="blended'+extraForms+'" name="blended'+extraForms+'"><strong>Blended</strong></label></div></div></div><div class="row"><div class="form-group col-xs-12"><label for="color">Notes:</label><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span><input type="text" maxlength="40" class="form-control" id="notes'+extraForms+'" name="notes'+extraForms+'"></div></div></div><!--<div class="row"><div class="form-group col-xs-4"><label id="image" class="btn btn-info btn-file">Select Image for Upload<input id="image'+extraForms+'" name="image'+extraForms+'" type="file" style="display: none;"></label></div>--></div></div></div></div></div></div></div><div class="clear"></div>';
    objTo.appendChild(newdiv);

    //If extra forms have been added, add "remove forms" button.
    if(extraForms == 1)
    {
      document.getElementById('addwinesbutton').appendChild(removeButtonDiv);
    }

    //Apply mask to storage input
    $(document).ready(function()
    {
      $("#storage"+extraForms).mask("9-9-99-9-99");
    });
}

function remove_more_wines()
{
  //If no forms, ensure form count can't go negative (probably not necessary).
  if(extraForms == 0)
  {
    return;
  }
  //If removing the last of the extra forms, remove the "remove forms" button.
  if(extraForms == 1)
  {
    $('.removebutton').remove();
  }
  //Remove last created form and decrement to the next to last created form.
   $('.removeclass'+extraForms).remove();
   extraForms--;
}
