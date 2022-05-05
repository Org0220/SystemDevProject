<!--shampoo display for admin-->
<tbody>
                    <tr>
                      <th scope="row" class="align-bottom"><?php echo $shampoo->id?></th>
                      <td class="align-bottom"><?php echo $shampoo->name?></td>
                      <td class="align-bottom"><?php echo $shampoo->price?></td>
                      <td>
                            <img class="rounded-circle" src="<?php echo URLROOT.'/public/img/'.$shampoo->image_url;?>" width="50">
                      </td>
                      <td class="text-center align-bottom"><a class="edit-btn" href='/SystemDevProject/Shampoos/update_shampoo/<?php echo $shampoo->id?>'>Edit</a></td>
                      <td class="text-center align-bottom"><a class="del-btn" href='/SystemDevProject/Shampoos/delete_shampoo/<?php echo $shampoo->id?>'>Delete</a></td>
                    </tr>
                </tbody>