    <table border="1">
        <tr>
            <th width="245">Name</th>
            <th width="65">Price</th>
            <th width="326">Description</th>
            <th width="25">Image</th>
            <th width="45">Action</th>
        </tr>
        <?php
while ($array = $data->fetchObject()) {
    echo <<< __END
                <tr>
            <td>$array->name</td>
            <td align="center">
            <div class="gear">
              <span id="$array->id" class="datainfo">$array->price</span>
              <a class="savebtn">Save</a>
              <a class="cancelbtn">Cancel</a>
            </div>
            
            </td>
            <td>$array->description</td>
            <td class="iwrapper"><a href="/image/$array->image" target="_blank"><img src="/image/$array->image" alt="bmw" /></a></td>
            <td align="center">
            <form action="" method="POST" >
            <input type="hidden" name="image" value="$array->image"/>
            <input type="submit" class="img"  name="del" value="$array->id"/></td>
            </form>
        </tr>
                
__END;
}
?>





    <form action="" method="POST" enctype="multipart/form-data" id="contactform">
        <tr>
            <td><input type="text" name="name" id="name" size="35" class="required" /></td>
            <td><input type="text" name="price" id="price" size="5" class="required"/></td>
            <td><textarea name="descr" id="descr" cols="40" rows="3"class="required"></textarea></td>
            <td><input name="image" type="file" style="width:200px;" class="required"/></td>
            <td align="center"><input type="submit" name="send" id="send" value="Add" /></td>
        </tr>
    </form>
    </table>