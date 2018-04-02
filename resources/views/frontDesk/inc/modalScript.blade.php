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


</script>
