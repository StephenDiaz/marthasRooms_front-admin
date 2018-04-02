<div class="form-group">
    <label for="Room Number">Room Number</label>
    <input type="text" class="form-control" name="roomNumber" id="roomNumber" autocomplete="off">
</div>

<div class="form-group">
    <input type="text" class="form-control" name="roomType" id="roomType" value='{{ $id }}' autocomplete="off">
</div>

<div class="form-group">
    <label for="Room Building">Room Location</label>
    <select name = "roomBuilding" class="form-control" id="roomBuilding" autocomplete="off">
        <option value ="Harvard"> Harvard </option>
        <option value ="Princeton"> Princeton </option>
        <option value ="Wharton"> Wharton </option>
    </select>
</div>

<div class="form-group">
    <label for="Room Status">Room Status</label>
    <select name = "roomStatus" class="form-control" id="roomStatus" autocomplete="off">
        <option value ="Available"> Available </option>
        <option value ="Unavailable"> Unavailable </option>
    </select>
</div>

<div class="form-group">
    <label for="Room Price">Room Price</label>
    <input type="text" class="form-control" name="roomPrice" id="RoomPrice" autocomplete="off">

</div>