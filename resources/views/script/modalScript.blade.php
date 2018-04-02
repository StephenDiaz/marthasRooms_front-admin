<script>

  
$('#edit').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var itemName = button.data('mytitle') 
      var description = button.data('mydescription') 
      var quantity = button.data('quantity') 
      var id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #itemName').val(itemName);
      modal.find('.modal-body #des').val(description);
      modal.find('.modal-body #quantity').val(quantity);
      modal.find('.modal-body #inventory_id').val(id);
})
$('#edit').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) 
var roomNumber = button.data('myroomnumber') 
var roomType = button.data('myroomtype') 
var roomBuilding = button.data('myroombuilding') 
var roomStatus = button.data('myroomstatus') 
var roomPrice = button.data('myroomprice') 
var id = button.data('id') 
var modal = $(this)

modal.find('.modal-body #roomNumber').val(roomNumber);
modal.find('.modal-body #roomType').val(roomType);
modal.find('.modal-body #roomBuilding').val(roomBuilding);
modal.find('.modal-body #roomStatus').val(roomStatus);
modal.find('.modal-body #roomPrice').val(roomPrice);
modal.find('.modal-body #room_id').val(id);
})
$('#edit').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) 
var gLastname = button.data('myLastname') 
var gFirstname = button.data('myFirstname') 
var gMiddlename = button.data('myMiddlename') 
var address = button.data('address') 
var gContactNumber = button.data('myContactNumber')
var gEmail = button.data('myEmail')
var gStatus = button.data('myStatus')
var id = button.data('id') 
var modal = $(this)

modal.find('.modal-body #gLastname').val(gLastname);
modal.find('.modal-body #gFirstname').val(gFirstname);
modal.find('.modal-body #gMiddlename').val(gMiddlename);
modal.find('.modal-body #address').val(address);
modal.find('.modal-body #gContactNumber').val(gContactNumber);
modal.find('.modal-body #gEmail').val(gEmail);
modal.find('.modal-body #gStatus').val(gStatus);
modal.find('.modal-body #guest_id').val(id);

})
$('#editUser').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) 
var name = button.data('name') 
var email= button.data('email') 
var password = button.data('password') 
var role = button.data('role') 
var acctStat = button.data('acctStat')
var id = button.data('id') 
var modal = $(this)

modal.find('.modal-body #name').val(name);
modal.find('.modal-body #email').val(email);
modal.find('.modal-body #role').val(role);
modal.find('.modal-body #acctStat').val(acctStat);
modal.find('.modal-body #user_id').val(id);
})
  $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 

      var id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #inventory_id').val(id);
})
  $('#delete').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) 

var id = button.data('id') 
var modal = $(this)

modal.find('.modal-body #room_id').val(id);
})
$('#delete').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) 

var id = button.data('id') 
var modal = $(this)

modal.find('.modal-body #guest_id').val(id);
})
  $('#delete').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) 

var id = button.data('id') 
var modal = $(this)

modal.find('.modal-body #id').val(id);
})

</script>